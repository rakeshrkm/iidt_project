@extends('front.layouts.master', ['title' => 'Refund Policy'])  
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
                        <h2 class="title">Course Amount Refund Policy</h2>
                        <ul class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Refund Policy</li>
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
<div class="section mt-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <h1 class="mt-2 mb-2 ">Refund Policy</h1>
            <p>At the Indian Institute of Drone Technology, we strive to ensure that our students are fully satisfied with their courses. We understand that sometimes unforeseen circumstances may arise, and students may need to request a refund. Please review our refund policy below.</p>
        </div>
      </div>
    </div>
</div>

<div class="section mt-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <h3 class="mt-2 mb-2">Eligibility for Refunds</h3>
            <div class="p-4">
                <ol class="list-inline">
                    <li class="text-dark"><h4 class="mt-2 mb-2">Course Purchase</h4>
                        <ul class="course-benefits-list">
                            <li> <span class="icon"><i class="flaticon-check"></i> </span> Refunds are only applicable to students who have purchased courses directly from the Indian Institute of Drone Technology website.</li>
                            <li> <span class="icon"><i class="flaticon-check"></i> </span>Refund requests must be submitted within 15 days of the course purchase date.</li>
                        </ul>
                    </li>
                    <li class="text-dark"><h4 class="mt-2 mb-2">Course Completion</h4>
                        <ul>
                            <li><span class="icon"><i class="flaticon-check"></i> </span> Refunds will not be issued if a student has completed more than 25% of the course.</li>
                        </ul>
                    </li>
                </ol>
            </div>
        </div>
      </div>
    </div>
</div>

<div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <h3 class="mt-2 mb-2">Refund Process</h3>
            <div class="p-4">
                <ol class="lists">
                    <li class="text-dark"><h4 class="mt-2 mb-2">Request Submission</h4>
                        <ul>
                            <li><span class="icon"><i class="flaticon-check"></i> </span>To initiate a refund, students must submit a written request to our support team at support@iitdrone.com</li>
                            <li><span class="icon"><i class="flaticon-check"></i> </span>The request should include the student’s full name, course title, purchase date, and reason for the refund.</li>
                        </ul>
                    </li>
                    <li class="text-dark"><h4 class="mt-2 mb-2">Review and Approval</h4>
                        <ul>
                            <li><span class="icon"><i class="flaticon-check"></i> </span>Once a request is received, our team will review it and respond within 5-7 business days.</li>
                            <li><span class="icon"><i class="flaticon-check"></i> </span>Approval is at the discretion of the Indian Institute of Drone Technology, based on the outlined eligibility criteria.</li>
                        </ul>
                    </li>

                    <li class="text-dark"><h4 class="mt-2 mb-2">Refund Issuance</h4>
                        <ul>
                            <li><span class="icon"><i class="flaticon-check"></i> </span>Approved refunds will be processed within 10 business days of approval.</li>
                            <li><span class="icon"><i class="flaticon-check"></i> </span>Refunds will be issued to the original payment method. If the original method is unavailable, an alternate method will be arranged with the student.</li>
                        </ul>
                    </li>
                </ol>
            </div>
        </div>
      </div>
    </div>
</div>

<div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <h3 class="mt-2 mb-2"><h3>Non-Refundable Cases</h3>
            <div class="p-4">
                <ul>
                    <li><span class="icon"><i class="flaticon-check"></i> </span>Courses purchased as part of a bundle or at a discounted rate are non-refundable.</li>
                    <li><span class="icon"><i class="flaticon-check"></i> </span>In cases of misuse or violation of the institute’s policies, refund requests will be denied.</li>
                    <li><span class="icon"><i class="flaticon-check"></i> </span>Refunds will not be provided for personal dissatisfaction after substantial use of the course content.</li>
                </ul>
            </div>
        </div>
      </div>
    </div>
</div>

@endsection