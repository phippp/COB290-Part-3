<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Problem;
use App\Models\Employee;
use App\Models\Hardware;
use App\Models\Software;
use App\Models\ProblemLog;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class AnalystController extends Controller
{

    public function index(){

        $employees = Employee::all()->count();
        $branches = Branch::all()->count();

        $hardware = Hardware::has('problemlog')->withCount('problemlog')->get();
        $software = Software::has('problemlog')->withCount('problemlog')->get();
        $types = Problem::has('problemLogs')->withCount('problemLogs')->get();
        $specialists = Employee::has('specialist')->get();

        $names = [];
        $solved = [];
        $queue = [];
        $verify = [];

        foreach($specialists as $specialist){
            $names = Arr::add($names,$specialist->id,$specialist->forename." ".$specialist->surname);
            $problemlogs = ProblemLog::selectRaw('count(*) as total, status')->groupBy('status')->with('trackers')->whereHas('trackers',function($query) use ($specialist){
                $query->where('employee_id',$specialist->id);
            })->get();

            foreach($problemlogs as $log){
                if($log->status == "Verify"){
                    $verify = Arr::add($verify, $specialist->id,$log->total);
                }else if($log->status == "In queue"){
                    $queue = Arr::add($queue, $specialist->id,$log->total);
                }else if($log->status == "Solved"){
                    $solved = Arr::add($solved, $specialist->id,$log->total);
                }
            }
        }

        return view(
            "analyst.analyst_dashboard",
            [
               "navTitle" => "dashboard",
               'hardware' => [
                    "labels" => $hardware->pluck('serial_num'),
                    "qty" => $hardware->pluck('problemlog_count')
               ],
               'software' => [
                    "labels" => $software->pluck('name'),
                    "qty" => $software->pluck('problemlog_count')
               ],
               'problem' => [
                    "labels" => $types->pluck('problem_type'),
                    "qty" => $types->pluck('problem_logs_count')
               ],
               "specialist" => [
                    "labels" => array_values($names),
                    "solved" => array_values($solved),
                    "queue" => array_values($queue),
                    "verify" => array_values($verify),
               ],
               "employees" => $employees,
               "branches" => $branches
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
