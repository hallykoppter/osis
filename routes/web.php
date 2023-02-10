<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CalonController;
use GuzzleHttp\Middleware;

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

Route::get('/', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'authentication']);
Route::post('/admin_login', [AuthController::class, 'login_admin']);

Route::get('/main', [MainController::class, 'index'])->middleware('auth:user');
Route::post('/pilih', [MainController::class, 'pilih']);
Route::get('/done', [MainController::class, 'done']);

Route::get('/dashboard', [AuthController::class, 'admin'])->middleware('auth:admin');

// Route::get('/', [AuthController::class, 'index'])->middleware('guest');
// Route::post('/login', [AuthController::class, 'authentication']);
// Route::get('/admin', [AuthController::class, 'admin']);
// Route::post('/admin', [AuthController::class, 'login_admin']);
// Route::get('/dashboard', [MainController::class, 'dashboard']);

Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/logout_admin', [AuthController::class, 'logout_admin']);

// Route::post('/pilih', [MainController::class, 'pilih']);

// // Route::get('/home', [MainController::class, 'index'])->middleware('auth');
// Route::get('/home', [MainController::class, 'index']);

// Route::get('/siswa', [SiswaController::class, 'index']);
// Route::get('/calon', [CalonController::class, 'index']);
