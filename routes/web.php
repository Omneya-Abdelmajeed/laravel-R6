<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ExampleController;

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
// Route::resource('cars', CarController::class);

Route::prefix('classes')->group(function() {
Route::get('', [ClassController::class, 'index'])->name('classes.index');
Route::get('create', [ClassController::class, 'create'])->name('classes.create');
Route::post('', [ClassController::class, 'store'])->name('classes.store');
Route::get('{id}/edit', [ClassController::class, 'edit'])->name('classes.edit');
Route::put('{id}', [ClassController::class, 'update'])->name('classes.update');
Route::get('{id}/details', [ClassController::class, 'show'])->name('class.details');
Route::delete('{id}/delete', [ClassController::class, 'destroy'])->name('classes.destroy');
Route::get('trashed', [ClassController::class, 'showDeleted'])->name('classes.showDeleted');
Route::patch('{id}', [ClassController::class, 'restore'])->name('classes.restore');
Route::delete('{id}', [ClassController::class, 'forceDelete'])->name('classes.forceDelete');
});

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

Route::get('uploadForm', [ExampleController::class, 'uploadForm']);
Route::post('upload', [ExampleController::class, 'upload'])->name('upload');