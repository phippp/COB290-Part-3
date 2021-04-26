<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\Hardware;
use App\Models\Software;
use Illuminate\Http\Request;

class AnalystController extends Controller
{

    public function index(){
        return view(
            "analyst.analyst_dashboard",
            [
               "navTitle" => "dashboard"
            ]
        );
    }
    public function equipment(){

        $hardware = Hardware::has('problemlog')->with('problemlog')->get();
        $software = Software::has('problemlog')->with('problemlog')->get();

        return view(
            "analyst.analyst_equipment",
            [
                "navTitle" => "equipment",
                'hardware' => $hardware,
                'software' => $software
            ]
        );
    }

    public function training(){

        $problems = Problem::has('problemLogs')->with('problemLogs')->withCount('problemLogs')->orderBy('problem_logs_count','DESC')->paginate(10);

        return view(
            "analyst.analyst_training",
            [
                "navTitle" => "training",
                'problems' => $problems
            ]
        );
    }

    public function logfile(){
        return view(
            "analyst.analyst_logfile",
            [
                "navTitle" => "logfile"
            ]
        );
    }
}
