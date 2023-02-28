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

// Base
Route::get('/', [AuthController::class, 'index'])->middleware('guest')->name('login');

// Login
Route::post('/login', [AuthController::class, 'authentication']);
Route::post('/admin_login', [AuthController::class, 'login_admin']);

// Pemilihan
Route::middleware(['auth:user'])->group(function() {
    Route::get('/main', [MainController::class, 'index']);
    Route::get('/done', [MainController::class, 'done']);
    Route::post('/pilih', [MainController::class, 'pilih']);
});

Route::middleware('auth:admin')->group(function(){
    // Dashboard
    Route::get('/dashboard', [MainController::class, 'admin']);

    // Siswa
    Route::get('/import-siswa', [SiswaController::class, 'import_siswa']);
    Route::get('/export-siswa', [SiswaController::class, 'export']);
    Route::resource('/siswa', SiswaController::class);
    Route::post('/siswa/truncate', [SiswaController::class, 'truncate']);
    Route::post('/import', [SiswaController::class, 'import']);
    Route::post('/siswa/reset', [SiswaController::class, 'reset']);
    Route::post('/batch_upload', [SiswaController::class, 'batch_image']);

    // Calon
    Route::resource('/calon', CalonController::class);
    Route::post('/calon/truncate', [CalonController::class, 'truncate']);
    Route::get('hitung-suara', [CalonController::class, 'hitung_suara']);

    // Test
    Route::get('/test', [MainController::class, 'test']);
});

// Logout
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/logout_admin', [AuthController::class, 'logout_admin']);
