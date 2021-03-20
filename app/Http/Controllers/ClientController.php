<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProblemLog;
use App\Models\Employee;

class ClientController extends Controller
{
    //
    public function __construct(){

        $this->middleware(['auth','check.user']);

    }

    public function store(Request $request){
        dd($request);
    }

    public function index(){
        $id = auth()->user()->employee_id;
        $employee = Employee::find($id);
        $problemlogs = $employee->problemLogs()->get();

        return view('client_dashboard', ['navTitle'=>'dashboard'], [
            'problemlogs' => $problemlogs
        ]);
    }
}
