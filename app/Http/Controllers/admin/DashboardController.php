<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Course;
use App\Models\Offer;

use App\Models\StudentRegister;


class DashboardController extends Controller
{
    public function index(){
        $data['student_count'] = StudentRegister::select('id')->get()->count();
        $data['college_count'] = College::select('id')->get()->count();
        $data['course'] = Course::with('offers')->orderBy('id','desc')->get();

        // dd($data['course']);

        // $offer = '';
        // foreach($data['course'] as $key => $value){
        //     $today = date('Y-m-d');

        //     // dd($today);
        //     $offers = Offer::where('course_id', $value->id)
        //         ->where(function ($query) use ($today) {
        //             $query->whereBetween('from_date', [$today, $today])
        //                 ->orWhereBetween('to_date', [$today, $today])
        //                 ->orWhere(function ($query) use ($today) {
        //                     $query->where('from_date', '<=', $today)
        //                           ->where('to_date', '>=', $today);
        //                 });
        //         })
        //         ->first();
        //    $offer =  $offers;
        // }



        return view('admin.dashboard',compact('data'));
    }

}
