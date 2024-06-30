<?php

use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\StudyCaseController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VotingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

Route::group(['prefix' => '{organizationSlug}/admin', 'as' => 'admin.', 'middleware' => ['organization.exists']], function () {
    Route::get('login', [AuthController::class, 'index'])->name('auth');
    Route::post('login/store', [AuthController::class, 'store'])->name('auth.store');

    Route::middleware('auth:admin')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::group(['prefix' => 'voting-sessions', 'class' => VotingController::class, 'as' => 'voting-sessions.'], function () {
            Route::get('add', [VotingController::class, 'create'])->name('create');
            Route::post('store', [VotingController::class, 'store'])->name('store');
        });

        Route::middleware('voting_session.exists')->group(function () {
            Route::resource('candidates', CandidateController::class);
            Route::resource('quizzes', QuizController::class);
            Route::resource('study-cases', StudyCaseController::class);
        });

        Route::group(['prefix' => 'users', 'class' => UserController::class, 'as' => 'users.'], function () {
            Route::post('users/import', [UserController::class, 'import'])->name('import');
            Route::get('users/{user}/face-recognition', [UserController::class, 'faceRecognition'])->name('face-recognition');
            Route::post('users/{user}/face-recognition/ajax-photo', [UserController::class, 'ajaxPhoto'])->name('face-recognition.ajax-photo');
            Route::post('users/{user}/face-recognition/ajax-descrip', [UserController::class, 'ajaxDescrip'])->name('face-recognition.ajax-descrip');
        });
        Route::resource('users', UserController::class);

        Route::group(['prefix' => 'organizations', 'class' => OrganizationController::class, 'as' => 'organizations.'], function () {
            Route::get('edit', [OrganizationController::class, 'edit'])->name('edit');
            Route::put('update', [OrganizationController::class, 'update'])->name('update');
        });
    });
});
