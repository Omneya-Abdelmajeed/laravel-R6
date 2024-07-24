<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClassController;

Route::get('cars', [CarController::class, 'index'])->name('cars.index');
Route::get('cars/create', [CarController::class, 'create'])->name('cars.create');
Route::post('cars', [CarController::class, 'store'])->name('cars.store'); 
Route::get('cars/{id}/edit', [CarController::class, 'edit'])->name('cars.edit');
Route::put('cars/{id}', [CarController::class, 'update'])->name('cars.update');
Route::get('car/{id}/details', [CarController::class, 'show'])->name('car.details');
Route::get('cars/{id}/delete', [CarController::class, 'destroy'])->name('cars.destroy');
Route::get('cars/trashed', [CarController::class, 'showDeleted'])->name('cars.showDeleted');

Route::get('classes', [ClassController::class, 'index'])->name('classes.index');
Route::get('classes/create', [ClassController::class, 'create'])->name('classes.create');
Route::post('classes', [ClassController::class, 'store'])->name('classes.store');
Route::get('classes/{id}', [ClassController::class, 'edit'])->name('classes.edit');


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

