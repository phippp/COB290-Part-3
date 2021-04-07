<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\Hardware;
use App\Models\Software;
use Illuminate\Http\Request;
use App\Models\OperatingSystem;

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

        $software = Software::get();

        $hardware = Hardware::get();

        $operatingSystems = OperatingSystem::get();

        $category = Problem::select('problem_type', 'problem_id')->where('enabled', 1)->orderBy('problem_type')->get();

        $genericCategory = $category
            ->where('problem_id', NULL)
            ->sortBy('problem_type')
            ->pluck('problem_type')
            ->toArray();

        $specificCategory = $category
            ->where('problem_id', '<>', NULL)
            ->sortBy('problem_type')
            ->pluck('problem_type')
            ->toArray();

        $organizedCategory = array(); // associative array to keep track of generic and specific category

        foreach($category as $thisCategory){
            // for each category type, it will check if its generic or not and based on that it will create the appropriate element in the array

            if( is_null($thisCategory->problem_id)){
                // checking if the category type is generic, if so then we create key with that name

                if(!array_key_exists($thisCategory->problem_type, $organizedCategory)){ // having this if statement as a safety check
                    $organizedCategory[$thisCategory->problem_type] = array();
                }

            } else {
                // if it's a specific category
                $key = $thisCategory->parentProblem->problem_type;
                if (array_key_exists($key, $organizedCategory)){
                    array_push($organizedCategory[$key], $thisCategory->problem_type);
                } else {
                    $organizedCategory[$key] = array($thisCategory->problem_type);
                }

            }
        }

        return view('client_register',[
            'navTitle'=>'register',
            'genericCategory' => $genericCategory,
            'specificCategory' => $specificCategory,
            'organizedCategory' => $organizedCategory,
            'software' => $software,
            'operatingSystems' => $operatingSystems,
            'hardware' => $hardware
            ]);
    }
}
