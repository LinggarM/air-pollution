<?php

use App\Http\Controllers\AuthViewController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registeruser', [AuthViewController::class, 'showRegisterForm'])->name('registeruser');
Route::post('/registeruser', [AuthViewController::class, 'register']);

Route::get('/loginuser', [AuthViewController::class, 'showLoginForm'])->name('loginuser');
Route::post('/loginuser', [AuthViewController::class, 'login']);

Route::post('/deleteuser', [AuthViewController::class, 'delete'])->name('deleteuser');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
