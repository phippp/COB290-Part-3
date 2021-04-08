<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\ProblemLog;
use App\Models\ProblemNote;
use Illuminate\Http\Request;

class LogOverviewController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','check.specialist']);
    }

    public function index(ProblemLog $problemlog){
        // dd($problemlog);
        return view('specialist\specialist_view_problem',['navTitle'=>'dashboard'],['problemlog' => $problemlog]);
    }
}
