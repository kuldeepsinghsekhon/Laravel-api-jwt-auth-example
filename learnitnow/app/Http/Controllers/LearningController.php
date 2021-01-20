<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Coursecategory;
use App\Models\Coursesenrolled;
use App\Models\Coursechapter;
use App\Models\Lecture;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LearningController extends Controller
{
    public function index()
    {   
        $courseCount = Course::all()->count();
        $courseCount = (int)ceil($courseCount / 5);
        
        $courses = Course::all();
        return view('learning',compact('courses','courseCount'));
    }
}