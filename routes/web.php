<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//route::resource
Route::resource('/siswa', \App\Http\Controllers\SiswaController::class);

Route::resource('/dudi', \App\Http\Controllers\DudiController::class);

Route::resource('/pkl', \App\Http\Controllers\PklController::class);
