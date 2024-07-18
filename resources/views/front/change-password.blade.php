@extends('front.layouts.master', ['title' => 'Contact'])  
@section('contents')  
 <!-- Page Banner Start -->
 <div class="section page-banner-section" style="background-image: url({{ asset('front/assets/images/bg/banner-img.jpg') }});">
    <div class="container">
        <!-- Page Banner Wrapper Start -->
        <div class="page-banner-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Banner Content Start -->
                    <div class="page-banner text-center">
                        <h2 class="title">Change Password</h2>
                        <ul class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                        </ul>
                    </div>
                    <!-- Page Banner Content End -->
                </div>
            </div>
            </div>
        </div>
        <!-- Page Banner Wrapper End -->
    </div>
</div>
<!-- Page Banner End -->

<!-- Contact Form Start -->
<div class="section contact-form-section section-padding">
    <div class="container">
        <!-- Contact Form Wrapper Start -->
        <div class="contact-form-wrapper mb-2">
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6">
                    <!-- Contact Form Start -->
                    <div class="contact-form card shadow">
                        <h4 class="title">Change Password</h4>
                        <form action="{{ route('student.savechangepassword') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
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
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input type="password" name="password" placeholder="Enter old Password">
                                        @error('password')
                                            <small class="text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Single Form End -->
                                </div>
                                <div class="col-sm-12">
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input type="password" name="new_password"  placeholder="Enter New Password">
                                        @error('new_password')
                                            <small class="text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Single Form End -->
                                </div>
                                <div class="col-sm-12">
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input type="password" name="password_confirm"  placeholder="Enter confirm password">
                                        @error('password_confirm')
                                            <small class="text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Single Form End -->
                                </div>
                             
                                <div class="col-sm-12">
                                    <!-- Single Form Start -->
                                    <div class="contact-btn">
                                        <button class="btn" type="submit">Submit</button>
                                    </div>
                                    <!-- Single Form End -->
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Form End -->
                </div>

                <div class="col-md-3">
                </div>
            </div>

        </div>
        <!-- Contact Form Wrapper End -->
    </div>
</div>
@endsection