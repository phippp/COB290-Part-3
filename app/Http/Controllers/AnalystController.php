<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Problem;
use App\Models\Employee;
use App\Models\Hardware;
use App\Models\Software;
use App\Models\ProblemLog;
use DateTime;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalystController extends Controller
{   


    public function index(){
        $employees = Employee::all()->count();
        $branches = Branch::all()->count();
        

        // these date are used in some of the query
        $date6MonthFromNow = date('Y-m-d', strtotime("-6 months"));
        $dateOfPrev12Month = date('Y-m-d', strtotime( date( 'Y-m-01' ) . "-1 year" ));

        
        ################ ONGOING CASES IMPORTANCE LEVEL ################
        $importanceLevel = ProblemLog::selectRaw("importance, COUNT(importance) as 'frequency'")
                            ->whereIn("status", ["In Queue", "Verify"])
                            ->groupBy("importance")
                            ->get();
        
        $importanceLevel = array_combine( 
            $importanceLevel->pluck("importance")->toArray(), // key of the array ("High", "Low", "Medium")
            $importanceLevel->pluck("frequency")->toArray()   // value
        );

        // additional validation check (if one of the category is not part of the ongoing case importance level)
        if(!array_key_exists("High", $importanceLevel)){
            $importanceLevel["High"] = 0;
        }
        if(!array_key_exists("Medium", $importanceLevel)){
            $importanceLevel["Medium"] = 0;
        }
        if(!array_key_exists("Low", $importanceLevel)){
            $importanceLevel["Low"] = 0;
        }


        ################ CLIENT METHOD OF REGISTERING PROBLEM ################
        // the number of client who found the solution using recommended solution of similar problem type 
        // VS 
        // the problem being assigned to a specialist
        $registerOptionSelected = ProblemLog::selectRaw("specialist_assigned, COUNT(id) as 'frequency'")
                                    ->whereDate("created_at", '>=', $date6MonthFromNow)
                                    ->groupBy('specialist_assigned')
                                    ->orderBy('specialist_assigned')
                                    ->get();

        $registerOptionSelected = $registerOptionSelected->pluck("frequency")->toArray();

        // dd($registerOptionSelected);



        ################ EQUIPMENT DATA (from last 6 month) ################
        // we are splitting the equipment data in 3 section (software, hardware, software and hardware)

        $softwareReported = ProblemLog::selectRaw("COUNT(software_id) as 'cases'")
                            ->whereDate("created_at", '>=', $date6MonthFromNow)
                            ->whereNotNull("software_id")
                            ->whereNull('hardware_id')
                            ->get();


        $hardwareReported = ProblemLog::selectRaw("COUNT(hardware_id) as 'cases'")
                            ->whereDate("created_at", '>=', $date6MonthFromNow)
                            ->whereNotNull("hardware_id")
                            ->whereNull('software_id')
                            ->get();


        $softwareAndHardwareReported = ProblemLog::selectRaw("COUNT(id) as 'cases'")
                            ->whereDate("created_at", '>=', $date6MonthFromNow)
                            ->whereNotNull(["software_id","hardware_id"])
                            ->get();

        $equipmentReported = array(
            "software" => $softwareReported->toArray()[0]['cases'],
            "hardware" => $hardwareReported->toArray()[0]['cases'],
            "both" => $softwareAndHardwareReported->toArray()[0]['cases']
        );

        unset($softwareReported, $hardwareReported, $softwareAndHardwareReported);  // these variable are no longer needed



        
        
        ################ CASES CREATED & SOLVED IN THE LAST 12 MONTH DATA  ################

        $casesIssued  = ProblemLog::selectRaw('COUNT(*) as "cases", DATE_FORMAT(created_at, "%Y-%m-01") as "date"')
                                    ->whereDate("created_at", ">=", $dateOfPrev12Month )
                                    ->groupByRaw('DATE_FORMAT(created_at, "%Y-%m-01")')
                                    ->orderBy("created_at")
                                    ->get();


        $casesIssued = array_combine( 
            $casesIssued->pluck("date")->toArray(),
            $casesIssued->pluck("cases")->toArray()   
        );

        
        $casesSolved =  ProblemLog::selectRaw('COUNT(*) as "cases", DATE_FORMAT(created_at, "%Y-%m-01") as "date"')
                                ->whereDate("created_at", ">=", $dateOfPrev12Month )
                                ->groupByRaw('status, DATE_FORMAT(created_at, "%Y-%m-01")')
                                ->having("status", "Solved")
                                ->get();
        
        $casesSolved = array_combine(
            $casesSolved->pluck("date")->toArray(),
            $casesSolved->pluck("cases")->toArray()   
        );
        

        // these are the array which will be passed in the blade file so data can be rendered easily in chart.js
        $monthXAxis = array();                  // this will store the month's name e.g Mar, Apr, June, etc...
        $casesIssuedFrequency = array();
        $casesSolvedFrequency = array();


        // these variable are used in the for loop which act as a counter.
        $year = intval(date_format(date_create("$dateOfPrev12Month"), "Y")); 
        $month = intval(date_format(date_create("$dateOfPrev12Month"), "m"));

        for ($i=0; $i <= 12; $i++) { 
            // incrementing the month
            $monthDate = date("Y-m-d", strtotime("$year-$month-01"));

            // cases that are issued
            if(array_key_exists($monthDate, $casesIssued)){
                array_push($casesIssuedFrequency, $casesIssued[$monthDate]);
            } else {
                array_push($casesIssuedFrequency, 0);
            }
            
            // cases that are solved
            if(array_key_exists($monthDate, $casesSolved)){
                array_push($casesSolvedFrequency, $casesSolved[$monthDate]);
            } else {
                array_push($casesSolvedFrequency, 0);
            }
            
            // adding the month value in the array
            array_push($monthXAxis, date_format(date_create("$year-$month-01"),"M"));
            
            // incrementing the month
            if($month == 12){
                // month only ranges from 1-12, therefore we need to reset the month value to 1 and increase the year
                $month = 1;
                $year +=1;
            } else {
                $month += 1;
            }
        }

        unset($casesIssued, $casesSolved, $year, $month);  // no longer need these variable

        
        
        ################ WEEKLY DATA ON THE NUMBER OF CASES CREATED  ################
        $thirdWeekDate =  date("Y-m-d", strtotime("-3 week Monday"));
        $secondWeekDate = date("oW", strtotime("-2 week Monday"));
        
        $weeklyCasesComparison = ProblemLog::selectRaw("count(id) as 'cases', WEEKDAY(created_at) as 'dayNum', created_at")
                    ->groupByRaw("WEEKDAY(created_at)")
                    ->whereDate("created_at", '>=', $thirdWeekDate)
                    ->orderBy("created_at")
                    ->get();
        
        // created this variable so it's easier to render when passing data to javascript. 
        // These are the default values for each of the week (no case reported)
        // each index represent the day and the value represent the number of cases reported on that day
        $thisWeekData = array(0, 0, 0, 0, 0, 0, 0);
        $secondWeekData = array(0, 0, 0, 0, 0, 0, 0);
        $thirdWeekData = array(0, 0, 0, 0, 0, 0, 0);
        
        // these is used in the query to get all cases that are reported from third week on
        $thirdWeekDate = date_format(new DateTime($thirdWeekDate), "oW"); 


        foreach ($weeklyCasesComparison as $weeklyData) {
            $indexPos = intval($weeklyData['dayNum']);

            $weekNumCreatedAt = date("oW", strtotime($weeklyData["created_at"]));

            if($weekNumCreatedAt == $thirdWeekDate){
                $thirdWeekData[$indexPos] = $weeklyData['cases'];

            } else if ($weekNumCreatedAt == $secondWeekDate) {
                $secondWeekData[$indexPos] = $weeklyData['cases'];

            } else {
                $thisWeekData[$indexPos] = $weeklyData['cases'];
            }
        }

        unset($weeklyCasesComparison, $thirdWeekDate, $secondWeekDate); // no longer need these variable



        ################ AVG TIME TO SOLVE A PROBLEM  ################

        // this array will have 4 element where each index will represents a week
        $avgWeeklyTimeToSolve = array();   
        
        for ($i=1; $i <= 4 ; $i++) {
            
            // getting the week start and end date of the $i' th week.
            $startOfWeek =  date("Y-m-d", strtotime("-" . $i ."week Monday"));
            $endOfWeek = date("Y-m-d", strtotime("-" . $i-1 ."week Sunday"));
            
            // note: DATEDIFF return the number of days between two date values
            $query = ProblemLog::selectRaw("AVG(DATEDIFF(solved_at, created_at)) as 'timeTaken'")
                        //::selectRaw("TIMESTAMPDIFF(HOUR, created_at, solved_at) as 'timeTaken' ")
                        ->where("status", "Solved")
                        ->whereNotNull("solved_at")
                        ->whereBetween("created_at", [$startOfWeek, $endOfWeek])
                        ->get()
                        ->toArray();

            $time = $query[0]["timeTaken"];
            if(is_null($time)){
                array_push($avgWeeklyTimeToSolve, 0);       
            } else {
                array_push($avgWeeklyTimeToSolve, doubleval($time));       
            }
        }



                            


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

        // dd($hardware->map->only(["serial_num", "make", "type", "name"]));

        return view(
            "analyst.analyst_dashboard",
            [
               "navTitle" => "dashboard",

               "importanceLevel" => $importanceLevel,

               "registerMethod" => $registerOptionSelected,

               "equipmentReported" => $equipmentReported,

               "timeTakenForSolution" => $avgWeeklyTimeToSolve,

               "cases12Month" => [
                   "xAxis" => $monthXAxis,
                   "solved" => $casesSolvedFrequency,
                   "issued" =>  $casesIssuedFrequency
               ],

               "weeklyComparison" => [
                   "thisWeek" => $thisWeekData,
                   "secondWeek" => $secondWeekData,
                   "thirdWeek" => $thirdWeekData
                ],

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

    public function logfile(Request $request){
        

        // this if statement will only run if the user has clicked the "download" button in the logfile page
        if($request->method() == "POST"){
            // this will convert the database record into excel file and download it on the user's computer.
        
            $logfileDB = ProblemLog::all()->toArray();

            $fileName = "logfileData.xls";
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=\"$fileName\" ");
            $isPrinterHeader = false;
            
            foreach ($logfileDB as $rowValues) {
                if(!$isPrinterHeader){
                    echo implode("\t", array_keys($rowValues)) . "\n";
                    $isPrinterHeader = true;
                } 
                echo implode("\t", array_values($rowValues)) . "\n";
                # code...
            }
            exit(); // this is needed to end the header
        } 


        return view(
            "analyst.analyst_logfile",
            [
                "navTitle" => "logfile"
            ]
        );
    }
}
