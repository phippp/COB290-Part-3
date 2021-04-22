<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class SpecialistInfoTableController extends Controller
{
    public function returnSpecialistInfoTable(Request $request){

        $specialists = Employee::whereIn('job_id', $specialist_jobs_ids)
            ->select('employees.*', 'branches.city', 'branches.country',
                DB::raw('IFNULL(COUNT(specialist_trackers.id), 0) as count'))
            ->join('branches', 'employees.branch_id', '=', 'branches.id')
            ->leftJoin('specialist_trackers', 'specialist_trackers.employee_id', '=', 'employees.id')
            ->groupBy('employees.id')
            ->select();

        if($request->search['value'] != null){
            $field = $request->search['field'];
            $value = $request->search['value'];
            $specialists -> where($field,'like', $value);
        }

        $specialists = $specialists->paginate(5);

        $html = view('specialist_info_table',['specialists' => $specialists])->render();
        
        return response()->json(['html' => $html, 'request' => $request->all()],200);

    }
}
