<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

//public route for calculation
Route::get('/calculate',[AdminController::class, 'updateTotalCharge'])->name('calculate.every.hour');

Route::group(['middleware' => ['auth','verified']], function () {
    Route::group(['prefix' => 'admin','middleware' => 'role','as' => 'admin.'], function () {
        Route::get('/dashboard',[AdminController::class, 'index'])->name('dashboard');
        Route::get('/establishment',[AdminController::class, 'establishment'])->name('establishment');
        Route::post('/establishment/store',[AdminController::class, 'establishmentStore'])->name('establishment.store');
        Route::post('/establishment/update',[AdminController::class, 'establishmentUpdate'])->name('establishment.update');
        Route::post('/establishment/update/es',[AdminController::class, 'establishmentUpdateEs'])->name('establishment.update.es');
        Route::get('/establishment/destroy/{id}',[AdminController::class, 'establishmentDestroy'])->name('establishment.destroy');
        Route::get('/reservation',[AdminController::class, 'reservation'])->name('reservation');
        Route::post('/reservation/paid',[AdminController::class, 'reservationPaid'])->name('reservation.paid');
    });

    Route::group(['prefix' => 'user','as' => 'user.'], function () {
        Route::get('/dashboard',[UserController::class, 'index'])->name('dashboard');
        Route::get('/parking',[UserController::class, 'parking'])->name('dashboard.parking');
        Route::get('/history',[UserController::class, 'history'])->name('history');
        Route::get('/parking/booked/{id}',[UserController::class, 'parkingBooked'])->name('dashboard.parking.booked');
        Route::post('/parking/reserved',[UserController::class, 'parkingReserved'])->name('reserved.slot');
        Route::post('/parking/reserved/update',[UserController::class, 'parkingReservedUpdate'])->name('reserved.slot.update');
        Route::get('/parking/reserved/cancel/{id}',[UserController::class, 'parkingReservedCancel'])->name('reserved.slot.cancel');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
