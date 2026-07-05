<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishController;
use App\Http\Controllers\AdminGuestController;

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

Route::get('/', [WishController::class, 'index']);
Route::post('/wishes', [WishController::class, 'store'])->name('wishes.store');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/guests', [AdminGuestController::class, 'index'])->name('guests.index');
    Route::post('/guests', [AdminGuestController::class, 'store'])->name('guests.store');
    Route::put('/guests/{guest}', [AdminGuestController::class, 'update'])->name('guests.update');
    Route::delete('/guests/{guest}', [AdminGuestController::class, 'destroy'])->name('guests.destroy');
    Route::get('/guests/{guest}/send', [AdminGuestController::class, 'send'])->name('guests.send');
    Route::post('/settings', [AdminGuestController::class, 'settings'])->name('settings.update');
});
