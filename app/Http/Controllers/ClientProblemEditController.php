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
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class ClientProblemEditController extends Controller
{
    // This controller enables a privileged user to edit problem.
    public function __construct(){
        $this->middleware(['auth','check.user']);
    }

    public function store(Request $request, ProblemLog $problemlog){

        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'generic_category' =>  'required',
            'option_selected' => 'required',
            'serial_num' => 'required_without:app_software',
            'app_software' => 'required_without:serial_num',
            'solution_num' => 'required_if:option_selected,==,Solution',
        ]);

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

        if($request->option_selected == "Solution"){
            //create solution
            $problemlog->status = "Verify";
            $problemlog->solved_at = Carbon::now();
            $problemlog->employee_id = auth()->user()->employee->id;
            ProblemNote::create([
                'solution' => ProblemNote::where('id',$request->solution_num)->get()->first()->solution,
                'problem_log_id' => $problemlog->id,
                'description' => ""
            ]);

        } else {
            //find the best specialist to assign
            $specialists = Employee::has('specialist');

            //checks same location
            if($request->location_type != "anywhere"){
                $specialists->where('branch_id',auth()->user()->employee->branch_id);
            }

            //checks if they have the skills
            $specialists->whereHas('specialistSkills',function($query) use ($request){
                $query->where('problem_id',$request->generic_category);
            })->orWhereHas('specialistSkills',function($query) use ($request){
                $query->where('problem_id',$request->specific_category);
            });

            $specialists = $specialists->get();

            $spec_id = null;

            if($specialists->count() < 0){
                //check if any available
                foreach($specialists as $s){
                    if($s->specialist_is_available){
                        $spec_id = $s->id;
                        break;
                    }
                }
                //if not assign first
                if($spec_id == null){
                    $spec_id = $specialists->first()->id;
                }
            } else {
                $current = $problemlog->trackers->last();
                $spec_id = Employee::has('specialist')->where('id','<>',$current->specialist->id)->get()->first()->id;
            }

            //create tracker
            SpecialistTracker::Create([
                'employee_id' => $spec_id,
                'reason' => 'Requested by client',
                'problem_log_id' => $problemlog->id
            ]);

            $problemlog->specialist_assigned = true;
        }

        $problemlog->save();

        return back();

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
