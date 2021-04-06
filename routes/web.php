<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterProblemController;
use App\Http\Controllers\ClientProblemEditController;
use App\Http\Controllers\ClientProblemOverviewController;
use App\Http\Controllers\LogOverviewController;


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

// These only exist so that I could create an initial Hashed password
// Route::get('/test/register', [RegisterController::class, 'index'])->name('register');
// Route::post('/test/register', [RegisterController::class, 'store']);

Route::get('/client/{problemlog:id}/view', [ClientProblemOverviewController::class, 'index'])->whereNumber('id')->name('client_problem_view');

Route::get('/client/{problemlog:id}/edit', [ClientProblemEditController::class, 'index'])->whereNumber('id')->name('client_problem_edit');
Route::post('/client/{problemlog:id}/edit', [ClientProblemEditController::class, 'store']);

Route::get('/client', [ClientController::class, 'index'])->name('client');
Route::post('/client', [ClientController::class, 'store']);

Route::get('/specialist', [SpecialistController::class, 'index'])->name('specialist');
Route::post('/specialist', [SpecialistController::class, 'store']);

Route::get('/specialist/{problemlog:id}/view', [LogOverviewController::class, 'index'])->whereNumber('id')->name('log_overview');

Route::get('/register', [RegisterProblemController::class, 'index'])->name('registerProblem');
Route::post('/register', [RegisterProblemController::class, 'store']);

Route::get('/', function () {
    return view('index');
})->name('index');
