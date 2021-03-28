<?php

namespace App\Http\Controllers;

use App\Models\ProblemLog;
use Illuminate\Http\Request;

class ClientProblemEditController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','check.user']);
    }

    public function index(ProblemLog $problemlog){
        $solved = ProblemLog::where([['status','Solved'],['id','<>',$problemlog->id]])->paginate(10);  //gets all solved problems excluding the current one
        return view('client_edit_problem',['navTitle'=>''],['problemlog' => $problemlog, 'logs'=> $solved]);
    }
}
