<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;


// Route::get('login', [ExampleController::class, 'login']);
// Route::get('cv', [ExampleController::class, 'cv']);
Route::get('task3', [ExampleController::class, 'task3']);
Route::post('user_data', [ExampleController::class, 'store'])->name('user_data');

Route::get('cars/create', [CarController::class, 'create'])->name('cars.create');
Route::post('cars', [CarController::class, 'store'])->name('cars.store'); 

//lambda function doesn't need name
Route::get('/', function () {
    return view('welcome');
});

// or Route::get('w', [without forword slash]
Route::get('/w', function () {
    return "Hello Laravel!!";
});

// id is a parameter get from url
// Route::get('cars/{id}', function($id) {
//     return "Car number is ". $id;
// });

// optional URI parameter {id?}, defult value ($id=0)
// Route::get('cars/{id?}', function($id=0) {
//     return "Car number is ". $id;
// });

//constrain on id -> (regular expression)
// Route::get('cars/{id?}', function($id=0) {
//     return "Car number is ". $id;
// })->where([
//     'id' => '[0-9]+'
// ]);

// another way for entering variable in numbers
// Route::get('cars/{id?}', function ($id = 0) {
//     return "Car number is " . $id;
// })->whereNumber('id');

// can use many (nesting) ->
// Route::get('user/{name}/{age}', function($name, $age){
//     return "Username is " . $name . "and age is " . $age;
// })->whereAlpha('name')->whereNumber('age');

// by where
// Route::get('user/{name}/{age?}', function($name, $age){
//     $name = ucfirst($name); //to write first letter in uppercase
//     return "Username is " . $name . " and age is " . $age;
// })->where([
//         'age' => '[0-9]+',
//         'name' => '[a-zA-Z]+'
// ]);

// using $age = 0 or null
// Route::get('user/{name}/{age?}', function ($name, $age = null) {
//     $name = ucfirst($name); //to write first letter in uppercase
//     if ($age === null) {
//         return "Username is " . $name;
//     } else {
//         return "Username is " . $name . " and age is " . $age;
//     }
// })->where([
//     'age' => '[0-9]+',
//     'name' => '[a-zA-Z]+',
// ]);

// Route::get('baby/{gender}', function ($gender) {
//     $gender = ucfirst($gender);
//     return "Gender is " . $gender;
// })->whereIn('gender', ['male', 'female']);

//***route prefix
// company/IT
//company/users
//company
// more clean and readable
// Route::prefix('company')->group(function() {

//     Route::get('', function() {
//         return 'Company Index';
//     });

//     Route::get('IT', function() {
//         return 'Company IT';
//     });

//     Route::get('users', function() {
//         return 'Company users';
//     });
// });

// task2
// - accounts
// - accounts/admin
// - accounts/user

Route::prefix('accounts')->group(function () {

    Route::get('', function () {
        return 'Accounts Index.';
    });

    Route::get('admin', function () {
        return 'Wellcome Admin!';
    });

    Route::get('user', function () {
        return 'Wellcome user!';
    });
});

// - cars
// - cars/usa/ford
// - cars/usa/tesla
// - cars/ger/mercedes
// - cars/ger/audi
// - cars/ger/volkswagen

// Route::prefix('cars')->group(function () {

//     Route::get('', function () {
//         return 'Wellcome to cars webpage!';
//     });

//     Route::prefix('usa')->group(function () {

//         Route::get('', function () {
//             return 'Wellcome to USA cars!';
//         });

//         Route::get('ford', function () {
//             return 'Wellcome to Ford cars! </br> Made in USA.';
//         });

//         Route::get('tesla', function () {
//             return 'Wellcome to Tesla cars! </br> Made in USA.';
//         });
//     });

//     Route::prefix('ger')->group(function () {

//         Route::get('', function () {
//             return 'Wellcome to German cars!';
//         });

//         Route::get('mercedes', function () {
//             return 'Wellcome to Mercedes cars! </br> Made in Germany.';
//         });

//         Route::get('audi', function () {
//             return 'Wellcome to Audi cars! </br> Made in Germany.';
//         });

//         Route::get('volkswagen', function () {
//             return 'Wellcome to Volkswagen cars! </br> Made in Germany.';
//         });
//     });
// });

//session_3 Advanced-level
//Fallback used to redirect to home page to not show error to users if they tried to enter a URI not found
//Note: it is used after finishing the project

// Route::fallback(function () {
//     return redirect('/');
// });

//Route view
//to show all views recources -> views
//ctrl + u page resource

//logics
// Route::get('cv', function () {
//     return view('cv');
// });
// the previous code is equivalent to
// Route::view('cv', 'cv');

// Route::get('link', function () {
//     $url = route('w');
//     return "<a href='$url'>Go to welcome page</a>";
// });

// Route::get('link', function () {
//     $url1 = route('w');
//     $url2 = route('g');
//     return "<a href='$url1'>go to welcome</a> <br> <a href='$url2'>go to page</a> ";
//      return redirect('welcome');
// });

// Route::get('welcome', function () {
//     return "welcome to Laravel";
// })->name('w');

// Route::get('goodbye', function () {
//     return "goodbye to laravel";
// })->name('g');
/////////////////////////////////////////////
// Route::get('login', function () {
//     return view('login');
// });

// Route::post('data', function () { // the uri which appear on browser
//     return 'Data received successfully!';
// })->name('data');

