<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return "Welcome Armish! This is my first Laravel page.";
});
Route::get('/variables', function () {

    $name = "Ali Malik";
    $age = 22;
    $city = "Haripur";

    return "Name: $name <br> Age: $age <br> City: $city";

});
Route::get('/operators', function () {

    $num1 = 20;
    $num2 = 10;

    $sum = $num1 + $num2;
    $sub = $num1 - $num2;
    $mul = $num1 * $num2;
    $div = $num1 / $num2;

    return "
    Number 1 = $num1 <br>
    Number 2 = $num2 <br><br>

    Addition = $sum <br>
    Subtraction = $sub <br>
    Multiplication = $mul <br>
    Division = $div
    ";

});