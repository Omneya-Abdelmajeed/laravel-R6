<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/', function () {
  return view('welcome');
});


Route::group(
  [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
  ], function(){ 
Route::group(['middleware' => 'verified',
  'prefix' => 'cars',
  'controller' => CarController::class,
  'as' => 'cars.',
  // 'middleware' => 'verified',
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
});