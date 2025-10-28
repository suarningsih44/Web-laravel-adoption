<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdopsiController;
use App\Http\Controllers\HewanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// =======================
// CRUD Hewan
// =======================
Route::get('/hewan', [HewanController::class, 'index'])->name('hewan.index');
Route::get('/hewan/create', [HewanController::class, 'create'])->name('hewan.create');
Route::post('/hewan/store', [HewanController::class, 'store'])->name('hewan.store');
Route::get('/hewan/{id}/edit', [HewanController::class, 'edit'])->name('hewan.edit');
Route::put('/hewan/{id}/update', [HewanController::class, 'update'])->name('hewan.update'); // Ubah dari POST ke PUT
Route::delete('/hewan/{id}', [HewanController::class, 'destroy'])->name('hewan.destroy');

// =======================
// CRUD Kategori
// =======================
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}/update', [KategoriController::class, 'update'])->name('kategori.update'); // Ubah dari POST ke PUT
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

// =======================
// CRUD Adopsi
// =======================
Route::get('/adopsi', [AdopsiController::class, 'index'])->name('adopsi.index');
Route::get('/adopsi/create', [AdopsiController::class, 'create'])->name('adopsi.create');
Route::post('/adopsi/store', [AdopsiController::class, 'store'])->name('adopsi.store');
Route::get('/adopsi/{id}/edit', [AdopsiController::class, 'edit'])->name('adopsi.edit');
Route::put('/adopsi/{id}/update', [AdopsiController::class, 'update'])->name('adopsi.update'); // Ubah dari POST ke PUT
Route::delete('/adopsi/{id}', [AdopsiController::class, 'destroy'])->name('adopsi.destroy');