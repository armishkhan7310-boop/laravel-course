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
Route::get('/arrays', function () {

    $students = ["Ali", "Ahmed", "Armish", "Areeba", "Hanan"];

    return "
    Student 1: $students[0] <br>
    Student 2: $students[1] <br>
    Student 3: $students[2] <br>
    Student 4: $students[3] <br>
    Student 5: $students[4]
    ";

});

Route::get('/functions', function () {

    $student = function($name)
    {
        return "Student Name: " . $name;
    };

    return $student("Armish");

});