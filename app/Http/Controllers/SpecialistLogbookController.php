<?php

namespace App\Http\Controllers;

use App\Models\ProblemLog;
use Illuminate\Http\Request;

class SpecialistLogbookController extends Controller
{
    //
    function index(){
        return view('specialist.specialist_logbook',[
            'problemlogs' => ProblemLog::paginate(10),
            'navTitle' => 'logbook'
        ]);
    }
}
