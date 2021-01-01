<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\MissionController as AdminMissionController;
use App\Http\Controllers\Admin\TaskController as AdminTaskController;
use App\Http\Controllers\Admin\TopupController as AdminTopupController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Admin\VoucherController as AdminVoucherController;
use App\Http\Controllers\User\BalanceController;
use App\Http\Controllers\User\SavingController;
use App\Http\Controllers\User\ShoppingController;
use App\Http\Controllers\User\TaskController;
use App\Http\Controllers\User\TopupController;
use App\Http\Controllers\User\TrackingController;
use App\Http\Controllers\User\VoucherController;

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/about', function () {
    return view('userPanel.page.about');
})->name('about');


Route::middleware(['auth'])->group(function () {
    //user
    Route::middleware(['UserOnly'])->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/shopping', [ShoppingController::class, 'index'])->name('shopping');
        Route::get('/tracking', [TrackingController::class, 'index'])->name('tracking');
        Route::post('/task/complete/{userTask}', [TaskController::class, 'complete'])->name('task.complete');
        Route::post('/task/uncomplete/{userTask}', [TaskController::class, 'uncomplete'])->name('task.uncomplete');
        //vouchers
        Route::prefix('vouchers')->name('vouchers.')->group(function () {
            Route::get('/vouchers', [VoucherController::class, 'index'])->name('index');
            Route::get('/{voucher}', [VoucherController::class, 'detail'])->name('detail');
            Route::post('/{voucher}', [VoucherController::class, 'claim'])->name('claim');
        });
        Route::prefix('saving')->name('saving.')->group(function () {
            Route::get('/', [SavingController::class, 'index'])->name('index');
            Route::post('/', [SavingController::class, 'add'])->name('add');
        });
        //balance
        Route::prefix('balance')->name('balance.')->group(function () {
            Route::get('/', [BalanceController::class, 'index'])->name('index');
            Route::get('/topup', [TopupController::class, 'index'])->name('topup');
            Route::post('/topup', [TopupController::class, 'add'])->name('topup.add');
            Route::delete('/topup/{topup}', [TopupController::class, 'cancel'])->name('topup.cancel');
            Route::get('/topup/upload/{topup}', [TopupController::class, 'uploadForm'])->name('topup.uploadForm');
            Route::post('/topup/upload/{topup}', [TopupController::class, 'upload'])->name('topup.upload');
        });
    });

    //admin
    Route::prefix('admin')->name('admin.')->middleware(['AdminOnly'])->group(function () {
        Route::get('/', [AdminHomeController::class, 'index'])->name('home');
        Route::get('/users', [AdminUsersController::class, 'index'])->name('users');
        Route::get('/voucher/claimed', [AdminVoucherController::class, 'indexClaimed'])->name('voucher.claimed');
        Route::resource('/voucher', AdminVoucherController::class);
        Route::resource('/task', AdminTaskController::class);
        Route::resource('/mission', AdminMissionController::class);
        Route::get('/topup', [AdminTopupController::class, 'index'])->name('topup');
        Route::put('/topup/accept/{topup}', [AdminTopupController::class, 'accept'])->name('topup.accept');
        Route::put('/topup/decline/{topup}', [AdminTopupController::class, 'decline'])->name('topup.decline');
    });
});
