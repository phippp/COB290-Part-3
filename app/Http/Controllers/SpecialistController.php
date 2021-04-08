<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\ProblemLog;
use App\Models\Employee;

class SpecialistController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['auth','check.specialist']);
    }

    public function store(Request $request){
        dd($request);
    }

    public function index(){

        $problemlogs = ProblemLog::where('employee_id',auth()->user()->employee->id)->paginate(5);
        $specialist_cases = ProblemLog::where('employee_id',auth()->user()->employee->id)->get();
        $cases_today = ProblemLog::where('employee_id',auth()->user()->employee->id)
                        ->whereDate('created_at', '=', Carbon::now()->toDateString())
                        ->count();
        $solved_cases = $specialist_cases
                        ->where('status', 'Solved')
                        ->count();
        $cases_to_resolve = $specialist_cases
                        ->where('status', '<>', 'Solved')
                        ->count();
        $low_importance = $specialist_cases
                        ->where('importance', 'low')
                        ->count();
        $medium_importance = $specialist_cases
                        ->where('importance', 'medium')
                        ->count();
        $high_importance = $specialist_cases
                        ->where('importance', 'high')
                        ->count();

        return view('specialist.specialist_dashboard',
        ['navTitle'=>'dashboard',
            'problemlogs' => $problemlogs,
            'cases_today' => $cases_today,
            'solved_cases' => $solved_cases,
            'cases_to_resolve' => $cases_to_resolve,
            'low_importance' => $low_importance,
            'medium_importance' => $medium_importance,
            'high_importance' => $high_importance
        ]);
    }
}
