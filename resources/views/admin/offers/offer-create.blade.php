@extends('admin.layouts.master')
@section('title', 'Add Coupon')
@section('content')
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Coupon </h5>
                        </div>
                        <ul class="breadcrumb">
                            {{ Breadcrumbs::render('offer_create') }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Create Course</h5>
                    </div>
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

                        <div class="row">
                            <div class="col-md-6">
                                <form method="post" action="{{ route('offers.save') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="course_name">Coupon Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Coupon Name">
                                        @if($errors->has('name'))
                                            <small id="error" class="form-text text-muted text-danger">{{ $errors->first('name') }}</small>
                                        @endif
                                    </div>
                            </div>
                           
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Course</label>
                                        <select class="form-control" id="course_id" name="course_id">
                                            <option value=" "> -- Select Course -- </option>
                                            @foreach($courses as $key => $value)
                                                <option value="{{ $value->id}}"> {{  ucfirst($value->course_name) }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('course_id'))
                                            <small id="error" class="form-text text-muted text-danger">{{ $errors->first('course_id') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>College</label>
                                        <select class="form-control" id="college_id" name="college_id">
                                            <option value=" "> -- Select College -- </option>
                                            @foreach($college as $key => $value)
                                                <option value="{{ $value->id}}"> {{  ucfirst($value->name) }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('college_id'))
                                            <small id="error" class="form-text text-muted text-danger">{{ $errors->first('college_id') }}</small>
                                        @endif
                                    </div>
                                </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">From Date</label>
                                    <input type="date" class="form-control" name="from_date" id="from_date" placeholder="Enter from date">
                                    @if($errors->has('from_date'))
                                        <small id="error" class="form-text text-muted text-danger">{{ $errors->first('from_date') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">To Date</label>
                                    <input type="date" class="form-control" name="to_date" id="to_date" placeholder="Enter to date">
                                    @if($errors->has('to_date'))
                                        <small id="error" class="form-text text-muted text-danger">{{ $errors->first('to_date') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Coupon Amount (in %)</label>
                                    <input type="number" class="form-control" name="offer_percentage" id="offer_percentage" placeholder="Enter offer percentage">
                                    @if($errors->has('offer_percentage'))
                                        <small id="error" class="form-text text-muted text-danger">{{ $errors->first('offer_percentage') }}</small>
                                    @endif
                                </div>  
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Coupon Code</label>
                                    <input type="text" class="form-control" value="" name="coupon_code" id="coupon_code" placeholder="Enter offer percentage">
                                    @if($errors->has('coupon_code'))
                                        <small id="error" class="form-text text-muted text-danger">{{ $errors->first('coupon_code') }}</small>
                                    @endif
                                    <button type="button" onclick="generateCouponCode()"  class="btn btn-success mt-2">Generate Coupon Code</button>
                                </div>  
                            </div>
                        </div>
                        <button type="submit" class="btn  btn-primary float-right">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('scripts')

<script>
function generateCouponCode() {
    
    const charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    let couponCode = "";
    for (let i = 0; i < 10; i++) {
        const randomIndex = Math.floor(Math.random() * charset.length);
        couponCode += charset[randomIndex];
    }
    let coupon = 'TRAINING-'+couponCode;
    // alert(coupon);
    $("#coupon_code").val(coupon);
    
}
</script>
@endsection
@endsection
