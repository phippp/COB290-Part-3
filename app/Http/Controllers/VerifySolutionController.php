<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Problem;
use App\Models\ProblemLog;
use App\Models\ProblemNote;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VerifySolutionController extends Controller
{

    public function __construct(){
        $this->middleware(['auth','check.user']);
    }

    public function index(ProblemLog $problemlog){

        $problemHistory = ProblemNote::where('problem_log_id', $problemlog->id)->get();


        return view('client.client_verify_solution', [
            'navTitle'=>'Verify solution',
            'problemHistory' => $problemHistory,
            'problemlog' => $problemlog
            ]);
    }
}
?>