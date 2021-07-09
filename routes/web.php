<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\StudyGroupController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'homepage'])->middleware('verified')->name('home');


// Register 
Route::get('register/', [RegisterController::class, 'create'])->name('register')->middleware('guest');
Route::post('register/', [RegisterController::class, 'store'])->name('register-post')->middleware('guest');
// Email Verification
Route::get('/email/verify', [RegisterController::class, 'verify'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [RegisterController::class, 'emailVerified'])
->name('verification.verify')
// ->middleware(['auth', 'signed'])
;
Route::post('/email/verification-notification', [RegisterController::class, 'verifyResend'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Login
Route::get('login/', [SessionsController::class, 'create'])->name('login')->middleware('guest');
Route::post('login/', [SessionsController::class, 'store'])->name('login-post')->middleware('guest');

// Logouts
Route::get('logout/', [SessionsController::class, 'destroy'])->name('logout')->middleware('auth');

// // Forgot Password
Route::get('/forgot-password', [SessionsController::class, 'forgotPasswordRequest'])->name('password.request');
Route::post('forgot-password/', [SessionsController::class, 'forgotPasswordRetrieve'])->name('password.email');
Route::get('/reset-password/{token}', [SessionsController::class, 'passwordReset'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [SessionsController::class, 'passwordUpdate'])->middleware('guest')->name('password.update');


// Learning group
Route::get('/learning-group', [StudyGroupController::class, 'listGroups'])->middleware('verified')->name('group.home');

// // Dashboard
// Route::get('dashboard', [SessionsController::class, 'dashboard'])->name('dashboard'); 

// Profile
Route::get('/profile', [MainController::class, 'showProfile'])->middleware('auth')->name('profile');
Route::get('/profile-edit', [MainController::class, 'editProfile'])->middleware('auth')->name('edit-profile');

