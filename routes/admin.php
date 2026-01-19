<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication\Admin\AuthController;
use App\Http\Controllers\Admin\{HomeController,PostController,UserController,CommentsController};

    Route::prefix('admin')->name('admin.')->group(function (){

        Route::get('login'                   ,[AuthController::class ,'loginForm'])->name('login');
        Route::post('login'                  ,[AuthController::class ,'login'])->name('post.login');
        Route::get('forgot-password'         ,[AuthController::class ,'forgotPassword'])->name('forgot-password');
        Route::post('forgot-password'        ,[AuthController::class ,'sendResetLink'])->name('reset-link');
        Route::post('resend-reset-link'      ,[AuthController::class ,'resendResetLink'])->name('resend-link');
        Route::get('reset-password/{token}'  ,[AuthController::class ,'resetPasswordForm'])->name('reset-password');
        Route::post('reset-password'         ,[AuthController::class ,'resetPassword'])->name('post.reset-password');

        Route::middleware('auth-check:admin')->group(function () {

            Route::get('/'                           ,[HomeController::class         , 'index'])->name('index');

            Route::get('/posts'                      ,[PostController::class         , 'index'])->name('posts.index');
            Route::get('/view-post/{id}'             ,[PostController::class         , 'view'])->name('post.view');
            Route::post('/delete-post/{id}'          ,[PostController::class         , 'destroy'])->name('post.delete');
            Route::post('/change-status/{id}'        ,[PostController::class         , 'changeStatus'])->name('post.status');

            Route::get('/users'                      ,[UserController::class         , 'users'])->name('users.index');
            Route::post('/toggle-block-user/{id}'    ,[UserController::class         , 'toggleBlockUser'])->name('users.toggle-block');
            Route::get('/authors'                    ,[UserController::class         , 'authors'])->name('authors.index');
            Route::post('/toggle-block-author/{id}'  ,[UserController::class         , 'toggleBlockAuthor'])->name('authors.toggle-block');

            Route::get('/comments'                   ,[CommentsController::class     , 'index'])->name('comments.index');
            Route::post('/approve-comment/{id}'      ,[CommentsController::class     , 'approve'])->name('comments.approve');
            Route::post('/reject-comment/{id}'       ,[CommentsController::class     , 'reject'])->name('comments.reject');

            Route::post('/logout'                    ,[AuthController::class         , 'logout'])->name('logout');
        });
    });



