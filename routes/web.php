<?php

use Illuminate\Support\Facades\Route;     
use App\Http\Controllers\Web\FamilyController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\TrashController;
use App\Http\Controllers\Web\SettingController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Middleware\RedirectIfNotAuthenticated;
use App\Http\Controllers\Web\CloudController;
use App\Http\Controllers\Web\FamilyFilesController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// home page //prefix('/cloud')
Route::middleware(RedirectIfNotAuthenticated::class)->group(function () {
    Route::get('/', [CloudController::class, 'index']); // домашняя страница
    Route::resource('my-cloud', CloudController::class); // change route {{ $file->name }}
    Route::resource('my-family', FamilyController::class);

    Route::prefix('/u')->group(function(){
        Route::get('{user}', function (User $user) {
            $profileUser = $user ?? Auth::user();

            return view('user.index', [
                'user' => Auth::user(),
                'profileUser' => $profileUser,
            ]);
        })->name('user.index');
    });
    Route::resource('/trash', TrashController::class);
    Route::resource('/settings', SettingController::class);

    Route::get('/my-family-cloud', [FamilyFilesController::class, 'index'])->name('my-family-cloud.index');  
    Route::post('my-family/addMember', [FamilyController::class, 'addMember'])->name('my-family.addMember');

    Route::post('my-cloud/file/{id}', [CloudController::class, 'downloadFile'])->name('my-cloud-file.download');
    Route::post('/my-family-cloud/file/{id}', [FamilyFilesController::class, 'downloadFile'])->name('my-family-cloud-file.download');
});

// auth

Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
});


