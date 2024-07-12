<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\StudentRegister;
use App\Models\CoursePayment;
use App\Models\Offer;
use App\Models\User;
use Auth;
use App\Helpers\ConstantHelper;
use Exception;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\CoursePayment as Validator;
use File;
use App\Notifications\PaymentSuccessful;


class PaymentController extends Controller
{

    public function index(Request $request){

        $payments = CoursePayment::with('GetUsersDetails','GetCourseDetail')->paginate(10);
            return view('admin.payments.paymentIndex',compact('payments'));
    }

    public function create($id){

        $courseId = $id;
        $paymentStatus = ConstantHelper::PAYMENT_STATUS;

        $userDetails = StudentRegister::with('getCourseDetail','getCollegeDetail')
                        ->where('id', auth()->user()->seminar_registration_id)->first();

        //dd($userDetails);
        $course = Course::with('offers')->where('id', $id)->first();

        // dd($course);

        return view('students.payments.pay',compact('paymentStatus','course','userDetails'));
    }


    public function store(Request $request){

        // dd($request);
        
        // try{

            $validator = (new Validator($request))->store();
            if($validator->fails()){
                throw new ValidationException($validator);
            }
            // check course purchage or not

            $checkpayments = CoursePayment::where('course_id',  $request->course_id)->first();
            $offer_id = Offer::where('coupon_code', $request->coupon_code)->first();
            if($offer_id){
               $offerId =  $offer_id->id;
            }else{
                $offerId =  NULL;
            }
            if($checkpayments){
                return redirect()->back()->with("error", "You have already Purchase this course !");
            }

            
          

            $payment = new CoursePayment();
            $payment->offer_id = $offerId;
            $payment->user_id = auth()->user()->id;
            $payment->fill($request->all());
            $payment->save();

            User::find(10)->notify(new PaymentSuccessful($payment->amount));


            return view('students.payments.uploadscreentshots',compact('payment'));

        // }catch(\Exception $e){
            
        //     return response()->json([
        //        'message' => $e
        //     ]);
        // }
      
    }

    public function verifyPayments(CoursePayment $coursePayment){
        $coursePayment->status = 'Verified';
        $coursePayment->save();
        return redirect()->back()->with("success", "Payment verified !");
    }

    public function updatePayments(Request $request){

        $payment = CoursePayment::find($request->id);

      if ($request->hasFile('amount_screen_shot')){
    
                $image = $request->file('amount_screen_shot');
                $imgName = rand()."_".$image->getClientOriginalName();
                $destinationPath = public_path('/uploads/course-payments/');
                $image->move($destinationPath, $imgName);
                
            }else{
                $imgName = '';
            }

            $payment->amount_screen_shot = $imgName;
            $payment->save();

            return redirect()->route('dashboard')->with("success", "Payment screenshot uploaded !");
    }

    public function markAsRead(){
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    
}
