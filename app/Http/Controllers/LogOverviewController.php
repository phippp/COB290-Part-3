<?php

namespace App\Http\Controllers;

use App\Models\ProblemLog;
use Illuminate\Http\Request;

class LogOverviewController extends Controller
{
    //
    public function __construct(){

        $this->middleware(['auth','check.user']);

    }

    public function index(ProblemLog $problemlog){
        // dd($problemlog);
        return view('log_overview',['navTitle'=>'dashboard'],['problemlog' => $problemlog]);
    }
}
