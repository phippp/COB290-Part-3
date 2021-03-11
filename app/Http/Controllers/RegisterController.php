<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //

    public function __construct(){

        $this->middleware(['guest']);

    }

    public function index(){

        return view('register');

    }

    public function store(Request $request){

        $this->validate($request,[
            'username' => 'required|max:255',
            'password' => 'required'
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        Auth::attempt($request->only('username', 'password'));

        return redirect()->route('index');

    }
}
