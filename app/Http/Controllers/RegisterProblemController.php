<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\ProblemNote;
use App\Models\Problem;
use App\Models\Hardware;
use App\Models\ProblemLog;
use App\Models\Software;
use App\Models\SpecialistTracker;
use Illuminate\Http\Request;
use App\Models\OperatingSystem;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class RegisterProblemController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['auth','check.user']);
    }

    public function store(Request $request){

        $this -> validate($request, 
            [
                'serial_num' => 'required_without:app_software,operating_system',
                'app_software' => 'required_without:serial_num|required_with:operating_system',
                'operating_system' => 'required_with:app_software',
                'title' => 'required|max:255',
                'description' => 'required',
                'generic_category' =>  'required',
                'option_selected' => 'required',

                'solution_desc' => 'required_if:option_selected,==,Solution',
            ],[
                'app_software.required_without' => "Application Software & Operating System fields is required when Serial Number is not provided",
                "operating_system.required_with" => "The operating system field is required when application software is present.",
                'generic_category.required' => "The generic category field is required.<br>Please select a category that best suits your problem",
                "solution_desc.required_if" => "Please select a solution  or choose 'Assign Specialist' from the toggle above "
            ]
        );

        // This will store any hardware and software id that based on the user input
        $hardwareID = null;
        $softwareID = null;
        $osID = null;
        $specCategoryID = null;
        $genericCategoryID = null;


        // If hardware is provided, then check if it exist in database else throw an error
        $hardwareInput = $request->serial_num;
        if(!empty($hardwareInput)) {
            try{
                // checking if it exists
                $hardwareID = Hardware::where("serial_num", $hardwareInput)->firstOrFail();
                $hardwareID = $hardwareID->id;
            } catch(ModelNotFoundException $exception){
                // hardware does not exist in the database
                return back()->withErrors(array("serial_num" => "Serial number is not valid"))->withInput();
            }
        }


        // Checks if the software selected by the user exists in the database. (Just a safety check in-case the user modifies the option from front-end -> inspect element)
        $appSoftwareInput = $request->app_software;
        $osInput = $request->operating_system;
        if( ! (empty($appSoftwareInput) && empty($osInput) )){
            try{
                // checking if it exists
                $softwareID = Software::findOrFail($appSoftwareInput);
                $softwareID = $softwareID->id;
            } catch(ModelNotFoundException $exception){
                // application software does not exist in the database
                return back()->withErrors(array("app_software" => "Please provide a valid application software"))->withInput();
            }

            try{
                // checking if it exists
                $osID = OperatingSystem::findOrFail($appSoftwareInput);
                $osID = $osID->id;
            } catch(ModelNotFoundException $exception){
                // operating system does not exist in the database
                return back()->withErrors(array("operating_system" => "Please provide a valid operating system"))->withInput();
            }
        }

        // Get user/employee ID and users branch
        $clientID = auth()->user()->employee_id;


        // Find the correct problem id (generic or specific)
        $specCategoryInput = $request->specific_category;
        $genericCategoryInput = $request->generic_category;
        if($specCategoryInput != null) {
            try{
                // checking if it exists
                $specCategoryID = Problem::where( "problem_type", $specCategoryInput)->firstOrFail();
                $genericCategoryID = $specCategoryID->problem_id;
                $specCategoryID = $specCategoryID->id;
            } catch(ModelNotFoundException $exception){
                // application software does not exist in the database
                return back()->withErrors(array("generic_category" => "Please provide a valid specific category"))->withInput();
            }
        }
        else {
            try{
                $genericCategoryID = Problem::where( "problem_type", $genericCategoryInput)->firstOrFail();
                $genericCategoryID = $genericCategoryID->id;
            } catch(ModelNotFoundException $exception){
                // application software does not exist in the database
                return back()->withErrors(array("generic_category" => "Please provide a valid generic category"))->withInput();
            }
        }


        // this will be used for later redirecting to problem overview page if query is successfully;
        $log = null;


        // SUBMISSION TYPE : checking if user want to assign the problem to specialist
        // If they have chosen a specialist (almost everything is copied from SpecialistProblemEditController for this section)
        if($request->submitSpec == "spec"){
            // find suitable specialist here ...

            // getting all employee that are specialist
            $specialists = Employee::has('specialist');

            if($request->specialist_location != "anywhere") {
                // Checks for an available specialist with skills in the problem type
                // and works in the same branch as the user
                $specialists->where('branch_id',auth()->user()->employee->branch_id);
            }

            //checks if they have the skills
            $specialists->whereHas('specialistSkills',function($query) use($genericCategoryID){
                $query->where('problem_id',$genericCategoryID );
            })->orWhereHas('specialistSkills',function($query) use($specCategoryID){
                $query->where('problem_id',$specCategoryID);
            });
                        
            // getting the ongoing problem ids
            // perquisite : getting  information required to select the specialist with the least work load
            $ongoingLogIDs = ProblemLog::select("id")->where("status", "<>", "Solved")->where("specialist_assigned", 1)->get()->toArray();    
            $ongoingLogIDs = array_column($ongoingLogIDs, "id");
           

            $specialists = $specialists->get(); // this will get all the specialist left after filtering
            $spec_id = null; // this will store the final specialist selected
            
            if($specialists->count() > 0){
                foreach($specialists as $s){
                    if($s->specialist->is_available){
                        array_push($availableSpecialist, $s->id);
                    }
                }
                
                //if no specialist are "available" then we include just have select the specialist who is unavailable with the least work load
                if($availableSpecialist == null){
                    $availableSpecialist = array_column($specialists->toArray(), "id");
                }

            } else {
                
                // if there is no specialist with the specialist skills, we will assign a specialist with the least work load
                $availableSpecialist = Employee::has('specialist')->get();
                $availableSpecialist = array_column($availableSpecialist->toArray(), "id");

            }


            // now that we got list of specialist to select from
            // perquisite : getting  information required to select the specialist with the least work load
            $ongoingLogIDs = ProblemLog::select("id")->where("status", "<>", "Solved")->where("specialist_assigned", 1)->get()->toArray();  
            $ongoingLogIDs = array_column($ongoingLogIDs, "id");
            
            $availableSpecialist  = implode(",", $availableSpecialist);
            $ongoingLogIDs = implode(',', $ongoingLogIDs); 

            // explanation:: 
            // 1. we have subquery which gets the maximum date of created_at based on the problem id
            // 2. Next we use the maximum date and problem id to identify the latest / current specialist assigned to the problem
            // 3. This query will return as the the number of current job assigned to a particular employee 
            $leastWorkLoadSpecialists = DB::select("SELECT COUNT(a.id) as 'workload', a.employee_id
            FROM specialist_trackers a 
            INNER JOIN 
                ( 
                    SELECT max(c.created_at) as 'created_at', c.problem_log_id  
                    FROM specialist_trackers c 
                    WHERE c.problem_log_id IN ($ongoingLogIDs) 
                    GROUP BY problem_log_id 
                ) 
            b 
            ON a.problem_log_id = b.problem_log_id 
            AND b.created_at = a.created_at
            WHERE a.employee_id IN ($availableSpecialist)
            GROUP BY a.employee_id
            ORDER BY count(a.id) ASC",
            );

            $spec_id = null;

            // checking if there are specialist which were currently have no jobs, because the sql will only get specialist that have a ongoing jobs.
            $freeSpecialist = array_diff( explode(",", $availableSpecialist) , array_column($leastWorkLoadSpecialists, "employee_id") );
            if(count($freeSpecialist)){
                $spec_id = intval(current($freeSpecialist));
                dd("free specialist", $spec_id);
            } else {
                $spec_id = current($leastWorkLoadSpecialists)->employee_id;
            }


            // Insert into problem_logs
            $log = ProblemLog::create([
                'hardware_id' => $hardwareID,
                'software_id' => $softwareID,
                'specialist_assigned' => 1,
                'operating_system_id' => $osID,
                'problem_id' => ($specCategoryID == null) ? $genericCategoryID : $specCategoryID,
                'title' => $request->title,
                'description' => $request->description,
                'status' => "In queue",
                'importance' => $request->importance_level,
                'solved_at' => null,
                'employee_id' => null,
                'client_id' => $clientID
            ]);


            // Insert into specialist tracker
            SpecialistTracker::Create([
                'employee_id' => $spec_id,
                'reason' => "Automatically assigned",
                'problem_log_id' => $log->id
            ]);

        }

        // If there is an available and appropriate solution for them that they have selected
        else
        {
            $log = ProblemLog::create([
                'hardware_id' => $hardwareID,
                'software_id' => $softwareID,
                'specialist_assigned' => 0,
                'operating_system_id' => $osID,
                'problem_id' => ($specCategoryID == null) ? $genericCategoryID : $specCategoryID,
                'title' => $request->title,
                'description' => $request->description,
                'status' => "Solved",
                'importance' => "Low",
                'solved_at' => date("Y/m/d h:i:sa"),
                'employee_id' => $clientID,
                'client_id' => $clientID
            ]);


            // Insert solution into log_history
            ProblemNote::create([
                'description' => "",
                'solution' => $request->solution_desc,
                'problem_log_id' => $log->id
            ]);
        }

        // Return to the problem overview once data is added to database
        return redirect()->route('client_problem_view', $log->id);
    }

    public function index(Request $request){

        $software = DB::select('select * from software where id > 0');
        $hardware = Hardware::get();
        $operatingSystems = DB::select('select * from operating_systems where id > 0');
        $category = Problem::select('problem_type', 'problem_id')->where('enabled', 1)->orderBy('problem_type')->get();

        $genericCategory = $category
            ->where('problem_id', NULL)
            ->sortBy('problem_type')
            ->pluck('problem_type')
            ->toArray();

        $specificCategory = $category
            ->where('problem_id', '<>', NULL)
            ->sortBy('problem_type')
            ->pluck('problem_type')
            ->toArray();

        $organizedCategory = array(); // associative array to keep track of generic and specific category

        foreach($category as $thisCategory){
            // for each category type, it will check if its generic or not and based on that it will create the appropriate element in the array

            if( is_null($thisCategory->problem_id)){
                // checking if the category type is generic, if so then we create key with that name

                if(!array_key_exists($thisCategory->problem_type, $organizedCategory)){ // having this if statement as a safety check
                    $organizedCategory[$thisCategory->problem_type] = array();
                }

            } else {
                // if it's a specific category
                $key = $thisCategory->parentProblem->problem_type;
                if (array_key_exists($key, $organizedCategory)){
                    array_push($organizedCategory[$key], $thisCategory->problem_type);
                } else {
                    $organizedCategory[$key] = array($thisCategory->problem_type);
                }

            }
        }
        $solutions = DB::select('select pl.title, pn.solution, pl.problem_id, pl.solved_at
                                from problem_logs as pl, problem_notes as pn
                                where pn.problem_log_id = pl.id');

        return view('client.client_register',[
            'navTitle'=>'register',
            'genericCategory' => $genericCategory,
            'specificCategory' => $specificCategory,
            'organizedCategory' => $organizedCategory,
            'software' => $software,
            'operatingSystems' => $operatingSystems,
            'hardware' => $hardware,
            'solutions'=>$solutions
            ]);
    }
}
