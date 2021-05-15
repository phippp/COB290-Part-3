<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\CallLog;
use App\Models\Problem;
use App\Models\Employee;
use App\Models\Hardware;
use App\Models\Software;
use App\Models\ProblemLog;
use App\Models\ProblemNote;
use Illuminate\Http\Request;
use App\Models\OperatingSystem;
use App\Models\SpecialistTracker;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class SpecialistProblemEditController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','check.specialist']);
    }

    public function store(Request $request, ProblemLog $problemlog){

        // dd($request);

        //needs to have data validation
        $this -> validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            
            'serial_num' => 'required_without:app_software,operating_system',
            'app_software' => 'required_without:serial_num|required_with:operating_system',
            'operating_system' => 'required_with:app_software',

            'generic_category' =>  'required',
            
            'option_selected' => 'required',
            'specialist_reason' => 'required_if:option_selected,==,Specialist',

            'importance_level' => 'required',
        ],[
            'app_software.required_without' => "Application Software & Operating System fields is required when Serial Number is not provided",
            "operating_system.required_with" => "The operating system field is required when application software is present.",
            'generic_category.required' => "The generic category field is required.Please select a category that best suits your problem"
        ]);

        //update title and description
        $problemlog->description = $request->description;
        $problemlog->title = $request->title;


        // update hardware
        if(!empty($request->serial_num)) {
            try{
                // checking if it exists
                $hardwareID = Hardware::where("serial_num",$request->serial_num)->firstOrFail();
                $problemlog->hardware_id = $hardwareID->id;
            } catch(ModelNotFoundException $exception){
                // hardware does not exist in the database
                return back()->withErrors(array("serial_num" => "The serial number you have specified is not valid"))->withInput();
            }
        }

        // Update software
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


        //update categories
        // dd( $request->operating_system, $request->app_software, $request->serial_num, "Specific" . $request->specific_category , );
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

        
        //check if specialist has been modified
        if($request->option_selected == "Specialist" && !empty($request->specialist_reason)){

            // 
            $currentSpecialist = $problemlog->trackers->last()->specialist->id;

            //assign a new specialist
            if($request->specialist_id != null){
                // check if the specialist actually exists based on the id provided
                $newSpecialistEmpID = Employee::select("id")->where("id",$request->specialist_id);

                if($newSpecialistEmpID->exists() != null){
                    $newSpecialistEmpID =  $newSpecialistEmpID->whereHas('job',function($query){
                        $query->where('type', "Specialist");
                    })->get()->first();

                    // checking the specialist provided a different employee id (so a different specialist can be assigned)
                    // otherwise the same specialist will be reassigned.
                    if($newSpecialistEmpID != null  && $currentSpecialist != $newSpecialistEmpID->id){
                        SpecialistTracker::create([
                            'employee_id' => $request->specialist_id,
                            'reason' => $request->specialist_reason . ".\n.Assigned by previous specialist (ID:" . $currentSpecialist . ")",
                            'problem_log_id' => $problemlog->id
                        ]);

                    } else {
                        // display error
                        return back()->withErrors(array("specialist" => "The new specialist ID provided is not valid."))->withInput();
                    }
                } else {
                    return back()->withErrors(array("specialist" => "The new specialist ID is not valid"))->withInput();
                }

            } else {
                
                //gets list of all specialist except the one that is currently assigned
                $specialists = Employee::has('specialist')->where('id','<>',$currentSpecialist);
                
                //checks if same location is required
                if($request->location_type != "anywhere"){
                    $specialists->where('branch_id',Employee::where("id", $problemlog->client_id)->get()->first()->branch_id);
                }

                //checks if they have the skills
                $specialists->whereHas('specialistSkills',function($query) use ($request){
                    $query->where('problem_id',$request->generic_category);
                })->orWhereHas('specialistSkills',function($query) use ($request){
                    $query->where('problem_id',$request->specific_category);
                });


                // getting list of suitable specialist
                $specialists = $specialists->get();
                $availableSpecialist = array();

                // checking if we got any suitable specialist that matches the properties applied by the user.
                // if not then we have to select any specialist with the least workload                
                if($specialists->count() > 0){
                    // if we found specialists that matches the requirement and we need to do the following check
                    // > check if any specialist is available
                    // > select the specialist with least worked load 
                    
                    foreach($specialists as $s){
                        if($s->specialist->is_available){
                            array_push($availableSpecialist, $s->id);
                        }
                    }

                    //if there is no "available" specialist then we get list of all specialist and make them all contender for selection.
                    if(count($availableSpecialist) == 0 ){
                        $availableSpecialist = array_column($specialists->toArray(), "id");
                    }     

                } else {
                    // ensures that we pick a different specialist then the currently assigned specialist
                    $availableSpecialist = Employee::has('specialist')->where('id','<>',$currentSpecialist)->get();
                    $availableSpecialist = array_column($availableSpecialist->toArray(), "id");
                }

                if(count($availableSpecialist) == 0){
                    return back()->withErrors(array("specialist" => "No other specialist can be selected"))->withInput();
                }


                // getting the ongoing problem ids
                // This is needed to select the specialist with the least work load
                $ongoingLogIDs = ProblemLog::select("id")->where("status", "<>", "Solved")->where("specialist_assigned", 1)->get()->toArray();    
                $ongoingLogIDs = array_column($ongoingLogIDs, "id");
                
                // getting data ready so they can be used in the query
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

                $spec_id = null;  // this will store the final specialist that is selected 

                // checking if there are specialist which were currently have no jobs, because the sql will only get specialist that have a ongoing jobs.
                $freeSpecialist = array_diff( explode(",", $availableSpecialist) , array_column($leastWorkLoadSpecialists, "employee_id"));


                if(count($freeSpecialist)){
                    $spec_id = intval(current($freeSpecialist));
                } else {
                    $spec_id = current($leastWorkLoadSpecialists)->employee_id;
                } 

                SpecialistTracker::Create([
                    'employee_id' => $spec_id,
                    'reason' => $request->specialist_reason . "\nAssigned by previous specialist (ID:" . $currentSpecialist . ")",
                    'problem_log_id' => $problemlog->id
                ]);

                $problemlog->specialist_assigned = true;

            }

        }
        



        // getting previous notes and solution to check if they have been modified.
        $previousProblemNotesDB = ProblemNote::where("problem_log_id", $problemlog->id); 
        if($previousProblemNotesDB->exists() == false){
            if(!empty($request->specialist_notes) || !empty($request->solution)){
                // it does not exist therefore 
                ProblemNote::create([
                    'solution' => $request->solution,
                    'problem_log_id' => $problemlog->id,
                    'description' =>  $request->specialist_notes == null ? '' : $request->specialist_notes
                ]);

                if(!empty($request->solution)){
                    // these line of codes where initially here
                    $problemlog->status = "Verify";
                    $problemlog->solved_at = Carbon::now();
                    $problemlog->employee_id = auth()->user()->employee->id;
                }
            }
           
        } else {
            // do something here if the solution has been modified from the one in problem notes table
            $previousProblemNotesDB = $previousProblemNotesDB->orderBy("created_at", "desc")->get()->first();
            $previousNotes = $previousProblemNotesDB->description;
            $previousSolution = $previousProblemNotesDB->solution;

            if($previousNotes != $request->specialist_notes || $previousSolution != $request->solution){
                // insert a new record in the database
                
                ProblemNote::create([
                    'solution' => $request->solution,
                    'problem_log_id' => $problemlog->id,
                    'description' => $request->specialist_notes == null ? '' : $request->specialist_notes
                ]);
                
                if(!empty($request->solution)){
                    // these line of codes where initially here
                    $problemlog->status = "Verify";
                    $problemlog->solved_at = Carbon::now();
                    $problemlog->employee_id = auth()->user()->employee->id;
                }
            }
        }

        //update importance
        $problemlog->importance = $request->importance_level;

        //create new call
        if($request->call_description != null){
            CallLog::create([
                'description' => $request->call_description,
                'specialist_id' => auth()->user()->employee->id,
                'problem_log_id' => $problemlog->id,
                'client_id' => $problemlog->client_id,
                'edited_at' => Carbon::now()
            ]);
        }

        $problemlog->save();

        return redirect()->route('log_overview', $problemlog->id);
    }

    public function index(ProblemLog $problemlog){

        // ************ BACKEND TEAM: can we store all the input we are going to display in 1 file so we don't have to repeat the code in every file that requires it "

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
            // 'edit_log_overview',
            'specialist.specialist_edit_problem',
            [    // put in this array all the data that needs to be sent to the front-end page
                'navTitle'=>'Dashboard',
                'problemlog' => $problemlog,
                'problemHistory' => $problemHistory,
                'genericCategory' => $genericCategory,
                'specificCategory' => $specificCategory,
                'organizedCategory' => $organizedCategory,
                'logs' => $solved,
                'hardware' => $hardware,
                'software' => $software,
                'operatingSystems' => $operatingSystems,
            ]
        );
    }
}
