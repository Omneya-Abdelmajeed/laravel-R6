<?php

use Illuminate\Support\Facades\Route;

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

Route::get('baby/{gender}', function ($gender) {
    $gender = ucfirst($gender);
    return "Gender is " . $gender;
})->whereIn('gender', ['male', 'female']);

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

Route::prefix('cars')->group(function () {

    Route::get('', function () {
        return 'Wellcome to cars webpage!';
    });

    Route::prefix('usa')->group(function () {

        Route::get('', function () {
            return 'Wellcome to USA cars!';
        });

        Route::get('ford', function () {
            return 'Wellcome to Ford cars! </br> Made in USA.';
        });

        Route::get('tesla', function () {
            return 'Wellcome to Tesla cars! </br> Made in USA.';
        });
    });

    Route::prefix('ger')->group(function () {

        Route::get('', function () {
            return 'Wellcome to German cars!';
        });

        Route::get('mercedes', function () {
            return 'Wellcome to Mercedes cars! </br> Made in Germany.';
        });

        Route::get('audi', function () {
            return 'Wellcome to Audi cars! </br> Made in Germany.';
        });

        Route::get('volkswagen', function () {
            return 'Wellcome to Volkswagen cars! </br> Made in Germany.';
        });
    });
});
