<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\LearningPoint;
use App\Models\CourseTopic;
use Crypt;

class HomeController extends Controller
{
    
    public function index(){
        $data['course'] = Course::select('id','course_name','actual_amount','course_images','amount')->limit(4)->get();
        return view('front.home',[
            'data' => $data
        ]);
    }

    public function courseDetails($id){
        
        $courseId = Crypt::decrypt($id);

        $data = Course::select('id','course_name','actual_amount','short_description','description','course_time')->orderBy('id','desc')->where('id', $courseId)->first();
        $learningPoints = LearningPoint::select('id','learning_point')->where('course_id', $courseId)->get();
        $CourseTopics = CourseTopic::select('id','topics')->where('course_id', $courseId)->get();
        $allCourses =  Course::select('id','course_name','actual_amount','amount')->get();

        return view('front.course.course-detail',[
            'data' => $data,
            'learning_points' =>  $learningPoints,
            'course_topics' => $CourseTopics,
            'courses' => $allCourses
        ]);
    }
}
