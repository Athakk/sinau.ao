<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserKelasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function() {  
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');    
    });

    Route::resources([
        'user' => UserController::class,
        'kelas' => KelasController::class,
        'userKelas' => UserKelasController::class,
        'kelas.materi' => MateriController::class,
    ]);
});
