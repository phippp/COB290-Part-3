<?php

namespace App\Http\Controllers;

use App\Models\ProblemNote;
use App\Models\Problem;
use App\Models\Hardware;
use App\Models\ProblemLog;
use App\Models\Software;
use App\Models\SpecialistTracker;
use Illuminate\Http\Request;
use App\Models\OperatingSystem;
use DB;

class RegisterProblemController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['auth','check.user']);
    }

    public function store(Request $request){

        // Ensures the title and description are entered
        #currently generic-category doesn't actually give an error
        $this -> validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'generic_category' =>  'required',
            'option_selected' => 'required',
            'serial_num' => 'required_without:app_software',
            'app_software' => 'required_without:serial_num',
            'solution_desc' => 'required_if:option_selected,==,Solution',
        ]);

        // Gets the component details the user inputted
        $os = $request->operating_system;
        $softw = $request->app_software;
        $hardw = $request->serial_num;

        // Just hardware
        if(!empty($hardw) && ($os == "-" && $softw == null)) {
            // Get the hardware id for the inputted serial number
            $hardware = $request->serial_num;
            $hID = DB::select('select id from hardware where serial_num = :serialNum',
                ['serialNum'=>$hardware]);
            $hardwareID = $hID[0]->id;
            // Hardcode software and os as 0
            $softwareID = null;
            $osID = null;
        }
        // Just software and operating system
        else if(empty($hardw) && ($os != "-" && $softw != null)) {
            // Get software id and operating system id for inputted components
            $softwareID = $request->app_software;
            $osID = $request->operating_system;
            // Hardcode hardware id as 0
            $hardwareID = null;
        }
        // Software, operating system and hardware
        else if(!empty($hardw) && $os != "-" && $softw != null) {
            // Get the hardware id for the inputted serial number
            $hardware = $request->serial_num;
            $hID = DB::select('select id from hardware where serial_num = :serialNum',
                ['serialNum'=>$hardware]);
            $hardwareID = $hID[0]->id;
            // Get software id and operating system id for inputted components
            $softwareID = $request->app_software;
            $osID = $request->operating_system;
        }
        // None of them
        else {
            // Hardcode hardware id as 0
            $hardwareID = null;
            // Hardcode software and os as 0
            $softwareID = null;
            $osID = null;
        }

        // Get user/employee ID and users branch
        $id = auth()->user()->employee_id;
        $userBranch = DB::select('select e.branch_id from employees as e
                                where e.id = :employee_id', ['employee_id' => $id]);

        // Find the correct problem id (generic or specific)
        // Currently gets the problem type, not it's id
        $spec = $request->specific_category;
        $spec = substr($spec, 0, strpos($spec, '.')+1);
        if($spec == "-") {
            $probName = $request->generic_category;
            $pID = DB::select('select id from problems
                                where problem_type = :problem', ['problem' => $probName]);
        }
        else {
            $pID = DB::select('select id from problems
                                where problem_type = :problem', ['problem' => $spec]);
        }


        // SUBMISSIONS
        // If they have chosen a specialist
        if($request->submitSpec == "spec")
        {
            // Checks for an available specialist with skills in the problem type
            // and works in any branch
            if($request->specialist_location == "anywhere") {
                $specialistID = DB :: select('select sk.employee_id
                                from employees as e, specialists as s, specialist_skills as sk
                                where s.is_available = 1
                                AND sk.problem_id = :problemId
                                AND e.id = s.employee_id
                                LIMIT 1', ['problemId'=>$pID[0]->id]);
            }
            // Checks for an available specialist with skills in the problem type
            // and works in the same branch as the user
            else {
                $specialistID = DB :: select('select sk.employee_id
                                from employees as e, specialists as s, specialist_skills as sk
                                where s.is_available = 1
                                AND sk.problem_id = :problemId
                                AND e.id = s.employee_id
                                AND e.branch_id = :branch
                            LIMIT 1', ['problemId'=>$pID[0]->id, 'branch'=>$userBranch[0]->branch_id]);
            }

            // If no specific specialist
            if($specialistID == [])
            {
                $specialistID = DB :: select('select sk.employee_id
                                from employees as e, specialists as s, specialist_skills as sk
                                where s.is_available = 1
                                AND e.id = s.employee_id
                                LIMIT 1');
            }


            // Insert into problem_logs
            ProblemLog::create([
                'hardware_id' => $hardwareID,
                'software_id' => $softwareID,
                'specialist_assigned' => 1,
                'operating_system_id' => $osID,
                'problem_id' => $pID[0]->id,
                'title' => $request->title,
                'description' => $request->description,
                'status' => "In queue",
                'importance' => $request->importance_level,
                'solved_at' => '2000-01-01 01:01:01',
                'employee_id' => $id,
                'client_id' => $id
            ]);

            // Find problem log id
            $logID = DB::select('select id from problem_logs order by created_at desc limit 1');

            // Insert into specialist tracker
            SpecialistTracker::Create([
                'employee_id' => $specialistID[0]->employee_id,
                'reason' => "Automatically assigned",
                'problem_log_id' => $logID[0]->id
            ]);
        }

        // If there is an available and appropriate solution for them that they have selected
        else
        {
            ProblemLog::create([
                'hardware_id' => $hardwareID,
                'software_id' => $softwareID,
                'specialist_assigned' => 0,
                'operating_system_id' => $osID,
                'problem_id' => $pID[0]->id,
                'title' => $request->title,
                'description' => $request->description,
                'status' => "Solved",
                'importance' => "Low",
                'solved_at' => date("Y/m/d h:i:sa"),
                'employee_id' => $id,
                'client_id' => $id
            ]);

            // Find problem log id
            $logID = DB::select('select id from problem_logs order by created_at desc limit 1');

            // Insert solution into log_history
            ProblemNote::create([
                'description' => $request->description,
                'solution' => $request->solution_desc,
                'problem_log_id' => $logID[0]->id
            ]);
        }

        // Return to the dashboard once data is added to database
        return redirect()->route('client');
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
