<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerkaraController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/perkara', [PerkaraController::class, 'index'])->name('perkara.index');
Route::get('/perkara/{id}', [PerkaraController::class, 'show'])->name('perkara.show');
Route::post('/perkara/search', [PerkaraController::class, 'search'])->name('perkara.search');

Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
