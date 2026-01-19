<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Author\{HomeController,PostController};
use App\Http\Controllers\Authentication\Author\AuthController;

 Route::prefix('author')->name('author.')->group(function (){

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

    Route::middleware('auth-check:author')->group(function () {

        Route::get('/'                           ,[HomeController::class  , 'index'])->name('index');

        Route::get('/posts'                      ,[PostController::class  , 'index'])->name('posts.index');
        Route::get('/create-post'                ,[PostController::class  , 'create'])->name('post.create');
        Route::post('/create-post'               ,[PostController::class  , 'store'])->name('post.store');
        Route::get('/edit-post/{id}'             ,[PostController::class  , 'edit'])->name('post.edit');
        Route::post('/update-post/{id}'          ,[PostController::class  , 'update'])->name('post.update');
        Route::post('/delete-post/{id}'          ,[PostController::class  , 'destroy'])->name('post.delete');

        Route::post('/logout'                    ,[AuthController::class  , 'logout'])->name('logout');
    });
  });
