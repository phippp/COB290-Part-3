<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\Hardware;
use App\Models\Software;
use App\Models\ProblemLog;
use App\Models\ProblemNote;
use Illuminate\Http\Request;
use App\Models\OperatingSystem;
use App\Http\Controllers\Controller;

class SpecialistProblemEditController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','check.specialist']);
    }

    public function index(ProblemLog $problemlog){

        return view(
            'edit_log_overview',
            [    // put in this array all the data that needs to be sent to the front-end page
                'navTitle'=>'Logbook',
                'problemlog' => $problemlog
            ]
        );
    }
}
