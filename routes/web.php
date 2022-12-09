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


Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard')->middleware(['auth']);

Route::get('/coupons', [KuponController::class, 'index'])->name('kupon.index')->middleware(['auth']);
Route::get('/api/coupons/{id}', [KuponController::class, 'apiKupon'])->name('kupon.apiKupon')->middleware(['auth']);
Route::post('/coupons', [KuponController::class, 'store'])->name('kupon.store')->middleware(['auth']);
Route::put('/coupons', [KuponController::class, 'update'])->name('kupon.update')->middleware(['auth']);
Route::get('/coupons/delete/{id}', [KuponController::class, 'destroy'])->name('kupon.destroy')->middleware(['auth']);
Route::get('/coupons/generate', [KuponController::class, 'generate'])->name('kupon.generate')->middleware(['auth']);


Route::get('/users', [UserController::class, 'index'])->name('user.index')->middleware(['auth']);
Route::get('/api/users/{id}', [UserController::class, 'apiUser'])->name('user.apiUser')->middleware(['auth']);
Route::post('/users', [UserController::class, 'store'])->name('user.store')->middleware(['auth']);
Route::put('/users', [UserController::class, 'update'])->name('user.update')->middleware(['auth']);
Route::put('/users/change', [UserController::class, 'update_password'])->name('user.update_password')->middleware(['auth']);
Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware(['auth']);

Route::get('/transactions', [TransaksiController::class, 'index'])->name('transaction.index')->middleware(['auth']);
Route::post('/transactions', [TransaksiController::class, 'store'])->name('transaction.store')->middleware(['auth']);
// Route::get('/transactions', [TransaksiController::class, 'index'])->name('transaction.index')->middleware(['auth']);

Route::get('/qr', [QRController::class, 'index'])->name('qr.index')->middleware(['auth']);
Route::get('/checkQR/{id}', [QRController::class, 'show'])->name('qr.checkQR')->middleware(['auth']);
Route::post('/QRTransactions', [QRController::class, 'store'])->name('qr.store')->middleware(['auth']);
Route::get('/transactions/delete/{id}', [TransaksiController::class, 'destroy'])->name('qr.destroy')->middleware(['auth']);

Route::post('/logout', [UserController::class, 'logout'])->name('user.logout')->middleware(['auth']);
Route::redirect('/', '/dashboard')->middleware(['auth']);
