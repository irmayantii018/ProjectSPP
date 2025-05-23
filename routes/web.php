<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\orangtua; 
use App\Http\Controllers\RegisController; 

Route::get('/', function () {
    return view('pages.welcome');
});
Route::get('/login', function () {
    return view('loyouts.login');
});

Route::get('/regis', [RegisController::class, 'tampil_regis'])->name('regis');
Route::post('/kirim', [RegisController::class, 'kirim_data'])->name('kirim');


Route::get('/login', [orangtua::class, 'login'])->name('login');
Route::post('/login', [orangtua::class, 'authenticate']);
Route::post('/logout', [orangtua::class, 'logout'])->name('logout');
