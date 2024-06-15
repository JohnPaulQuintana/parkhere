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

Route::group(['middleware' => ['auth','verified']], function () {
    Route::group(['prefix' => 'admin','middleware' => 'role','as' => 'admin.'], function () {
        Route::get('/dashboard',[AdminController::class, 'index'])->name('dashboard');
        Route::get('/establishment',[AdminController::class, 'establishment'])->name('establishment');
        Route::post('/establishment/store',[AdminController::class, 'establishmentStore'])->name('establishment.store');
        Route::post('/establishment/update',[AdminController::class, 'establishmentUpdate'])->name('establishment.update');
    });
    Route::group(['prefix' => 'user','as' => 'user.'], function () {
        Route::get('/dashboard',[UserController::class, 'index'])->name('dashboard');
        Route::get('/parking',[UserController::class, 'parking'])->name('dashboard.parking');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
