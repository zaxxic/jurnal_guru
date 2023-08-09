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

Route::resource('dashboard', DashboardController::class)->only('index',);
Route::resource('packages', PackageController::class)->only('index',);
Route::resource('card', RegisterCardController::class)->only('index',);
Route::resource('card/master', MasterCardController::class)->only('index',);
Route::resource('schools/verification', SchoolVerificationController::class)->only('index', 'show');
Route::resource('schools/list', SchoolListController::class)->only('index');
Route::resource('school/year', SchoolYearController::class)->only('index');
Route::resource('transaction/history', HistoryTransaction::class)->only('index');

Route::get('transaction/print', [HistoryTransaction::class, 'search'])->name('print.history');



Route::get('login', function () {
    return view('Auth.login');
})->name('login');
