<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalystController extends Controller
{

    public function index(){
        return view(
            "analyst\analyst_dashboard",
            [
               "navTitle" => "dashboard"
            ]
        );
    }
    public function equipment(){
        return view(
            "analyst.analyst_equipment",
            [
                "navTitle" => "equipment",
            ]
        );
    }

    public function training(){
        return view(
            "analyst.analyst_training",
            [
                "navTitle" => "training",
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
