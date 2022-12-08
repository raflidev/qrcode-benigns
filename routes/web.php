<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KuponController;
use App\Http\Controllers\QRController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\Transaksi;
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

Route::get('/login', [UserController::class, 'login_index'])->name('user.login_index');
Route::post('/login', [UserController::class, 'login'])->name('user.login');


Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

Route::get('/coupons', [KuponController::class, 'index'])->name('kupon.index');
Route::get('/api/coupons/{id}', [KuponController::class, 'apiKupon'])->name('kupon.apiKupon');
Route::post('/coupons', [KuponController::class, 'store'])->name('kupon.store');
Route::put('/coupons', [KuponController::class, 'update'])->name('kupon.update');
Route::get('/coupons/delete/{id}', [KuponController::class, 'destroy'])->name('kupon.destroy');
Route::get('/coupons/generate', [KuponController::class, 'generate'])->name('kupon.generate');


Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/api/users/{id}', [UserController::class, 'apiUser'])->name('user.apiUser');
Route::post('/users', [UserController::class, 'store'])->name('user.store');
Route::put('/users', [UserController::class, 'update'])->name('user.update');
Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/transactions', [TransaksiController::class, 'index'])->name('transaction.index');
Route::post('/transactions', [TransaksiController::class, 'store'])->name('transaction.store');
// Route::get('/transactions', [TransaksiController::class, 'index'])->name('transaction.index');

Route::get('/qr', [QRController::class, 'index'])->name('qr.index');
Route::get('/checkQR/{id}', [QRController::class, 'show'])->name('qr.checkQR');
Route::post('/QRTransactions', [QRController::class, 'store'])->name('qr.store');
Route::get('/transactions/delete/{id}', [TransaksiController::class, 'destroy'])->name('qr.destroy');

Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
Route::redirect('/', '/dashboard');
