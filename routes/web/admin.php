<?php

use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

Route::group(['prefix' => '{organizationSlug}/admin', 'as' => 'admin.', 'middleware' => ['organization.exists']], function () {
    Route::get('login', [AuthController::class, 'index'])->name('auth');
    Route::post('login/store', [AuthController::class, 'store'])->name('auth.store');

    Route::middleware('auth:admin')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');

        Route::post('users/import', [UserController::class, 'import'])->name('users.import');
        Route::get('users/{user}/face-recognition', [UserController::class, 'faceRecognition'])->name('users.face-recognition');
        Route::post('users/{user}/face-recognition/ajax-photo', [UserController::class, 'ajaxPhoto'])->name('users.face-recognition.ajax-photo');
        Route::post('users/{user}/face-recognition/ajax-descrip', [UserController::class, 'ajaxDescrip'])->name('users.face-recognition.ajax-descrip');
        Route::resource('users', UserController::class);

        Route::get('organization/edit', [OrganizationController::class, 'edit'])->name('organizations.edit');
        Route::put('organization/update', [OrganizationController::class, 'update'])->name('organizations.update');
    });
});
