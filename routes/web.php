<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/about', function () {
    return view('userPanel.page.about');
})->name('about');
Route::get('/shopping', function () {
    return view('userPanel.page.shopping');
})->name('shopping');


Route::middleware(['auth'])->group(function () {
    //user
    Route::middleware(['UserOnly'])->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
    });

    //admin
    Route::prefix('admin')->name('admin.')->middleware(['AdminOnly'])->group(function () {
        Route::get('/', function () {
            return view('adminPanel.page.index');
        })->name('home');
        Route::get('/users', function () {
            return view('adminPanel.page.users');
        })->name('users');
        Route::get('/mission', function () {
            return view('adminPanel.page.index');
        })->name('mission');
        Route::get('/topup', function () {
            return view('adminPanel.page.index');
        })->name('topup');
        Route::get('/notifications', function () {
            return view('adminPanel.page.index');
        })->name('notifications');
    });
});
