<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', [AuthController::class, 'check']);

Route::get('/login', [AuthController::class, 'index'])->name('auth.index')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

    Route::resources([
        'kategori' => App\Http\Controllers\KategoriController::class,
        'department' => App\Http\Controllers\DepartmentController::class,
        'kendaraan' => App\Http\Controllers\KendaraanController::class,
    ]);
});
