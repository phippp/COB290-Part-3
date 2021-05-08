<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hardware;
use App\Models\Software;

class SpecialistDevicesController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['auth','check.specialist']);
    }

    public function store(Request $request){
        dd($request);
    }

    public function index(){
        return view('specialist.specialist_devices', 
        [
            'navTitle'=>'devices',
            'hardware' => Hardware::get(),
            'software' => Software::get(),
        ]);
    }
}
