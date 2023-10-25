<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdministratorController;

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

Route::resource('/administrator', AdministratorController::class);
// Route::resource('/proyek', ManagerProyekController::class);

Route::resource('/user', UserController::class);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome', [
        "title" => "User Template",
        "template" => "User Template"
    ]);
})->middleware('auth');;

Route::get('/superadmin', function () {
    return view('welcome', [
        "title" => "Super Admin Template",
        "template" => "Super Admin Template"
    ]);
})->middleware('superadmin');

Route::get('/admin', function () {
    return view('welcome', [
        "title" => "Admin Template",
        "template" => "Admin Template"
    ]);
});
Route::get('/proyek', function () {
    return view('manager_proyek.proyek', [
        "title" => "Proyek",
        "template" => "Proyek"
    ]);
});