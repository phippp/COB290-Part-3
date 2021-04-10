<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\Employee;
use App\Models\ProblemLog;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SpecialistController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['auth','check.specialist']);
    }

    public function store(Request $request){
        dd($request);
    }

    public function returnCustomTable(Request $request){

        $filter = array();
        $between = array();

        if($request->search['value'] != null){
            $filter = Arr::add($filter,$request->search['field'],[$request->search['field'],'like',$request->search['value']]);
        }

        if($request->filter['date']['start'] != null && $request->filter['date']['end'] != null){
            $between = Arr::add($between, "date", ["created_at",[$request->filter['date']['start'], $request->filter['date']['end']]]);
        }

        if($request->filter['id']['start'] != null && $request->filter['id']['end'] != null){
            $between = Arr::add($between, "id", ["id",[$request->filter['id']['start'], $request->filter['id']['end']]]);
        }

        if($request->filter['importance'] != null){
            $filter = Arr::add($filter,"importance",['importance', '=', $request->filter['importance']]);
        }

        if($request->filter['status'] != null){
            $filter = Arr::add($filter,"status",['status', '=', $request->filter['status']]);
        }

        if($request->filter['title'] != null){
            $filter = Arr::add($filter,"title",['title', 'like', $request->filter['title']]);
        }

        $logs = ProblemLog::select();

        foreach($filter as $option){
            $logs->where($option[0],$option[1], $option[2]);
        }

        foreach($between as $option){
            $logs->whereBetween($option[0],$option[1]);
        }

        if( !$request->filter['date']['ascending'] || !$request->filter['id']['ascending']){
            $logs->orderBy('id','desc');
        }

        if($request->user_id != null){
            $logs->whereHas('trackers',function($query) use ($request) {
                $query->where('employee_id',$request->user_id);
            });
        }

        $logs = $logs->paginate(5);

        $html = view('specialist.table',['problemlogs' => $logs])->render();

        return response()->json(['html' => $html, 'request' => $request->all()],200);

    }

    public function index(){

        $problemlogs = ProblemLog::with('trackers')->whereHas('trackers',function($query){
            $query->where('employee_id',auth()->user()->employee->id);
        })->paginate(5);
        //Now displays any jobs that a specialist was ever assigned to

        $specialist_cases = ProblemLog::where('employee_id',auth()->user()->employee->id)->get();
        $cases_today = ProblemLog::with('trackers')->whereHas('trackers',function($query){
                            $query->where('employee_id',auth()->user()->employee->id);
                        })
                        ->whereDate('created_at', '=', Carbon::now()->toDateString())
                        ->count();
        $solved_cases = $specialist_cases
                        ->where('status', 'Solved')
                        ->count();
        $cases_to_resolve = $specialist_cases
                        ->where('status', '<>', 'Solved')
                        ->count();
        $low_importance = $specialist_cases
                        ->where('importance', 'low')
                        ->count();
        $medium_importance = $specialist_cases
                        ->where('importance', 'medium')
                        ->count();
        $high_importance = $specialist_cases
                        ->where('importance', 'high')
                        ->count();

        return view('specialist.specialist_dashboard',
        ['navTitle'=>'dashboard',
            'problemlogs' => $problemlogs,
            'cases_today' => $cases_today,
            'solved_cases' => $solved_cases,
            'cases_to_resolve' => $cases_to_resolve,
            'low_importance' => $low_importance,
            'medium_importance' => $medium_importance,
            'high_importance' => $high_importance
        ]);
    }
}
