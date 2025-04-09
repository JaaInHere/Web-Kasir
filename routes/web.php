<?php

use App\Http\Controllers\dashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenjualanController;

Route::get('/', function () {
    return view('login');
});

// dashboard routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [dashboardController::class, 'showDashboard'])->name('dashboard');
// dashboard end routes

// addItem Route
Route::get('/additem', function () {
    return view('addItem');
})->middleware(['auth', 'verified'])->name('addItem');
Route::post('/additem', [ProdukController::class, 'addProduk'])->name('addProduk');
// addItem end Route

// itemData Route
Route::get('/itemdata', function () {
    return view('itemData');
})->middleware(['auth', 'verified'])->name('itemData');
Route::get('/itemdata', [ProdukController::class, 'showProduk'])->name('itemData');
Route::delete('/itemdata/{id}', [ProdukController::class, 'destroy'])->name('delete');
// itemData End route

// editItem route

Route::get('/edititem/{id}', [ProdukController::class, 'edit'])->middleware(['auth', 'verified'])->name('editItem');
Route::post('/edititem/{id}', [ProdukController::class, 'update'])->name('update');
// editItem end route

// sale routes
Route::get('/sale', [PenjualanController::class, 'create'])->name('penjualan.create');
Route::post('/sale', [PenjualanController::class, 'store'])->name('penjualan.store');
Route::get('/sale/{id}/struk', [PenjualanController::class, 'show'])->name('penjualan.struk');



// sale end routes

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
