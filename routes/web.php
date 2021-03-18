<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

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
Route::get('/client', function () {
    return view('client');
})->name('client');

Route::get('/register', function () {
    return view('registerclient');
})->name('registerclient');

Route::get('/', function () {
    return view('index');
})->name('index');
