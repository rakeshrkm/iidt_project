@extends('admin.layouts.master')
@section('title', 'Edit Coupon')
@section('content')
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Offer </h5>
                        </div>
                        <ul class="breadcrumb">
                            {{ Breadcrumbs::render('offer_Edit') }}
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
                                <form method="post" action="{{ route('offers.update',$offer->id ) }}">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="course_name">Offer Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $offer->name }}" id="name" placeholder="Enter Offer Name">
                                        @if($errors->has('name'))
                                            <small id="error" class="form-text text-muted text-danger">{{ $errors->first('name') }}</small>
                                        @endif
                                    </div>
                            </div>
                           
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Course</label>
                                        <select class="form-control" id="course_id" name="course_id">
                                            <option value=" "> -- Select Payment Type -- </option>
                                            @foreach($courses as $key => $value)
                                                <option value="{{ $value->id}}" {{ $value->id == $offer->course_id ? 'selected' : ''}}> {{  ucfirst($value->course_name) }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('course_id'))
                                            <small id="error" class="form-text text-muted text-danger">{{ $errors->first('course_id') }}</small>
                                        @endif
                                    </div>
                                </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">From Date</label>
                                    <input type="date" class="form-control" name="from_date" value="{{ $offer->from_date }}" id="from_date" placeholder="Enter from date">
                                    @if($errors->has('from_date'))
                                        <small id="error" class="form-text text-muted text-danger">{{ $errors->first('from_date') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">To Date</label>
                                    <input type="date" class="form-control" name="to_date" value="{{ $offer->to_date }}" id="to_date" placeholder="Enter to date">
                                    @if($errors->has('to_date'))
                                        <small id="error" class="form-text text-muted text-danger">{{ $errors->first('to_date') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Offer Amount (in %)</label>
                                    <input type="number" class="form-control" name="offer_percentage" value="{{ $offer->offer_percentage }}" id="offer_percentage" placeholder="Enter offer percentage">
                                    @if($errors->has('offer_percentage'))
                                        <small id="error" class="form-text text-muted text-danger">{{ $errors->first('offer_percentage') }}</small>
                                    @endif
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
@endsection
