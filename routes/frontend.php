<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactUsController;

    Route::get('/',                        [HomeController::class, 'index'])->name('home');
    Route::get('about-us',                 [HomeController::class, 'aboutUs'])->name('about-us');
    Route::get('blogs',                    [HomeController::class, 'blogs'])->name('blogs');
    Route::get('blog-details/{slug}',      [HomeController::class, 'blogDetails'])->name('blog-details');
    Route::get('contact-us',               [HomeController::class, 'contactUs'])->name('contact-us');
    Route::get('authors',                  [HomeController::class, 'authors'])->name('authors');
    Route::post('contact-us',              [ContactUsController::class,'store'])->name('contact-us.store');
    Route::post('/comments/{post_id}'     ,[HomeController::class, 'comments'])->name('comment.store');
