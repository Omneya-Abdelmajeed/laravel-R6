<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'cars',
    'controller' => CarController::class,
    'as' => 'cars.',
    'middleware' => 'verified',
], function() {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('', 'store')->name('store');
    Route::get('{id}/edit', 'edit')->name('edit');
    Route::put('{id}', 'update')->name('update');
    Route::get('{id}/details', 'show')->name('details');  // Fixed naming inconsistency
    Route::delete('{id}', 'destroy')->name('destroy');
    Route::get('trashed', 'showDeleted')->name('showDeleted');
    Route::patch('{id}', 'restore')->name('restore');
    Route::delete('{id}/force', 'forceDelete')->name('forceDelete');
});
// Route::prefix('cars')->group(function() {
//     Route::get('', [CarController::class, 'index'])->name('cars.index');
//     Route::get('create', [CarController::class, 'create'])->name('cars.create');
//     Route::post('', [CarController::class, 'store'])->name('cars.store'); 
//     Route::get('{id}/edit', [CarController::class, 'edit'])->name('cars.edit');
//     Route::put('{id}', [CarController::class, 'update'])->name('cars.update');
//     Route::get('{id}/details', [CarController::class, 'show'])->name('cars.details');
//     Route::delete('{id}/delete', [CarController::class, 'destroy'])->name('cars.destroy');
//     Route::get('trashed', [CarController::class, 'showDeleted'])->name('cars.showDeleted');
//     Route::patch('{id}', [CarController::class, 'restore'])->name('cars.restore');
//     Route::delete('{id}', [CarController::class, 'forceDelete'])->name('cars.forceDelete');
// });
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

// Route::get('index', [ExampleController::class, 'index']);
// Route::get('about', [ExampleController::class, 'about']);


//task_09

Route::get('index', [ProductController::class, 'home']);
Route::group([
    'prefix' => 'products',
    'controller' => ProductController::class,
    'as' => 'products.',
], function() {
    Route::get('', 'index')->name('index');
    Route::get('create',  'create')->name('create');
    Route::post('', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('{id}', 'update')->name('update');
});

Route::get('testOneToOne', [ExampleController::class, 'test']);

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.submit');