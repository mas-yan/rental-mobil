<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {

    Route::get('/', DashboardController::class);

    // brand
    Route::get('/brand', [BrandController::class, 'index'])->name('brand');
    Route::post('/brand', [BrandController::class, 'store'])->name('addBrand');
    Route::delete('/brand/{brand}', [BrandController::class, 'destroy'])->name('deleteBrand');

    // mobil
    Route::resource('cars', MobilController::class);
    Route::resource('clients', ClientsController::class);

    // booking
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    Route::post('/process', [BookingController::class, 'process'])->name('process');
    Route::post('/confirm', [BookingController::class, 'confirm'])->name('confirm');

    // return
    Route::get('/return', [BookingController::class, 'return'])->name('returns');
    Route::post('/return', [BookingController::class, 'store'])->name('returns');
    Route::get('/return/{booking}', [BookingController::class, 'show'])->name('returns.show');

    // report
    Route::get('/report', ReportController::class)->name('report');
    Route::post('/report', ReportController::class)->name('report');

    // logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'loginStore'])->name('login');
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'registerStore'])->name('register');
});
