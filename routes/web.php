<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Auth\OtpController;


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

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::get('/test-api', [ApiController::class, 'testApi']);
Route::get('/otp', [OtpController::class, 'showOtpForm'])->name('otp');
Route::post('/otp', [OtpController::class, 'verifyOtp']);

Route::post('/register', [AuthController::class, 'registerUser'])->name('register');
Route::post('/register-doctor', [AuthController::class, 'registerDoctor'])->name('registerDoctor');
