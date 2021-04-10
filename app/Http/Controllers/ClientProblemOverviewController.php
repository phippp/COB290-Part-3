<?php

namespace App\Http\Controllers;

use App\Models\ProblemLog;
use Illuminate\Http\Request;

class ClientProblemOverviewController extends Controller
{
    //
    public function __construct(){

        $this->middleware(['auth','check.user']);

    }

    public function index(ProblemLog $problemlog){
        // dd($problemlog);
        return view('client.client_view_problem',['navTitle'=>'dashboard'],['problemlog' => $problemlog]);
    }
}
