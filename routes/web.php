<?php

use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

// Redirect home to Owners
Route::get('/', function () {
    return redirect()->route('owners.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/owners', [OwnersController::class,'index'])->name('owners.index');
    Route::resource('cars', CarController::class)->only(['index']);

// Owners Routes
Route::get('/owners', [OwnerController::class, 'index'])->name('owners.index');
Route::get('/owners/create', [OwnerController::class, 'create'])->name('owners.create');
Route::post('/owners', [OwnerController::class, 'store'])->name('owners.store'); // POST for saving
Route::get('/owners/{owner}/edit', [OwnerController::class, 'edit'])->name('owners.edit');
Route::put('/owners/{owner}', [OwnerController::class, 'update'])->name('owners.update'); // PUT for updating
Route::delete('/owners/{owner}', [OwnerController::class, 'destroy'])->name('owners.delete');

// Cars Routes
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
Route::post('/cars/store', [CarController::class, 'store'])->name('cars.store'); // Matches your form action
Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');
Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.delete');

});
