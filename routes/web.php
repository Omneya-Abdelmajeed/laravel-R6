<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClassController;

Route::prefix('cars')->group(function() {
    Route::get('', [CarController::class, 'index'])->name('cars.index');
    Route::get('create', [CarController::class, 'create'])->name('cars.create');
    Route::post('', [CarController::class, 'store'])->name('cars.store'); 
    Route::get('{id}/edit', [CarController::class, 'edit'])->name('cars.edit');
    Route::put('{id}', [CarController::class, 'update'])->name('cars.update');
    Route::get('{id}/details', [CarController::class, 'show'])->name('car.details');
    Route::delete('{id}/delete', [CarController::class, 'destroy'])->name('cars.destroy');
    Route::get('trashed', [CarController::class, 'showDeleted'])->name('cars.showDeleted');
    Route::patch('{id}', [CarController::class, 'restore'])->name('cars.restore');
    Route::delete('{id}', [CarController::class, 'forceDelete'])->name('cars.forceDelete');
});


Route::get('classes', [ClassController::class, 'index'])->name('classes.index');
Route::get('classes/create', [ClassController::class, 'create'])->name('classes.create');
Route::post('classes', [ClassController::class, 'store'])->name('classes.store');
Route::get('classes/{id}/edit', [ClassController::class, 'edit'])->name('classes.edit');
Route::put('classes/{id}', [ClassController::class, 'update'])->name('classes.update');
Route::get('classes/{id}/details', [ClassController::class, 'show'])->name('class.details');
Route::delete('classes/{id}/delete', [ClassController::class, 'destroy'])->name('classes.destroy');
Route::get('classes/trashed', [ClassController::class, 'showDeleted'])->name('classes.showDeleted');


//lambda function doesn't need name
Route::get('/', function () {
    return view('welcome');
});

// or Route::get('w', [without forword slash]
Route::get('/w', function () {
    return "Hello Laravel!!";
});

//Route::
//get: show data
//post:submit new data to server
//put: update data in server
//patch
//delete:

