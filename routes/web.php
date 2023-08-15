<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
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

Route::get('/', [AuthController::class, 'index'])->name('login');

Route::get('/home', [AuthController::class, 'home'])->name('home');

Route::post('/signin', [AuthController::class, 'signin'])->name('signin');
Route::get('/registeruser', [AuthController::class, 'create'])->name('telacaduser');
Route::post('/saveuser', [AuthController::class, 'store'])->name('saveuser');
Route::get('/showuser', [AuthController::class, 'show'])->name('showuser');
Route::get('/signout', [AuthController::class, 'signout'])->name('signout');
