<?php
use App\Http\Controllers\User\VotingController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

require __DIR__ . '/web/super-admin.php';
require __DIR__ . '/web/admin.php';

Route::get('/', function () {
    $candidates = DB::table('candidates')->get();
    return view('index', ['candidates' => $candidates]);
})->name('home');

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/voting', [VotingController::class, 'index'])->name('voting');

Route::get('/face-recognition/{id}', function ($id) {
    $candidate = DB::table('candidates')->where('id', $id)->first();
    if (!$candidate) {
        abort(404);
    }
    return view('pages.faceRecognition', ['candidate' => $candidate]);
})->name('face-recognition')->middleware('face-recognition');

Route::post('/face-recognition/{id}/store', [VotingController::class, 'store'])->name('voting.store')->middleware('face-recognition');

Route::get('/candidate', function () {
    $candidates = DB::table('candidates')->get();
    return view('pages.candidate', ['candidates' => $candidates]);
})->name('candidate');

Route::get('/candidate/details/{id}', function ($id) {
    $candidate = DB::table('candidates')->where('id', $id)->first();
    if (!$candidate) {
        abort(404);
    }
    return view('pages.candidateDetails', ['candidate' => $candidate]);
})->name('candidateDetails');

Route::get('/candidate/issue/{id}', function ($id) {
    $candidate = DB::table('candidates')->where('id', $id)->first();
    if (!$candidate) {
        abort(404);
    }
    return view('pages.issue', ['candidate' => $candidate]);
})->name('issues');