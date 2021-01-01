<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // $classes = Classes::all();
        // $students = Student::paginate(10);
        return view('backend.students');
    }
}
