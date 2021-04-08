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
            //'generic-category' => 'required'
        ]);

        // Get the hardware id for the inputted serial number
        $hardware = $request->serial_num;
        $hID = DB::select('select id from hardware where serial_num = :serialNum',
            ['serialNum'=>$hardware]);
        $hardwareID = $hID[0]->id;

        // Get user/employee ID and users branch
        $id = auth()->user()->employee_id;
        $userBranch = DB::select('select e.branch_id from employees as e
                                where e.id = :employee_id', ['employee_id' => $id]);

        // Find the correct problem id (generic or specific)
        // Currently gets the problem type, not it's id
        $spec = $request->specific_category;
        if($spec == "-") {
            $probName = $request->generic_category;
            $pID = DB::select('select id from problems
                                where problem_type = :problem', ['problem' => $probName]);
        }
        else {
            $pID = DB::select('select id from problems
                                where problem_type = :problem', ['problem' => $spec]);
        }


        // If they have chosen a specialist
        if($request->submitSpec == "spec")
        {
            if($request->specialist_location != "-" && $request->importance_level != "-") {
                // Checks for an available specialist with skills in the problem type
                // and works in any branch
                if($request->specialist_location == "anywhere") {
                    $specialistID = DB :: select('select sk.employee_id
                                    from employees as e, specialists as s, specialist_skills as sk
                                    where s.is_available = TRUE
                                    AND sk.problem_id = :problemId
                                    AND e.id = s.employee_id
                                    LIMIT 1', ['problemId'=>$pID]);
                }
                // Checks for an available specialist with skills in the problem type
                // and works in the same branch as the user
                else {
                    $specialistID = DB :: select('select sk.employee_id
                                    from employees as e, specialists as s, specialist_skills as sk
                                    where s.is_available = TRUE
                                    AND sk.problem_id = :problemId
                                    AND e.id = s.employee_id
                                    AND e.branch_id = :branch
                                    LIMIT 1', ['problemId'=>$pID, 'branch'=>$userBranch[0]->branch_id]);
                }
            }
            else {
                // Not all necessay values to assign specialist are filled in
                dd("not all spec inputted");
            }

            // Insert into problem_logs
            ProblemLog::create([
                'hardware_id' => $hardwareID,
                'software_id' => $request->app_software,
                'specialist_assigned' => $specialistID[0]->employee_id,
                'operating_system_id' => $request->operating_system,
                'problem_id' => $pID,
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
                'reason' => $request->description,
                'problem_log_id' => $logID[0]->id
            ]);

        }


        // If there is an available and appropriate solution for them that they have selected
        else
        {
            ProblemLog::create([
                'hardware_id' => $hardwareID,
                'software_id' => $request->app_software,
                'specialist_assigned' => 0,
                'operating_system_id' => $request->operating_system,
                'problem_id' => $pID,
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

    public function index(){

        $software = Software::get();

        $hardware = Hardware::get();

        $operatingSystems = OperatingSystem::get();

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

        return view('client_register',[
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
