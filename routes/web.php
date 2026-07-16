<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
Route::get('/students', [StudentController::class, 'index']);
Route::post('/students', [StudentController::class, 'store']);

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
Route::get('/class', function () {

    class Student
    {
        public $name;
        public $age;

        public function showData()
        {
            return "Name: " . $this->name . "<br>Age: " . $this->age;
        }
    }


    $student = new Student();

    $student->name = "Armish";
    $student->age = 22;

    return $student->showData();

});
Route::get('/inheritance', function () {

    class Person
    {
        public $name;

        public function showName()
        {
            return "Name: " . $this->name;
        }
    }


    class Student extends Person
    {
        public $course;

        public function showCourse()
        {
            return "<br>Course: " . $this->course;
        }
    }


    $student = new Student();

    $student->name = "Armish";
    $student->course = "BS Data Science";


    return $student->showName() . $student->showCourse();

});
Route::get('/traits', function () {

    trait Message
    {
        public function sendMessage()
        {
            return "Hello Armish! This message is coming from Trait.";
        }
    }


    class Student
    {
        use Message;
    }


    class Teacher
    {
        use Message;
    }


    $student = new Student();
    $teacher = new Teacher();


    return $student->sendMessage() . "<br>" . $teacher->sendMessage();

});
Route::get('/namespace', function () {

    class StudentProfile
    {
        public function info()
        {
            return "Student Name: Armish <br> Department: Data Science";
        }
    }


    $student = new StudentProfile();

    return $student->info();

});
use App\Http\Controllers\PageController;


Route::get('/home', [PageController::class, 'home']);

Route::get('/about', [PageController::class, 'about']);

Route::get('/contact', [PageController::class, 'contact']);