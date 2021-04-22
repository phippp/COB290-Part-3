<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Employee;
use App\Models\Branch;

class SpecialistInfoController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['auth','check.specialist']);
    }

    public function store(Request $request){
        dd($request);
    }

    public function index(){

        $specialist_jobs_ids = Job::where('type', '=', 'Specialist')->select('id');

        $specialists = Employee::whereIn('job_id', $specialist_jobs_ids)
                ->join('branches', 'employees.branch_id', '=', 'branches.id')
                ->select('employees.*', 'branches.city', 'branches.country')
                ->paginate(5);

        return view('specialist.specialist_info', ['navTitle'=>'dashboard',
        'specialists' => $specialists
        ]);
    }
}
