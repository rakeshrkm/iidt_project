@extends('front.layouts.master', ['title' => 'Profile'])  
@section('contents')  
 <!-- Page Banner Start -->
 {{-- <div class="section page-banner-section" style="background-image: url({{ asset('front/assets/images/bg/banner-img.jpg') }});">
    <div class="container">
        <!-- Page Banner Wrapper Start -->
        <div class="page-banner-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Banner Content Start -->
                    <div class="page-banner text-center">
                        <h2 class="title">Profile</h2>
                        <ul class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ul>
                    </div>
                    <!-- Page Banner Content End -->
                </div>
            </div>
            </div>
        </div>
        <!-- Page Banner Wrapper End -->
    </div>
</div> --}}
<!-- Page Banner End -->

<!-- Contact Form Start -->
<div class="section contact-form-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 card">
                <div class=" p-3 text-center">
                    <img src="{{ asset('front/assets/images/profile.png')}}" >
                </div>
            </div>
            <div class="col-md-8">
                <div class="p-3 card">
                    <h2 class="">{{ $data->name }} </h2>
                    <p>{{!empty($data->RegisterUser->email) ? $data->RegisterUser->email : ''}} </p> 
                    <p>{{!empty($data->getCollege->name) ? $data->getCollege->name : ''}}</p> 
                    <p class="mt-2">{{!empty($$data->getCourse->course_name) ? $data->getCourse->course_name : ''}}</p>
                    <p class="mt-2">DOB : {{!empty($data->RegisterUser->dob) ? $data->RegisterUser->dob : ''}}</p>

                    <p class="mt-2">Mobile : {{!empty($data->RegisterUser->mobile) ? $data->RegisterUser->mobile : ''}}</p>
                    <p class="mt-2">Gender : {{!empty($data->RegisterUser->gender ) ? $data->RegisterUser->gender  : ''}}</p>
                </div>
            </div>
        </div>

      <div class="row mt-4">
        <div class="col-md-12">
            <nav>
                <div class="nav nav-tabs mb-3 row" id="nav-tab" role="tablist">
                    <button class="nav-link active col-md-6" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Edit Profile</button>
                    <button class="nav-link col-md-6" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#course" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Course</button>
                </div>
            </nav>
        </div>

            <div class="tab-content p-3 border bg-light" id="nav-tabContent">
                <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        @if(!empty($data->getCourse->course_name))
                            <div class="col-md-12"><strong>Course :</strong> {{ $data->getCourse->course_name }} </div>
                        @endif

                        <div class="col-md-4"><strong>Name :</strong> {{ $data->name }} </div>
                        <div class="col-md-4"><strong>Email :</strong> {{ $data->RegisterUser->email }} </div>
                        <div class="col-md-4"><strong>Mobile :</strong> {{ $data->RegisterUser->mobile }} </div>
                        <div class="col-md-4 mt-2"><strong>Dob :</strong> {{ $data->RegisterUser->dob }} </div>
                        <div class="col-md-4 mt-2"><strong>Gender :</strong> {{ $data->RegisterUser->gender }} </div>
                                            
                    </div>
                </div>
                <div class="tab-pane fade" id="course" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <p><strong>This is some placeholder content the Profile tab's associated content.</strong>
                        Clicking another tab will toggle the visibility of this one for the next.
                        The tab JavaScript swaps classes to control the content visibility and styling. You can use it with
                        tabs, pills, and any other <code>.nav</code>-powered navigation.</p>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection