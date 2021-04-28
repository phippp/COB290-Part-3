<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Holiday;
use Illuminate\Http\Request;
use DB;

class SpecialistProfileController extends Controller
{
    // Function relating to the specialists overall profile
    public function viewProfile(){
        // Getting the users employee id, required further on in the code
        $user = auth()->user()->employee_id;

        // Show availability
        $availability = DB::select('select * from holidays where employee_id =:id', ['id'=>$user]);

        // Getting the users working days
        $workingDays = DB::select('select * from specialists where employee_id = :id', ['id'=>$user]);
        $workingDaysSplit = explode(",", $workingDays[0]->working_days);

        // Making sure the working days are displayed, not in a code, but as the
        // actual names for the days of the week
        if(in_array("mo", $workingDaysSplit)){
            $workingDaysSplit[array_search('mo', $workingDaysSplit)] = "Monday";
        }
        if(in_array("tu", $workingDaysSplit)){
            $workingDaysSplit[array_search('tu', $workingDaysSplit)] = "Tuesday";
        }
        if(in_array("we", $workingDaysSplit)){
            $workingDaysSplit[array_search('we', $workingDaysSplit)] = "Wednesday";
        }
        if(in_array("th", $workingDaysSplit)){
            $workingDaysSplit[array_search('th', $workingDaysSplit)] = "Thursday";
        }
        if(in_array("fr", $workingDaysSplit)){
            $workingDaysSplit[array_search('fr', $workingDaysSplit)] = "Friday";
        }
        if(in_array("sa", $workingDaysSplit)){
            $workingDaysSplit[array_search('sa', $workingDaysSplit)] = "Saturday";
        }
        if(in_array("su", $workingDaysSplit)){
            $workingDaysSplit[array_search('su', $workingDaysSplit)] = "Sunday";
        }

        return view('specialist.profile.specialist_profile', [
            'navTitle' => 'profile',
            'sideBarNav' => 'profile',
            'availabilities' => $availability,
            'workingDays' => $workingDaysSplit
        ]);
    }


    // Functions relating to the specialists preferred language
    public function language(){
        return view('specialist.profile.specialist_language', [
            'navTitle' => 'profile',
            'sideBarNav' => 'lang'
        ]);
    }

    public function storeLanguage(Request $request){
        // Getting the users employee id, required further on in the code
        $user = auth()->user()->employee_id;

        // Get the language selected by the user and update the employees table
        $language = $request->language;
        DB::update('update employees set language = :lang where id = :id',
            ['lang' => $language, 'id' => $user]);

        return redirect()->route('specialist_lang');
    }


    // Functions relating to the days a specialist works
    public function workdays(){
        return view('specialist.profile.specialist_workdays', [
            'navTitle' => 'profile',
            'sideBarNav' => 'workdays'
        ]);
    }

    public function storeWorkdays(Request $request){
        // Getting the users employee id, required further on in the code
        $user = auth()->user()->employee_id;

        // Get the selected days and add to one string
        // (ensuring that the string is in the correct format for the
        //  database)
        $stringOfDays = "";
        if ($request->monday == "on") {
            $stringOfDays .= "mo,";
        }
        if ($request->tuesday == "on") {
            $stringOfDays .= "tu,";
        }
        if ($request->wednesday == "on") {
            $stringOfDays .= "we,";
        }
        if ($request->thursday == "on") {
            $stringOfDays .= "th,";
        }
        if ($request->friday == "on") {
            $stringOfDays .= "fr,";
        }
        if ($request->saturday == "on") {
            $stringOfDays .= "sa,";
        }
        if ($request->sunday == "on") {
            $stringOfDays .= "su,";
        }
        $stringOfDays = substr($stringOfDays, 0, -1);

        // Update the specialists table
        DB::update('update specialists set working_days = :days where employee_id = :id',
            ['days' => $stringOfDays, 'id' => $user]);

        return redirect()->route('specialist_workdays');
    }


    // Functions relating to a specialists availability
    public function availability(){
        // Getting the users employee id, required further on in the code
        $user = auth()->user()->employee_id;

        // Show current availability
        $availability = DB::select('select * from holidays where employee_id =:id', ['id'=>$user]);

        return view('specialist.profile.specialist_availability', [
            'navTitle' => 'profile',
            'sideBarNav' => 'availability',
            'availabilities' => $availability
        ]);
    }

    public function storeAvailability(Request $request){
        $this -> validate($request, [
            'available_reason' => 'required|max:255',
            'start_date' => 'required',
            'end_date' =>  'required'
        ],
        [ 'available_reason.required' => 'A reason is required.',
            'start_date.required' => 'A starting date of your absence is required.',
            'end_date.required' => 'An ending date of your absence is required.']);

        $user = auth()->user()->employee_id;
        // Storing availabilities the user has inputted
        Holiday::create([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->available_reason,
            'employee_id' => $user
        ]);

        return redirect()->route('specialist_availability');
    }


    // Function relating to a specialists skills
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
}
