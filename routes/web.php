<?php

use App\Http\Controllers\KuponController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/coupons', [KuponController::class, 'index'])->name('kupon.index');
Route::get('/api/coupons/{id}', [KuponController::class, 'apiKupon'])->name('kupon.apiKupon');
Route::post('/coupons', [KuponController::class, 'store'])->name('kupon.store');
Route::put('/coupons', [KuponController::class, 'update'])->name('kupon.update');
Route::get('/coupons/delete/{id}', [KuponController::class, 'destroy'])->name('kupon.destroy');


Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/api/users/{id}', [UserController::class, 'apiUser'])->name('user.apiUser');
Route::post('/users', [UserController::class, 'store'])->name('user.store');
Route::put('/users', [UserController::class, 'update'])->name('user.update');
Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
