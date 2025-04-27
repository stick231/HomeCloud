<?php

use Illuminate\Support\Facades\Route;     
use App\Http\Controllers\Web\FamilyController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\TrashController;
use App\Http\Controllers\Web\FileController;
use App\Http\Controllers\Web\SettingController;
use App\Http\Controllers\Web\AuthController;


// home page
Route::resource("/", FileController::class);
Route::resource('/family', FamilyController::class);
Route::resource('/user', UserController::class);
Route::resource('/trash', TrashController::class);
Route::resource('/settings', SettingController::class);

// auth

Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
});


