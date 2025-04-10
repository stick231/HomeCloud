<?php

use Illuminate\Support\Facades\Route;     
use App\Http\Controllers\Web\FamilyController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\TrashController;
use App\Http\Controllers\Web\FileController;
use App\Http\Controllers\Web\SettingController;

Route::resource("/", FileController::class);
Route::resource('/family', FamilyController::class);
Route::resource('/user', UserController::class);
Route::resource('/trash', TrashController::class);
Route::resource('/settings', SettingController::class);