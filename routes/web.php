<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserKelasController;
use App\Http\Controllers\UserSubjectController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
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
        'subject' => SubjectController::class,
        'subject.material' => MaterialController::class,
        'userSubject' => UserSubjectController::class
    ]);
});

// FacadesAuth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
