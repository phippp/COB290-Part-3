<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Problem;
use App\Models\Hardware;
use App\Models\Software;
use App\Models\ProblemLog;
use App\Models\ProblemNote;
use Illuminate\Http\Request;
use App\Models\OperatingSystem;
use App\Models\SpecialistTracker;
use App\Http\Controllers\Controller;
use App\Models\CallLog;

class SpecialistProblemEditController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','check.specialist']);
    }

    public function store(Request $request, ProblemLog $problemlog){

        //needs to have data validation
        $this -> validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'generic_category' =>  'required',
            'solution' => 'required'

        ]);

        //update title and description
        $problemlog->description = $request->description;
        $problemlog->title = $request->title;

        //update OS
        if($request->operating_system != "-"){
            $problemlog->operating_system_id = $request->operating_system;
        }

        //update software
        if($request->app_software != "-"){
            $problemlog->operating_system_id = $request->operating_system;
        }

        //update serial num
        if($request->serial_num != null){
            $hardware = Hardware::where('serial_num',$request->serial_num)->first();
            if($hardware->count()){
                $problemlog->hardware_id = $hardware->id;
            }
        }

        //update categories
        if($request->specific_category != "-"){
            $category = Problem::where('problem_type',$request->specific_category)->first();
            $problemlog->problem_id = $category->id;
        } else {
            $category = Problem::where('problem_type',$request->generic_category)->first();
            $problemlog->problem_id = $category->id;
        }

        //add solution or add specialist
        if($request->option_selected == "Specialist"){
            //assign a new specialist
            if($request->specialist_id != null){
                SpecialistTracker::create([
                    'employee_id' => $request->specialist_id,
                    'reason' => $request->specialist_reason,
                    'problem_log_id' => $problemlog->id
                ]);
            } else {
                //need to have a way to work out best person to assign
            }
        } else {
            //create a solution
            $problemlog->status = "Verify";
            $problemlog->solved_at = Carbon::now();
            $problemlog->employee_id = auth()->user()->employee->id;
            ProblemNote::create([
                'solution' => $request->solution,
                'problem_log_id' => $problemlog->id,
                'description' => ""
            ]);
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

        return back();
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
