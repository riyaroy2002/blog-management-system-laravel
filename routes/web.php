<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication\User\AuthController;

    Route::middleware('guest')->group(function (){
        Route::get('register'                ,[AuthController::class ,'registerForm'])->name('register');
        Route::post('register'               ,[AuthController::class ,'register'])->name('register.store');
        Route::get('verify-email'            ,[AuthController::class ,'verifyEmailForm'])->name('verify-email');
        Route::post('resend-email-link'      ,[AuthController::class ,'resendEmailLink'])->name('resend-email-link');
        Route::get('verify-email/{token}'    ,[AuthController::class ,'verifyEmail'])->name('post.verify-email');
        Route::get('login'                   ,[AuthController::class ,'loginForm'])->name('login');
        Route::post('login'                  ,[AuthController::class ,'login'])->name('post.login');
        Route::get('forgot-password'         ,[AuthController::class ,'forgotPassword'])->name('forgot-password');
        Route::post('forgot-password'        ,[AuthController::class ,'sendResetLink'])->name('reset-link');
        Route::post('resend-reset-link'      ,[AuthController::class ,'resendResetLink'])->name('resend-link');
        Route::get('reset-password/{token}'  ,[AuthController::class ,'resetPasswordForm'])->name('reset-password');
        Route::post('reset-password'         ,[AuthController::class ,'resetPassword'])->name('post.reset-password');
    });


     Route::middleware('auth-check:user')->group(function () {
        Route::post('/logout'                ,[AuthController::class, 'logout'])->name('logout');
     });


include('admin.php');
include('author.php');
include('frontend.php');
