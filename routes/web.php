<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\SurveiController;
use App\Http\Controllers\InsidenController;
use App\Http\Controllers\AdminProyekController;
use App\Http\Controllers\AdminRencanaController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\LaporanManagerController;



Route::resource('/auth', AuthController::class);
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.auth');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout.auth');

Route::resource('/administrator', AdministratorController::class);
Route::resource('/administrator/proyek', AdminProyekController::class);
Route::resource('/administrator/rencana', AdminRencanaController::class);

Route::resource('/manager/proyek', ProyekController::class);
Route::resource('/manager/laporan', LaporanManagerController::class);
Route::resource('/manager/insiden', InsidenController::class);

Route::resource('/pengawas/survei', SurveiController::class);

Route::resource('/user', UserController::class);

Route::resource('/image', ImageController::class);





























Route::get('/', function () {
    return view('welcome', [
        "title" => "PROYEK",
        "link" => "/administrator/proyek/create",
        "subTitle" => null,
    ]);
})->middleware('auth');;

Route::get('/superadmin', function () {
    return view('welcome', [
        "title" => "Super Admin Template",
        "template" => "Super Admin Template"
    ]);
})->middleware('superadmin');
