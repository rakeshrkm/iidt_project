@extends('admin.layouts.master')
@section('title', 'Students Credentials')
@section('content')
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Students</h5>
                        </div>
                        <ul class="breadcrumb">
                            {{ Breadcrumbs::render('registers_view') }}
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
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Students Details -  {{$data->name}}</h5>
                            </div>
                            <div class="col-md-6">
                                <h5>  Pursuing Course Name : {{$data->current_course}}</h5>
                            </div>
                    </div>
                    <div class="card-body mt-4">
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <form action="{{route('registers.savecreadentials')}}" method="post">
                            @csrf
                            <input type="hidden" class="form-control" name="id"  value="{{$data->id}}" />

                        <div class="row">
                          
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{$data->name}}" name="name" readonly />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{$data->email}}" name="email" readonly/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Enter Password"/>
                                    @error('password')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control confirm_password" name="password_confirmation" placeholder="Confirm Password"/>
                                        @error('password_confirmation')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
