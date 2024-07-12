@extends('admin.layouts.master')
@section('title', 'Payment Create')
@section('content')
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Payments</h5>
                        </div>
                        {{-- <ul class="breadcrumb">
                            {{ Breadcrumbs::render('college_create') }}
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="">
                    {{-- <div class="card-header">
                        <h5>Create Payments</h5>
                    </div> --}}
                 
                    <div class="card-body">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif

                    <form method="post" action="{{ route('payments.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-7">
                                <div class="p-2 card">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="paymentStatus">Name<sup class="text-danger">*</sup></label>
                                                <input type="hidden" name="course_id" value="{{$course->id}}">
                                                <input type="text" class="form-control" name="name" value="{{$userDetails->name}}" disabled/>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="paymentStatus">Email<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control" name="email" value="{{$userDetails->email}}"disabled />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="paymentStatus">Mobile Number<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control" name="mobile" value="{{$userDetails->mobile}}" disabled/>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="paymentStatus">College Name<sup class="text-danger">*</sup></label> <br>
                                                <input type="hidden" class="form-control" name="college_id" value="{{$userDetails->getCollegeDetail->id }}"/> 
                                                {{$userDetails->getCollegeDetail->name}}
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="paymentStatus">Course<sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control" name="course_name" value="{{$userDetails->getCourseDetail->course_name }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>

                            <div class="col-md-5">
                                <div class="card p-5">
                                    <div class="row ">
                                        <div class="col-md-12 mb-2 p-2">
                                            <h5>Payment Summary</h5>
                                        </div>
    
                                        <div class="col-md-6">
                                            <label>Course Amount</label> 
                                        </div>
                                        <div class="col-md-6">
                                            Rs. <del class="text-danger"> {{$course->amount}}</del> 
                                        </div>
                                        <div class="col-md-6">
                                            <label>Discount {{$course->discount_amount_percentage}}%</label> 
                                        </div>
                                        <div class="col-md-6">
    
                                            @php
                                                $discount = ($course->amount * $course->discount_amount_percentage) / 100
                                            @endphp
                                           <label>-   Rs {{$discount}}  </label> 
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label>Actual Payable Amount</label> 
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label>Rs {{$course->actual_amount}}</label> 
                                            <input type="hidden" name="amount" id="amount" value="{{$course->actual_amount}}" />
                                        </div>
                                        @foreach($course->offers as $key => $value)
    
                                        @if(!empty($value->coupon_code))
                                                <div class="col-md-6">
                                                    <input type="text" name="coupon_code" id="coupon_code" value="" class="form-control" placeholder="Enter coupon code">
    
                                                    <small id="message" class="text-success"></small>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="button" id="submit_form" class="btn btn-success" value="Apply">Apply Coupon</button> 
                                                </div>
                                          
                                                <div class="col-md-6" style="display: none" id="offerpercentage1">
                                                    <label>Discount ({{$value->offer_percentage}}) % </label> 
                                                </div>
                                                <div class="col-md-6" style="display: none" id="offerpercentage2">
                                                        @php
                                                        $total_discount_percnt = $course->discount_amount_percentage + $value->offer_percentage;
                                                        $offerdiscount =  ($course->amount  *   $total_discount_percnt) / 100;
                                                        @endphp
                                                    <label> -  Rs {{$offerdiscount}} </label> 
                                                </div>     
                                            @endif
                                        @endforeach
    
                                        <div class="col-md-6 mt-2" style="display: none" id="offerpercentage3">
                                            <label>Total Payable Amount</label> 
                                        </div>
                                        <div class="col-md-6 mt-2" style="display: none" id="offerpercentage4">
                                            <label id="actual_amt"> Rs {{$course->actual_amount}}</label> 
                                        </div>
                                       
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                                <button type="submit" class="btn  btn-primary float-right">Continue</button>
                            </form>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
<script>

$(document).ready(function(){
    $("#submit_form").click(function(e) {
    e.preventDefault();

   
    
    let data = {
        coupon_code: $("#coupon_code").val(),
        _token: "{{ csrf_token() }}"
    };

    $.ajax({
        type: 'POST',
        url: "{{ route('offer.ApplyCouponCode') }}",
        data: data,
        dataType: 'json',
        success: function(response) {
            console.log(response);
            if(response.status == 'success'){
                $('#message').html(response.message);
                $('#actual_amt').html(response.data + '.00');
                $('#amount').val(response.data + '.00');
                $('#offerpercentage1').show();
                $('#offerpercentage2').show();
                $('#offerpercentage3').show();
                $('#offerpercentage4').show();
            }else{
                $('#message').html(response.message);  
            }
        },
        error: function(xhr, status, error) {
            console.error("Error:", error);
        }
    });
});

 
});

</script>
@endsection
@endsection