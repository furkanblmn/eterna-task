<?php

use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\MainController;
use App\Http\Controllers\Dashboard\NewsletterController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth', 'verified'], function () {
    Route::get('/logout', [MainController::class, 'logout'])->name('logout');
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('index');
        Route::get('/change-status/{page}/{id}/{column_to_update}', [MainController::class, 'change_status']);
        Route::resource('/categories', CategoryController::class);
        Route::resource('/blogs', BlogController::class);
        Route::resource('/newsletters', NewsletterController::class);
    });
});
