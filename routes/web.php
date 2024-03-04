<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;


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

//dashboard
Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

//login and registration
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::get('/register', [AuthManager::class, 'registration'])->name('register');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::post('/register', [AuthManager::class, 'registerPost'])->name('register.post');

//logout
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

//artist
Route::get('/artist', [ArtistController::class, 'index'])->name('artist.index');
Route::post('/artist', [ArtistController::class, 'store'])->name('artist.store');
Route::delete('/artist/{artist}', [ArtistController::class, 'destroy'])->name('artist.destroy');
