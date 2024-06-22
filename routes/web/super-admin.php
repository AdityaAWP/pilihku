<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\AuthController;
use App\Http\Controllers\SuperAdmin\AdminController;
use App\Http\Controllers\SuperAdmin\OrganizationController;

Route::group(['prefix' => 'super-admin', 'as' => 'super-admin.'], function () {
    Route::get('login', [AuthController::class, 'index'])->name('auth');
    Route::post('login/store', [AuthController::class, 'store'])->name('auth.store');

    Route::middleware('auth:super-admin')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');

        Route::resource('organizations', OrganizationController::class);

        Route::resource('admins', AdminController::class);
    });
});
