<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['guest']); //this stops the user visiting if they are logged in
    }

    public function index(){

        return view('login');
    }

    public function store(Request $request){

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if(!Auth::attempt($request->only('username','password'))){
            return back()->with('status', 'Invalid login details');
        }

        if(auth()->user()->employee->job->type == "Specialist"){
            return redirect()->route('index'); //Route for specialist home doesnt exist currently so this is temporary
        } else if(auth()->user()->employee->job->type == "User"){
            return redirect()->route('client');
        }

    }
}
