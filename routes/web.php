<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', [DashboardController::class, 'show'])->middleware('auth')->name('dashboard');

Route::group(['prefix' => '/'], function () {
    Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AccountController::class, 'show'])->name('account.show');
    Route::put('/account/update', [AccountController::class, 'update'])->name('account.update');
    Route::put('/account/update/pin-number', [AccountController::class, 'pinNumberUpdate'])->name('pin-number.update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/transfer', [TransactionController::class, 'transferForm'])->name('transfer.form');
    Route::post('/transfer', [TransactionController::class, 'transfer'])->name('transfer');
    Route::get('/topup', [TransactionController::class, 'topupForm'])->name('topup.form');
    Route::post('/topup', [TransactionController::class, 'topup'])->name('topup');
    Route::get('/history', [TransactionController::class, 'historyShow'])->name('history.show');
});