<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ConstantHelper;
use App\Models\Course;
use App\Models\LearningPoint;
use App\Models\CourseTopic;
use Exception;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Course as Validator;
use App\Http\Requests\LearningPoints as LearningPointValidator;
use App\Http\Requests\CourseTopics as CourseTopicsValidator;

use File;


class CourseController extends Controller
{
    public function index(Request $request){
        $search = $request->search;
        $paymentTypes=ConstantHelper::PAYMENT_TYPE;
        $courses = Course::select('id','course_name','course_code','payment_type','amount','discount_amount_percentage','actual_amount','course_time','created_at')->orderBy('id','desc');
        if($search){
            $courses->where(function($query) use ( $search){
                $query->where('course_name', 'like', "%{$search}%");
                $query->orWhere('course_code', 'like', "%{$search}%");
                $query->orWhere('payment_type', 'like', "%{$search}%");
                $query->orWhere('course_time', 'like', "%{$search}%");
            });
        }

        if($request->payment_type){
            $courses->where('gender', $request->gender);
        }

        $courses =  $courses->paginate(10);

        return view('admin.courses.course-index', compact('courses','paymentTypes'));

    }
    public function create(){

        $paymentTypes=ConstantHelper::PAYMENT_TYPE;
        return view('admin.courses.course-create',compact('paymentTypes'));

    }
    public function save(Request $request){


        $validator = (new Validator($request))->store();
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        if($request->has('course_images')){
             $images = $request->course_images;
             $imgName = $images->getClientOriginalName();
             $path = 'uploads/course-images/';
             $images->move($path,  $imgName);
        }

        // dd($request->all());

        $course = new Course();
        $amount = $request->amount;
        $discountPercentage = $request->discount_amount_percentage;
        $percentageAmt =  ($amount * $discountPercentage) / 100;
        $actualAmt = $amount -  $percentageAmt;
        $course->fill($request->all());
        $course->actual_amount = $actualAmt;
        $course->course_images =  $imgName;
        $course->status = 1;
        $course->save();
        return redirect()->route('courses.index')->with("success", "Course created !");
       
    }

    public function edit(Course $course){
        $paymentTypes = ConstantHelper::PAYMENT_TYPE;
        return view('admin.courses.course-edit', compact('course','paymentTypes'));
    }

    public function update(Request $request, Course $course){
      
        $validator = (new Validator($request))->update();
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

            $docuemtId = Course::where('id',$course->id)->first();
            if($request->file('course_images')){ 
                $image_path = public_path("uploads/course-images/" . $docuemtId->course_images);
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                $images = $request->course_images;
                $imgName = $images->getClientOriginalName();
                $path = 'uploads/course-images/';
                $images->move($path,  $imgName);
              
        } else {
                $imgName = $docuemtId->course_images;
        }
    

        $amount = $request->amount;
        $discountPercentage = $request->discount_amount_percentage;
        $percentageAmt =  ($amount * $discountPercentage) / 100;
        $actualAmt = $amount -  $percentageAmt;

        $dataCourse =   $docuemtId;
        $dataCourse->fill($request->all());
        $dataCourse->actual_amount = $actualAmt;
        $dataCourse->course_images = $imgName;
        $dataCourse->save();
        return redirect()->route('courses.index')->with("success", "Course updated !");

    }


    // learning points
    
    public function learningPoints(){
        $course = Course::select('id','course_name')->get();
        return view('admin.courses.course-learning-points',[
            'data' => $course,
        ]);
    }

    public function savelearningPoints(Request $request){
      
        $validator = (new LearningPointValidator($request))->store();
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        $data = new LearningPoint();
        $data->fill($request->all());
        $data->save();
        return redirect()->route('courses.learningpointslists')->with('success', 'Learning Points Added !');
    }

    public function learningPointsLists(Request $request){
        $search = $request->search;
        $data = LearningPoint::with('getCourseName')->orderBy('id','desc');
        if($search){
            $data->where(function($query) use ( $search){
                $query->where('learning_point', 'like', "%{$search}%");
                $query->orWhere('course_id', 'like', "%{$search}%");
            });
        }
 
        $data =  $data->paginate(10);
        return view('admin.courses.course-learning-points-index',[
            'data' => $data
        ]);
    }


    // course topics


    public function courseTopics(){
        $course = Course::select('id','course_name')->get();
        return view('admin.courses.course-topics',[
            'data' => $course,
        ]);
    }

    public function saveTopics(Request $request){
      
        $validator = (new CourseTopicsValidator($request))->store();
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        $data = new CourseTopic();
        $data->fill($request->all());
        $data->save();
        return redirect()->route('courses.topicslists')->with('success', 'Learning Points Added !');
    }

    public function TopicsLists(Request $request){
        $search = $request->search;
        $data = CourseTopic::with('getCourseName')->orderBy('id','desc');
        if($search){
            $data->where(function($query) use ( $search){
                $query->where('topics', 'like', "%{$search}%");
                $query->orWhere('course_id', 'like', "%{$search}%");
            });
        }
 
        $data =  $data->paginate(10);
        return view('admin.courses.course-topics-lists',[
            'data' => $data
        ]);
    }



    public function destroy(Course $course){
        $course->delete();
        return redirect()->route('courses.index')->with("error", "Course deleted!");
    }
}
