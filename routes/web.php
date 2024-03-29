<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AnalystController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\AjaxAnalystController;
use App\Http\Controllers\LogOverviewController;
use App\Http\Controllers\AjaxSolutionController;
use App\Http\Controllers\SpecialistInfoController;
use App\Http\Controllers\VerifySolutionController;
use App\Http\Controllers\RegisterProblemController;
use App\Http\Controllers\ClientProblemEditController;
use App\Http\Controllers\SpecialistDevicesController;
use App\Http\Controllers\SpecialistLogbookController;
use App\Http\Controllers\SpecialistProfileController;
use App\Http\Controllers\ClientProblemOverviewController;
use App\Http\Controllers\SpecialistProblemEditController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/client/{problemlog:id}/view', [ClientProblemOverviewController::class, 'index'])->whereNumber('id')->name('client_problem_view');
Route::get('/client/{problemlog:id}/viewworked', [ClientProblemOverviewController::class, 'solutionWorked'])->whereNumber('id')->name('client_problem_view_worked');
Route::get('/client/{problemlog:id}/viewdidnotwork', [ClientProblemOverviewController::class, 'solutionDidNotWork'])->whereNumber('id')->name('client_problem_view_did_not_work');

Route::get('/client/{problemlog:id}/edit', [ClientProblemEditController::class, 'index'])->whereNumber('id')->name('client_problem_edit');
Route::post('/client/{problemlog:id}/edit', [ClientProblemEditController::class, 'store'])->whereNumber('id')->name('client_problem_update_existing');
Route::get('/client/{problemlog:id}/verify', [VerifySolutionController::class, 'index'])->whereNumber('id')->name('client_verify_solution');

Route::get('/client', [ClientController::class, 'index'])->name('client');
Route::post('/client', [ClientController::class, 'store']);

Route::get('/specialist', [SpecialistController::class, 'index'])->name('specialist');
Route::post('/specialist', [SpecialistController::class, 'store']);

Route::post('returnCustomTable', [TableController::class, 'returnCustomTable'])->name('custom_table');
Route::post('clientSolutions', [AjaxSolutionController::class, 'getSolutions'])->name('custom_solutions');

Route::get('/specialist/{problemlog:id}/view', [LogOverviewController::class, 'index'])->whereNumber('id')->name('log_overview');

Route::get('/specialist/{problemlog:id}/edit', [SpecialistProblemEditController::class, 'index'])->whereNumber('id')->name('specialist_edit_problem');
Route::post('/specialist/{problemlog:id}/edit', [SpecialistProblemEditController::class, 'store']);

// Specialist Profile
Route::get('/specialist/profile/', [SpecialistProfileController::class, 'viewProfile'])->name('specialist_profile');

Route::get('/specialist/profile/language', [SpecialistProfileController::class, 'language'])->name('specialist_lang');
Route::post('/specialist/profile/language', [SpecialistProfileController::class, 'storeLanguage']);

Route::get('/specialist/profile/workdays', [SpecialistProfileController::class, 'workdays'])->name('specialist_workdays');
Route::post('/specialist/profile/workdays', [SpecialistProfileController::class, 'storeWorkdays']);

Route::get('/specialist/profile/availability', [SpecialistProfileController::class, 'availability'])->name('specialist_availability');
Route::post('/specialist/profile/availability', [SpecialistProfileController::class, 'storeAvailability']);

Route::get('/specialist/profile/skills', [SpecialistProfileController::class, 'viewSkills'])->name('specialist_skills');
// >> editing details in specialist profile
Route::get('/specialist/profile/skills/edit', [SpecialistProfileController::class, 'editSkills'])->name('specialist_skills_edit');
Route::post('/specialist/profile/skills/edit', [SpecialistProfileController::class, 'storeEditSkills'])->name('specialist_skills_edit');

Route::get('/specialist/profile/availability/edit/{Holiday:id}',[SpecialistProfileController::class, 'editAvailability'])->name('specialist_availability_edit');
Route::post('/specialist/profile/availability/edit/{Holiday:id}',[SpecialistProfileController::class, 'storeEditAvailability']);

Route::get('/logbook', [SpecialistLogbookController::class, 'index'])->name('logbook');

Route::get('/register', [RegisterProblemController::class, 'index'])->name('registerProblem');
Route::post('/register', [RegisterProblemController::class, 'store'])->name('validateRegisterProblem');

// Analyst Controller
Route::get('/analyst', [AnalystController::class, 'index'])->name('analyst');
Route::get('/analyst/logfile', [AnalystController::class, 'logfile'])->name('analyst_logfile');
Route::post('/analyst/logfile', [AnalystController::class, 'logfile'])->name('analyst_logfile_download');
Route::get('/analyst/equipment', [AnalystController::class, 'equipment'])->name('analyst_equipment');
Route::get('/analyst/training', [AnalystController::class, 'training'])->name('analyst_training');

//Analyst Ajax Pages
Route::post('/analyst/training/table', [AjaxAnalystController::class, 'getTable'])->name('training_table');

Route::get('/specialist_info', [SpecialistInfoController::class, 'index'])->name('specialist_info');

Route::get('/devices', [SpecialistDevicesController::class, 'index'])->name('devices');

Route::permanentRedirect('/','/login');
