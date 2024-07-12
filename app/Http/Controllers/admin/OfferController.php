<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Course;
use App\Models\College;
use Exception;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Offer as Validator;
use DB;

class OfferController extends Controller
{
    public function index(Request $request){
        $search = $request->search;
        $offers = Offer::with('courseDetails')->orderBy('id','desc');
        if($search){
            $offers = $offers->where(function ($q) use ($search){
                $q->where('name', 'LIKE', "%{$search}%");
                $q->orWhere('name', 'LIKE', "%{$search}%");
            });

        }
        $offers = $offers->paginate(10);

      return view('admin.offers.offer-index',compact('offers'));

    }

    public function create(){
        $courses = Course::select('id','course_name')->get();
        $college = College::select('id','name')->get();
        return view('admin.offers.offer-create',compact('courses','college'));
    }

    public function save(Request $request){

        // DB::beginTransaction();
        // try{
            $validator = (new Validator($request))->store();
            if($validator->fails()){
                throw new ValidationException($validator);
            }
    
            $from = $request->from_date;
            $to = $request->to_date;
            $courseId = $request->course_id;

            $overlappingOffer = Offer::where('course_id', $courseId)
                ->where(function ($query) use ($from, $to) {
                    $query->whereBetween('from_date', [$from, $to])
                        ->orWhereBetween('to_date', [$from, $to])
                        ->orWhere(function ($query) use ($from, $to) {
                            $query->where('from_date', '<=', $from)
                                    ->where('to_date', '>=', $to);
                        });
                })
                ->first();
        
         if($overlappingOffer){
            return redirect()->back()->with("error", "You have reacted offer between $request->from_date and $to date!");
         }

    
            $offer = new Offer();
            $offer->fill($request->all());
            $offer->save();
    
            //update course discount price
            $course =  Course::where('id', $request->course_id)->first();
            $mainAmount = $course->amount;
            $discountPercentage = ($mainAmount *  $request->offer_percentage) / 100;
            $course->discount_amount =  $discountPercentage;
            $course->actual_amount =   $mainAmount -  $discountPercentage;
            $course->save();
            // DB::commit();
            return redirect()->back()->with("success", "Offer created !");
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return redirect()->back()->with("error", "Offer not created !");
        // }
       

       
    }

    public function edit(Offer $offer){
        $courses = Course::select('id','course_name')->get();
        return view('admin.offers.offer-edit', compact('offer','courses'));
    }

    public function update(Offer $offer, Request $request){
      
        DB::beginTransaction();
        try{
            $validator = (new Validator($request))->update();
            if($validator->fails()){
                throw new ValidationException($validator);
            }
    
            // dd($request->all());
    
            $offer = $offer;
            $offer->fill($request->all());
            $offer->save();
    
            //update course discount price
            $course =  Course::where('id', $request->course_id)->first();
            $mainAmount = $course->amount;
            $discountPercentage = ($mainAmount *  $request->offer_percentage) / 100;
            $course->discount_amount_percentage =  $discountPercentage;
            $course->actual_amount =   $mainAmount -  $discountPercentage;
            $course->save();
            DB::commit();
            return redirect()->back()->with("success", "Offer Updated !");
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with("error", "Offer not updated !". $e);
        }
       

    }


    public function applyCouponCode(Request $request){
        
        $couponCode = $request->coupon_code;
        $couponVerify = Offer::where('coupon_code',$couponCode)->first();
        $course = Course::where('id',   $couponVerify->course_id)->first();

        $amount =  $course->amount;
        $discountAmount = $course->dicount_amount_percentage;
        $couponPercentrage =  $couponVerify->offer_percentage;
        $total_discount_percent =  $discountAmount +  $couponPercentrage;

        $percentage_amount_after_coupon_appl =  ($amount *  $total_discount_percent) / 100;
        $actualAmount =  $course->actual_amount  - $percentage_amount_after_coupon_appl;








        if($couponVerify){
            return response()->json([
                'data' =>    $actualAmount,
                'message' =>  'Coupon Applied',
                'status' =>  'success'
            ]);
        }else{
            return response()->json([
                'data' =>   $couponVerify,
                'message' =>  'Invalid Applied',
                'status' =>   'error'
            ]);
        }
      




        return response()->json([
            'data' =>   $couponVerify,
        ]);
    }

    public function destroy(Offer $offer){
        $offer->delete();
        return redirect()->route('offers.index')->with("error", "Offer deleted!");
    }
}
