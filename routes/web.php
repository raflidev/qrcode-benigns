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

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/coupons', [KuponController::class, 'index'])->name('kupon.index');
