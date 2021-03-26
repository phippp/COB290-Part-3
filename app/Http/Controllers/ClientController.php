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
        return view('client_dashboard', ['navTitle'=>'dashboard'], [
            'problemlogs' => ProblemLog::where('client_id',auth()->user()->employee->id)->paginate(5)
        ]);
    }
}
