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

        $authId = Auth::user();
        $id = Auth::user()->id;


        $amount =  round($request->amount);

        $customerId = "IIDT"."-".$authId->id;

        $get_mobile = StudentRegister::where('user_id',$id)->first();

       $mobie = $get_mobile ? $get_mobile->mobile : '0123456789';

        $mobile =  strval($mobie);

        // if($dataUser){
        //     $mobile =  $dataUser->mobile;
        // }else{
        //     return redirect()->back('error', 'Your mobile number is not found in our records');
        // }
       
        $orderId = date('Y-m-d')."-".time();

       

        $data = ['order_id' => $orderId,
        'amount' =>  $amount,
        'customer_id' => $customerId,
        'customer_email' => $authId->email,
        'customer_phone' => $mobile,
        'payment_page_client_id' => 'hdfcmaster',
        'action' => 'paymentPage',
        'currency' => 'INR',
        'return_url' => 'https://shop.merchant.com',
        'description' => 'Complete your payment',
        'first_name' => $authId->name 
        ];

        $data_new = json_encode($data);


       // dd($data_new);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://smartgatewayuat.hdfcbank.com/session',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>$data_new,
        CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'x-merchantid: SG755',
        'x-customerid: hdfcmaster',
        'Authorization: Basic MjM0MzAxOTFCM0I0NjA2QUU3MTQ4QTcyNUZBRTE1Og=='
        ),
        ));

        $response = curl_exec($curl);
        $responseData = json_decode($response);
        $status = $responseData->status;

        if($responseData->status == 'NEW'){
            $payment = new CoursePayment();
            $payment->user_id = $authId->id;
            $payment->course_id = $request->course_id;
            $payment->payment_status = $responseData->status;
            $payment->payment_gateway_order_id = $responseData->id;
            $payment->order_id = $responseData->order_id;
            $payment->amount = $responseData->sdk_payload->payload->amount;
            $payment->customer_id = $responseData->sdk_payload->payload->customerId;
            $payment->name = $responseData->sdk_payload->payload->firstName;
            $payment->mobile = $responseData->sdk_payload->payload->customerPhone;
            $payment->email = $responseData->sdk_payload->payload->customerEmail;
            $payment->status = 'Pending';
            $payment->save();
            return view('front.payment-response', compact('responseData'));
        }else{
            $payment = new CoursePayment();
            $payment->user_id = $authId->id;
            $payment->course_id = $request->course_id;
            $payment->payment_status = $responseData->status;
            $payment->payment_gateway_order_id = !empty($responseData->id) ? $responseData->id : NULL;
            $payment->order_id = !empty($responseData->order_id) ? $responseData->order_id : NULL;
            $payment->amount = !empty($responseData->sdk_payload->payload->amount) ?  $responseData->sdk_payload->payload->amount : NULL;
            $payment->customer_id = !empty($responseData->sdk_payload->payload->customerId) ? $responseData->sdk_payload->payload->customerId : NULL;
            $payment->name = !empty($responseData->sdk_payload->payload->firstName) ? $responseData->sdk_payload->payload->customerId : NULL;
            $payment->mobile = !empty($responseData->sdk_payload->payload->customerPhone) ? $responseData->sdk_payload->payload->customerPhone : NULL;
            $payment->email = !empty($responseData->sdk_payload->payload->customerEmail) ? $responseData->sdk_payload->payload->customerEmail : NULL;
            $payment->status = 'Pending';
            $payment->remarks =  $responseData->error_info->fields[0]->reason;
            $payment->save();
            // echo "<pre>";
            // print_r($responseData);die;

              // print_r($responseData->error_info->fields[0]->reason);die;



            return view('front.payment-response', compact('responseData'));
        }
       




        // try{

        //     $validator = (new Validator($request))->store();
        //     if($validator->fails()){
        //         throw new ValidationException($validator);
        //     }
        //     check course purchage or not

        //     $checkpayments = CoursePayment::where('course_id',  $request->course_id)->first();
        //     $offer_id = Offer::where('coupon_code', $request->coupon_code)->first();
        //     if($offer_id){
        //        $offerId =  $offer_id->id;
        //     }else{
        //         $offerId =  NULL;
        //     }
        //     if($checkpayments){
        //         return redirect()->back()->with("error", "You have already Purchase this course !");
        //     }

            
          

            // $payment = new CoursePayment();
            // $payment->offer_id = $offerId;
            // $payment->user_id = auth()->user()->id;
            // $payment->fill($request->all());
            // $payment->save();

            // User::find(10)->notify(new PaymentSuccessful($payment->amount));


            // return view('students.payments.uploadscreentshots',compact('payment'));

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
