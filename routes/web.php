<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\loginVerifyController;
use App\Http\Controllers\verifyIDController;
use App\Http\Controllers\insertEmployeeInformationController;
use App\Http\Controllers\backController;
use App\Http\Controllers\verifyEmailController;
use App\Http\Controllers\resetPasswordController;
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
Route::get('/connection', function () {
    return view('connection');
});



//login**************************
    Route::get('/', function () {
        return view('login.login');
    })->name('login');

    Route::get('/login/login-verify-credential', function () {
        return view('login.login-verify-credential');
    })->name('login-verify-credential');

//login**************************

Route::match(['get', 'post'], '/dashboard/dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard');

//register**************************
    Route::get('/register/register', function () {
        return view('register.register');
    })->name('register');

    Route::get('/register/register-id', function () {
        return view('register.register-id');
    })->name('register-id');

    Route::get('/register/register-name', function () {
        return view('register.register-name');
    })->name('register-name');

    Route::match(['get', 'post'], '/register/register-email', function () {
        return view('register.register-email');
    })->name('register-email');
//register**************************


//forgot password**************************
    Route::match(['get', 'post'], 'forgot-password/forgot-password', function () {
        return view('forgot-password.forgot-password');
    })->name('forgot-password');

    Route::match(['get', 'post'], '/forgot-password/forgot-password-email-verify', function () {
        return view('forgot-password.forgot-password-email-verify');
    })->name('forgot-password-email-verify');
//forgot password**************************



//reset password**********************

    Route::get('/reset-password/reset-password', function () {
        return view('reset-password.reset-password');
    })->name('reset-password');

    Route::match(['get', 'post'], '/reset-password/reset-password-success', function () {
        return view('reset-password.reset-password-success');
    })->name('reset-password-success');

    Route::match(['get', 'post'], '/reset-password/reset-password-error', function () {
        return view('reset-password.reset-password-error');
    })->name('reset-password-error');

    Route::get('/reset-password/reset-password-error-request', function () {
        return view('reset-password-error-request');
    })->name('reset-password-error-request');
    
//reset password**********************


Route::get('/loginVerify', [loginVerifyController::class, 'loginVerify'])->name('loginVerify');
Route::get('/verifyID', [verifyIDController::class, 'verifyID'])->name('verifyID');
Route::match(['get', 'post'], '/insertEmployeeInformation', [insertEmployeeInformationController::class, 'insertEmployeeInformation'])->name('insertEmployeeInformation');


//back controller*******************
    Route::get('/backRegisterID', [backController::class, 'backRegisterID'])->name('backRegisterID');
    Route::get('/backPressedRegisterID', [backController::class, 'backPressedRegisterID'])->name('backPressedRegisterID');
    Route::get('/backRegisterName', [backController::class, 'backRegisterName'])->name('backRegisterName');
    Route::get('/backPressedRegisterName', [backController::class, 'backPressedRegisterName'])->name('backPressedRegisterName');
    Route::get('/backRegisterEmail', [backController::class, 'backRegisterEmail'])->name('backRegisterEmail');
    Route::get('/backPressedRegisterEmail', [backController::class, 'backPressedRegisterEmail'])->name('backPressedRegisterEmail');
//back controller*******************

Route::match(['get', 'post'], '/verifyEmail', [verifyEmailController::class, 'verifyEmail'])->name('verifyEmail');

//reset password*****************
    Route::post('/resetPassword', [resetPasswordController::class, 'resetPassword'])->name('resetPassword');
//reset password*****************