<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__ . '/web/super-admin.php';
require __DIR__ . '/web/admin.php';

Route::get('/', function () {
    dd('Pilihku');
})->name('landing-page');

// routes/web.php

Route::get('/', function () {
    return view('index');
})->name('home');
Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::get('/candidate', function () {
    return view('pages.candidate');
})->name('candidate');
Route::get('/candidate/details', function () {
    return view('pages.candidateDetails');
})->name('candidateDetails');
Route::get('/candidate/details/issue', function () {
    return view('pages.issue');
})->name('issues');
