<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $name = "Armish Khan";
        $department = "BS Data Science";

        return view('home', compact('name', 'department'));
    }

    public function about()
    {
        return "About Page";
    }

    public function students()
    {
        return view('students');
    }

    public function contact()
    {
        return "Contact Page";
    }
}