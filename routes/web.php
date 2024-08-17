<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CollectibleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\RedemptionController;
use App\Http\Controllers\PointsLedgerController;
use App\Http\Controllers\RarityController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::resource('collectibles', CollectibleController::class);
Route::resource('customers', CustomerController::class);
Route::resource('points_ledgers', PointsLedgerController::class);
Route::resource('redemption-requests', RedemptionController::class);
Route::resource('qrcodes', QRCodeController::class);
Route::resource('rarities', RarityController::class);

Route::post('/qrcode/scan', [QRCodeController::class, 'scan'])->name('qrcode.scan');
