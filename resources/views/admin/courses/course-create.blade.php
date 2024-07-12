@extends('admin.layouts.master')
@section('title', 'Add Course')
@section('content')
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Course</h5>
                        </div>
                        <ul class="breadcrumb">
                            {{ Breadcrumbs::render('courses_create') }}
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
                      
                        <div class="row">
                            <div class="col-md-6">
                                <form method="post" action="{{ route('courses.save') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="course_name">Course Name</label>
                                        <input type="text" class="form-control" name="course_name" id="course_name" value="{{ old('course_name') }}" placeholder="Enter Course">
                                        @if($errors->has('course_name'))
                                            <small id="error" class="form-text text-muted text-danger">{{ $errors->first('course_name') }}</small>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="course_name">Short Description</label>
                                        <input type="text" class="form-control" name="short_description"  value="{{ old('short_description') }}" id="short_description" placeholder="Enter Short Description">
                                        @if($errors->has('short_description'))
                                            <small id="error" class="form-text text-muted text-danger">{{ $errors->first('course_name') }}</small>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="course_code">Course Code</label>
                                        <input type="text" class="form-control" name="course_code" value="{{ old('course_code') }}" id="course_code" placeholder="Enter Course Code">
                                        @if($errors->has('course_code'))
                                            <small id="error" class="form-text text-muted text-danger">{{ $errors->first('course_code') }}</small>
                                        @endif
                                    </div>     
                                    
                                    <div class="form-group">
                                        <label>Course Type</label>
                                        <select class="form-control" id="payment_type" name="payment_type">
                                            <option value=" "> -- Select Payment Type -- </option>
                                            @foreach($paymentTypes as $key => $value)
                                                <option value="{{ $value}}"> {{  $value }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('payment_type'))
                                            <small id="error" class="form-text text-muted text-danger">{{ $errors->first('payment_type') }}</small>
                                        @endif
                                    </div>
                                    <div class="form-group"  >
                                        <label for="amount">Course Description</label>
                                        <textarea type="text" id="editor" class="form-control" name="description" value="{{ old('description') }}"  placeholder="Enter Course Description"></textarea>
                                        @if($errors->has('description'))
                                            <small id="error" class="form-text text-muted text-danger">{{ $errors->first('description') }}</small>
                                        @endif
                                    </div>  
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="number" class="form-control" name="amount" value="{{ old('amount') }}" id="amount" placeholder="Enter Amount">
                                    @if($errors->has('amount'))
                                        <small id="error" class="form-text text-muted text-danger">{{ $errors->first('amount') }}</small>
                                    @endif
                                </div>  
                                <div class="form-group">
                                    <label for="amount">Discount Amount (in Percentage)</label>
                                    <input type="number" class="form-control" name="discount_amount_percentage" value="{{ old('discount_amount_percentage') }}" id="discount_amount" placeholder="Enter Discount Amount">
                                    @if($errors->has('discount_amount_percentage'))
                                        <small id="error" class="form-text text-muted text-danger">{{ $errors->first('discount_amount_percentage') }}</small>
                                    @endif
                                </div>  
                                <div class="form-group">
                                    <label for="amount">Course Time (in Days)</label>
                                    <input type="number" class="form-control" name="course_time" value="{{ old('course_time') }}" id="course_time" placeholder="Enter Course Time">
                                    @if($errors->has('course_time'))
                                        <small id="error" class="form-text text-muted text-danger">{{ $errors->first('course_time') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="amount">Course Images</label>
                                    <input type="file" class="form-control" name="course_images" value="{{ old('course_images') }}" id="course_images" placeholder="Enter Course Images">
                                    @if($errors->has('course_images'))
                                        <small id="error" class="form-text text-muted text-danger">{{ $errors->first('course_images') }}</small>
                                    @endif
                                </div>
                                    <button type="submit" class="btn  btn-primary float-right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/ckeditor.js') }}"></script>
@endsection
