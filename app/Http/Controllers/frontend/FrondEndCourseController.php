<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class FrondEndCourseController extends Controller
{
    public function index(){
        $course = Course::select('id','course_name','actual_amount','amount','course_images');
        $course =  $course->paginate(8);
        // dd($course);
        return view('front.course.course',[
            'data' => $course, 
        ]);
    }
}
