<?php

namespace App\Http\Controllers;

use App\Models\Hardware;
use App\Models\ProblemLog;
use App\Models\ProblemNote;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class AjaxSolutionController extends Controller
{
    function getSolutions(Request $request){

        $filter = array();
        $problems = ProblemLog::where('status','Solved');

        if($request->hardware != null){
            $hardware = Hardware::where('serial_num',$request->hardware)->first();
            if($hardware != null){
                $filter = Arr::add($filter, "hardware", ['hardware_id','=',$hardware->id]);
            }
        }

        if($request->software != null){
            $filter = Arr::add($filter, "software", ['software_id','=',$request->software]);
        }

        foreach($filter as $condition){
            $problems->where($condition[0],$condition[1],$condition[2]);
        }

        $problems = $problems->get('id')->toArray();

        $solutions = ProblemNote::whereIn('problem_log_id',$problems)->where('solution','<>',null)->limit(10)->get();

        $view = view('client.solutions',[
            'solutions' => $solutions
        ])->render();

        return response()->json(['request' => $request->all(), 'html' => $view, 'solutions' => $solutions, 'filters' => $filter],200);
    }
}
