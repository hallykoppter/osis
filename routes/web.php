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
Route::get('/done', [MainController::class, 'done'])->middleware('auth:user');

Route::get('/dashboard', [MainController::class, 'admin'])->middleware('auth:admin');
Route::get('/calon', [MainController::class, 'calon']);
Route::get('/import-siswa', [MainController::class, 'import_siswa']);
Route::get('/tambah-siswa', [MainController::class, 'tambah_siswa']);
Route::get('/export-siswa', [SiswaController::class, 'export']);

Route::resource('/siswa', SiswaController::class)->middleware('auth:admin');
Route::post('/truncate', [SiswaController::class, 'truncate']);
Route::post('/import', [SiswaController::class, 'import']);

Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/logout_admin', [AuthController::class, 'logout_admin']);
