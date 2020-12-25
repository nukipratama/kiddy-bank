<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\MissionController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\TopupController;
use App\Http\Controllers\Admin\UsersController;

Route::get('/calendar', function () {
    return view('userPanel.page.calendar');
});
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
        Route::get('/', [AdminHomeController::class, 'index'])->name('home');
        Route::get('/users', [UsersController::class, 'index'])->name('users');
        Route::get('/task', [TaskController::class, 'index'])->name('task');
        Route::get('/mission', [MissionController::class, 'index'])->name('mission');
        Route::get('/topup', [TopupController::class, 'index'])->name('topup');
    });
});
