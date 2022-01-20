<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\MobilController;
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
    Route::get('/', function () {
        return view('dashboard');
    });

    Route::get('/brand', [BrandController::class, 'index'])->name('brand');
    Route::post('/brand', [BrandController::class, 'store'])->name('addBrand');
    Route::delete('/brand/{brand}', [BrandController::class, 'destroy'])->name('deleteBrand');
    Route::resource('cars', MobilController::class);
    Route::resource('clients', ClientsController::class);

    // booking
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    Route::post('/process', [BookingController::class, 'process'])->name('process');
    Route::post('/confirm', [BookingController::class, 'confirm'])->name('confirm');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'loginStore'])->name('login');
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'registerStore'])->name('register');
});
