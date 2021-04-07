<?php

namespace App\Http\Controllers;

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
        return view(
            'specialist\specialist_dashboard', 
            ['navTitle'=>'dashboard']
        );
    }
}
