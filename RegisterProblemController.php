<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LogHistory;
use App\Models\SpecialistTracker;
use Illuminate\Http\Request;
use App\Models\ProblemLog;
use App\Models\Hardware;
use DB;
use phpDocumentor\Reflection\Types\Null_;
use function PHPUnit\Framework\isEmpty;

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
        $spec = $request->specific_category;
        if($spec == "-") {
            $pID = $request->generic_category;
        }
        else {
            $pID = $spec;
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
            LogHistory::create([
                'description' => $request->description,
                'solution' => $request->solution_desc,
                'problem_log_id' => $logID[0]->id
            ]);
        }



        // Return to the dashboard once data is added to database
        return redirect()->route('client');
    }

    public function index(){
        // Get all data for dropdown lists
        $osNames = DB::select('select * from operating_systems');
        $softwares = DB::select('select * from software');
        $generalCategories = DB::select('select * from problems where problem_id is NULL');
        $specificCategories = DB::select('select * from problems where problem_id is not NULL');
        //dd($specificCategories[0]->id);
        $solutions = DB::select('select pl.title, lh.solution, pl.problem_id, pl.solved_at
                                from problem_logs as pl, log_histories as lh
                                where lh.problem_log_id = pl.id');

        // Return all data retrieved from db
        return view('client_register', [
            'navTitle'=>'register',
            'osNames'=>$osNames,
            'softwares'=>$softwares,
            'generalCategories'=>$generalCategories,
            'specificCategories'=>$specificCategories,
            'solutions'=>$solutions
        ]);
    }
}
