<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Problem;
use App\Models\Employee;
use App\Models\Hardware;
use App\Models\Software;
use App\Models\ProblemLog;
use App\Models\ProblemNote;
use Illuminate\Http\Request;
use App\Models\OperatingSystem;
use App\Models\SpecialistTracker;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class ClientProblemEditController extends Controller
{
    // This controller enables a privileged user to edit problem.
    public function __construct(){
        $this->middleware(['auth','check.user','isClient']);
    }

    public function store(Request $request, ProblemLog $problemlog){
        $this -> validate($request,
            [
                'serial_num' => 'required_without:app_software,operating_system',
                'app_software' => 'required_without:serial_num|required_with:operating_system',
                'operating_system' => 'required_with:app_software',
                'title' => 'required|max:255',
                'description' => 'required',
                'generic_category' =>  'required',
            ],[
                'app_software.required_without' => "Application Software & Operating System fields is required when Serial Number is not provided",
                "operating_system.required_with" => "The operating system field is required when application software is present.",
                'generic_category.required' => "The generic category field is required therefore please select a category that best suits your problem",
            ]
        );



       // If hardware is provided, then check if it exist in database else throw an error
        if(!empty($request->serial_num)) {
            try{
                // checking if it exists
                $hardwareID = Hardware::where("serial_num", $request->serial_num)->firstOrFail();
                $problemlog->hardware_id = $hardwareID->id;
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
                $problemlog->software_id = $softwareID->id;
            } catch(ModelNotFoundException $exception){
                // application software does not exist in the database
                return back()->withErrors(array("app_software" => "Please provide a valid application software"))->withInput();
            }

            try{
                // checking if operating system  exists in db.
                $osID = OperatingSystem::findOrFail($appSoftwareInput);
                $problemlog->operating_system_id = $osID->id;
            } catch(ModelNotFoundException $exception){
                // operating system does not exist in the database
                return back()->withErrors(array("operating_system" => "Please provide a valid operating system"))->withInput();
            }
        }

        // title and description
        if($problemlog->title != $request->title ||$problemlog->description != $request->description ){
            $problemlog->title = $request->title;
            $problemlog->description = $request->description;
            $problemlog->status = "In queue";
        }


        // category check
        $specCategoryID = null;
        $genericCategoryID = null;
        if($request->specific_category != null) {
            try{
                // checking if it exists
                $specCategoryID = Problem::where( "problem_type",$request->specific_category)->firstOrFail();
                $genericCategoryID = $specCategoryID->problem_id;
                $specCategoryID = $specCategoryID->id;
                $problemlog->problem_id = $specCategoryID;
            } catch(ModelNotFoundException $exception){
                // application software does not exist in the database
                return back()->withErrors(array("generic_category" => "Please provide a valid specific category"))->withInput();
            }
        }
        else {
            try{
                $genericCategoryID = Problem::where( "problem_type", $request->generic_category)->firstOrFail();
                $genericCategoryID = $genericCategoryID->id;
                $problemlog->problem_id = $genericCategoryID;
            } catch(ModelNotFoundException $exception){
                // application software does not exist in the database
                return back()->withErrors(array("generic_category" => "Please provide a valid generic category"))->withInput();
            }
        }



       // check if the user has selected any option from solution table
       if(isset($request->submitSol)){
           if(!empty($request->solution_desc)){
               // get if previous notes exist based on the problem id
               // check if the solution is different otherwise insert a new row in the table
               $existingProblemNote = ProblemNote::where("problem_log_id", $problemlog->id);
               if($existingProblemNote->exists()){
                   $existingProblemNote = $existingProblemNote->get()->reverse()->first();
                   if($existingProblemNote->solution != $request->solution_desc){
                        // add new row in the table
                        ProblemNote::create([
                            'description' => "",
                            'solution' => $request->solution_desc,
                            'problem_log_id' => $problemlog->id
                        ]);

                        // mark the problem as solved
                        $problemlog->status = "Solved";
                        $problemlog->solved_at = Carbon::now();
                        $problemlog->employee_id = auth()->user()->employee_id;
                   }
                } else {
                   // insert a new row in the table
                    ProblemNote::create([
                        'description' => "",
                        'solution' => $request->solution_desc,
                        'problem_log_id' => $problemlog->id
                    ]);
                    // mark the problem as solved
                    $problemlog->status = "Solved";
                    $problemlog->solved_at = Carbon::now();
                    $problemlog->employee_id = auth()->user()->employee_id;

                }

           }
       }


       if(isset($request->submitSpec)){
           // getting list of all specialist
           $specialists = Employee::has('specialist');

           if($request->specialist_location != "anywhere") {
               // Checks if we need to filter based on their location
               $specialists->where('branch_id',auth()->user()->employee->branch_id);
           }

            // filters out specialist that have the required skills
            $specialists->whereHas('specialistSkills',function($query) use($genericCategoryID){
                $query->where('problem_id',$genericCategoryID );
            })->orWhereHas('specialistSkills',function($query) use($specCategoryID){
                $query->where('problem_id',$specCategoryID);
            });

            $specialists = $specialists->get(); // this will get all the specialist left after filtering
            $availableSpecialist = array();

            if($specialists->count() == 0){
                // no specialist exists with those requirement therefore, we will use all the specialist that we have in the system
                $availableSpecialist = Employee::has('specialist')->get();
                $availableSpecialist = array_column($availableSpecialist->toArray(), "id");
            } else {
                // if we found specialists that matches the requirement and we need to do the following check
                // > check if any available
                // > get the specialist with least worked load
                foreach($specialists as $s){
                    if($s->specialist->is_available){
                        array_push($availableSpecialist, $s->id);
                    }
                }

                //if no specialist are "available" then we include just have select the specialist who is unavailable with the least work load
                if($availableSpecialist == null){
                    $availableSpecialist = array_column($specialists->toArray(), "id");
                }
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
            } else {
                $spec_id = current($leastWorkLoadSpecialists)->employee_id;
            }

            // Insert into specialist tracker
            SpecialistTracker::Create([
                'employee_id' => $spec_id,
                'reason' => "Automatically assigned",
                'problem_log_id' => $problemlog->id
            ]);

            ProblemNote::create([
                'description' => "",
                'solution' => "",
                'problem_log_id' => $problemlog->id
            ]);

            $problemlog->status = "In queue";
            $problemlog->specialist_assigned = true;
       }

       $problemlog->save();

       return redirect()->route('client_problem_view', $problemlog->id);


    }

    public function index(ProblemLog $problemlog){

        // load all the hardware and software data here and place it in the return view() array

        $software = Software::get();

        $hardware = Hardware::get();

        $operatingSystems = OperatingSystem::get();


        // gets all the valid category option which will be displayed on the front-end
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


            }
            else{
                // if it's a specific category
                $key = $thisCategory->parentProblem->problem_type;
                if (array_key_exists($key, $organizedCategory)){
                    array_push($organizedCategory[$key], $thisCategory->problem_type);
                } else {
                    $organizedCategory[$key] = array($thisCategory->problem_type);
                }

            }
        }

        // getting the history of problem description and solution
        $problemHistory = ProblemNote::where('problem_log_id', $problemlog->id)->get();



        // this is for dummy purpose to show existing solution, TODO : but this needs to be modify so it is dynamic to input provided
        $solved = ProblemLog::where([['status','Solved'],['id','<>',$problemlog->id]])->paginate(10);

        return view(
            'client.client_edit_problem',
            [    // put in this array all the data that needs to be sent to the front-end page
                'navTitle'=>'Dashboard',
                'problemlog' => $problemlog,
                'problemHistory' => $problemHistory,
                'genericCategory' => $genericCategory,
                'specificCategory' => $specificCategory,
                'organizedCategory' => $organizedCategory,
                'logs' => $solved,
                'software' => $software,
                'operatingSystems' => $operatingSystems,
                'hardware' => $hardware
            ]
        );
    }
}
