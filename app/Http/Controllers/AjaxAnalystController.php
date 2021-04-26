<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;

class AjaxAnalystController extends Controller
{
    //
    function getTable(Request $request){
        $problems = Problem::has('problemLogs')->with('problemLogs')->withCount('problemLogs')
        ->where('problem_type','like','%'.$request->search.'%')->orderBy('problem_logs_count','DESC')->paginate(10);
        $view = View("analyst.training_table",[
            "problems" => $problems,
            "time" => $request->time == "true"
        ])->render();
        return response()->json(["html" => $view,"specialist" => $request->time],200);
    }
}
