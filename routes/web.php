<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::resource('/auth', AuthController::class);
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.auth');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout.auth');

Route::resource('/administrator', UserController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome', [
        "template" => "User Template"
    ]);
})->middleware('auth');;

Route::get('/superadmin', function () {
    return view('welcome', [
        "template" => "Super Admin Template"
    ]);
})->middleware('superadmin');

Route::get('/admin', function () {
    return view('welcome', [
        "template" => "Admin Template"
    ]);
});