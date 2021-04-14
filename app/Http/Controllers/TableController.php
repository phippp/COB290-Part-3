<?php

namespace App\Http\Controllers;

use App\Models\ProblemLog;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class TableController extends Controller
{
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

        if($request->client_id != null){
            $filter = Arr::add($filter, "client", ['client_id', '=', $request->client_id]);
        }

        $logs = ProblemLog::select();

        foreach($filter as $option){
            $logs->where($option[0],$option[1], $option[2]);
        }

        foreach($between as $option){
            $logs->whereBetween($option[0],$option[1]);
        }

        if($request->filter['date']['ascending'] == 'false' || !$request->filter['id']['ascending'] == 'false'){
            $logs->orderBy('created_at','DESC');
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
}
