<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontUserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserKelasController;
use App\Http\Controllers\UserSubjectController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Route;



Route::middleware(['guest'])->group(function () {
    route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'showLogin')->name('login');
        Route::post('/login', 'login')->name('authenticate');
        Route::get('/register', 'showRegister')->name('register');
        Route::post('/register', 'register')->name('registerStore');
    });
});



Route::controller(FrontUserController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/program', 'subject')->name('subject');
    Route::get('/program-saya', 'mySubject')->name('mySubject');
    Route::get('/review-program', 'subjectPreview')->name('subjectPreview');
    Route::get('/materi', 'material')->name('material');
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

