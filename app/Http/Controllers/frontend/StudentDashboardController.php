<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class StudentDashboardController extends Controller
{
    public function dashboard(){
        $course = Course::select('id','course_name','amount','actual_amount','course_images');
        $course =  $course->paginate(8);
        // dd($course);
        return view('front.dashboard',[
            'data' => $course, 
        ]);    
    }
}
