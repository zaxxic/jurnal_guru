<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\HistoryTransaction;
use App\Http\Controllers\MasterCardController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\RegisterCardController;
use App\Http\Controllers\SchoolListController;
use App\Http\Controllers\SchoolVerificationController;
use App\Http\Controllers\SchoolYearController;
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


Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('profile', function () {
    return view('profile');
})->name('profile');

Route::get('login', function () {
    return view('Auth.login');
})->name('login');
