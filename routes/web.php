<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/web/super-admin.php';
require __DIR__ . '/web/admin.php';

Route::get('/', function () {
    $candidates = DB::table('candidates')->get();
    return view('index',['candidates' => $candidates]);
})->name('home');

Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::get('/voting', function () {
    $candidates = DB::table('candidates')->get();
    return view('pages.voting', ['candidates' => $candidates]);
})->name('voting');

Route::get('/face-recognition/{id}', function ($id) {
    $candidate = DB::table('candidates')->where('id', $id)->first();
    if (!$candidate) {
        abort(404);
    }
    return view('pages.faceRecognition', ['candidate' => $candidate]);
})->name('face-recognition');

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

Route::get('/candidate/issue', function () {
    return view('pages.issue');
})->name('issues');
