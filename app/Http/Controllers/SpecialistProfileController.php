<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecialistProfileController extends Controller
{
    public function viewProfile(){
        return view('specialist.profile.specialist_profile', [
            'navTitle' => 'profile',
            'sideBarNav' => 'profile'
        ]);
    }

    public function language(){
        return view('specialist.profile.specialist_language', [
            'navTitle' => 'profile',
            'sideBarNav' => 'lang'
        ]);
    }

    public function workdays(){
        return view('specialist.profile.specialist_workdays', [
            'navTitle' => 'profile',
            'sideBarNav' => 'workdays'

        ]);
    }

    public function availability(){
        return view('specialist.profile.specialist_availability', [
            'navTitle' => 'profile',
            'sideBarNav' => 'availability'
        ]);
    }

    public function viewSkills(){
        return view('specialist.profile.specialist_skills', [
            'navTitle' => 'profile',
            'sideBarNav' => 'skills'
        ]);
    }

    public function editSkills(){
        return view('specialist.profile.specialist_edit_skills', [
            'navTitle' => 'profile',
            'sideBarNav' => 'skills'
        ]);
    }

    public function editAvailability(){
        return view('specialist.profile.specialist_edit_availability', [
            'navTitle' => 'profile',
            'sideBarNav' => 'availability'
        ]);
    }
}