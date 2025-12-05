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



route::controller(AuthController::class)->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'authenticate')->name('authenticate');
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'createRegister')->name('createRegister');
    });
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
});


Route::controller(FrontUserController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/program', 'subject')->name('subject');
    Route::get('/review-program', 'subjectPreview')->name('subjectPreview');

    Route::middleware('auth')->group(function() {
        Route::get('/program-saya', 'mySubject')->name('mySubject');
        Route::get('/materi', 'material')->name('material');

    });

});

Route::middleware('admin')->group(function() {
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
});


