<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterProblemController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['auth','check.user']);
    }

    public function store(Request $request){
        dd($request);
    }

    public function index(){
        return view('client_register',['navTitle'=>'register']);
    }
}