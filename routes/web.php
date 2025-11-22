<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function() {  
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');    
    });

    Route::resources([
        'user' => UserController::class,
        'kelas' => KelasController::class,
    ]);

    Route::controller(MateriController::class)->group(function () {
        Route::get('/materi/{kelas}', 'index')->name('materi.index');    
        Route::get('/materi/create', 'create')->name('materi.create');    
        Route::get('/materi/store', 'store')->name('materi.store');    
        Route::get('/materi/{materi}/edit', 'edit')->name('materi.edit');    
        Route::get('/materi/{materi}/update', 'update')->name('materi.update');    
        Route::get('/materi/{materi}/destroy', 'destroy')->name('materi.destroy');    
    });

    
});
