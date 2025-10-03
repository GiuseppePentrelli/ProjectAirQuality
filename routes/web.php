<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\StationController;

// Rotte pagina Home
Route::get('/' ,[PublicController::class , 'homeFunction'])->name('welcome');

// Rotte per cambiare lingua
Route::post('/lingua/{lang}', [PublicController::class, 'setLenguage'])->name('setLocale');

// Rotte frontend
Route::get('/station', [StationController::class, 'index'])->name('stations.index');
Route::get('/station/{site}', [StationController::class, 'show'])->name('stations.show');


// 404
    Route::fallback(function () {
    return view('stations.error'); 
});