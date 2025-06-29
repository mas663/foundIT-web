<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LaporController;

Route::get('/', function () {
    return view('auth/login');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/katalog', [ItemController::class, 'katalog'])->name('items.katalog');

    // Item
    Route::get('/item/{item}', [ItemController::class, 'show'])->name('item.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
     Route::post('/items', [ItemController::class, 'store'])->name('items.store');
});

Route::get('/complaint', [ComplaintController::class, 'create'])->name('complaint.create');
Route::post('/complaint', [ComplaintController::class, 'store'])->name('complaint.store');

Route::get('/donasi', [DonationController::class, 'index'])->name('donation.index');
require __DIR__.'/auth.php';

Route::get('/faq', [FaqController::class, 'index'])->name('faq.chat');
Route::get('/items/search', [ItemController::class, 'search'])->name('items.search');
Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.show');

Route::get('/lapor', [LaporController::class, 'index'])->name('lapor.index');
Route::get('/lapor/kehilangan', [LaporController::class, 'kehilangan'])->name('lapor.kehilangan');
Route::get('/lapor/penemuan', [LaporController::class, 'penemuan'])->name('lapor.penemuan');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
