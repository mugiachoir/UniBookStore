<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengadaanController;

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

// Home page and book search
Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin routes
Route::get('/book', [AdminController::class, 'index'])->name('book');
Route::get('/publisher', [AdminController::class, 'publisher'])->name('publisher');
Route::post('/book', [AdminController::class, 'store'])->name('book.store');
Route::post('/publisher', [AdminController::class, 'storePublisher'])->name('publisher.store');
Route::get('/book/edit/{book}', [AdminController::class, 'edit'])->name('book.edit');
Route::put('/book/edit/{id}', [AdminController::class, 'update'])->name('book.update');
Route::get('/publisher/edit/{publisher}', [AdminController::class, 'editPublisher'])->name('publisher.edit');
Route::put('/publisher/edit/{id}', [AdminController::class, 'updatePublisher'])->name('publisher.update');
Route::delete('book/delete/{book}', [AdminController::class, 'destroy'])->name('book.delete');
Route::delete('publisher/delete/{publisher}', [AdminController::class, 'destroyPublisher'])->name('publisher.delete');

// Book procurement
Route::get('/pengadaan', [PengadaanController::class, 'index'])->name('pengadaan');
