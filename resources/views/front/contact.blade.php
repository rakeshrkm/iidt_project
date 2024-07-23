@extends('front.layouts.master', ['title' => 'Contact'])  
@section('contents')  
 <!-- Page Banner Start -->
 <div class="section page-banner-section" style="background-image: url({{ asset('front/assets/images/contact-us.png') }});background-size:cover;">
    <div class="container">
        <!-- Page Banner Wrapper Start -->
        <div class="page-banner-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Banner Content Start -->
                    <div class="page-banner text-center">
                        {{-- <h2 class="title">Contact</h2> --}}
                        <ul class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                            <li class="breadcrumb-item  text-white active" aria-current="page">Contact</li>
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
<div class="section contact-form-section section-padding-02">
    <div class="container">
        <!-- Contact Form Wrapper Start -->
        <div class="contact-form-wrapper">
            <div class="row">
                <div class="col-lg-7">
                    <div class="contact-map shadow">
                        
                        <iframe scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3679682.636533144!2d74.18607515763505!3d25.756023963427136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397ccf84276e47b5%3A0x59df6322323a3960!2sPrakhar%20Aviation%20Flying%20Zone!5e0!3m2!1sen!2sin!4v1720698143399!5m2!1sen!2sin" title="Prakhar Aviation Flying Zone" aria-label="Prakhar Aviation Flying Zone" frameborder="0"></iframe>
                    </div>
                </div>
                <div class="col-lg-5">
                    <!-- Contact Form Start -->
                    <div class="contact-form card shadow">
                        <h4 class="title">Contact Us</h4>
                        <form action="{{ route('savecontactus') }}" method="post">
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
                                        <input type="text" name="name" placeholder="Your Name">
                                        @error('name')
                                            <small class="text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Single Form End -->
                                </div>
                                <div class="col-sm-12">
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input type="email" name="email"  placeholder="Your Email">
                                        @error('email')
                                            <small class="text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Single Form End -->
                                </div>
                                <div class="col-sm-12">
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input type="text" name="mobile" maxlength="10" placeholder="Phone">
                                        @error('mobile')
                                            <small class="text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Single Form End -->
                                </div>
                                <div class="col-sm-12">
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <textarea name="message" placeholder="Message..."></textarea>
                                        @error('message')
                                            <small class="text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Single Form End -->
                                </div>
                                <div class="col-sm-12">
                                    <!-- Single Form Start -->
                                    <div class="contact-btn">
                                        <button class="btn" type="submit">Submit Message</button>
                                    </div>
                                    <!-- Single Form End -->
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Form End -->
                </div>
            </div>

        </div>
        <!-- Contact Form Wrapper End -->
    </div>
</div>
<!-- Contact Form End -->
<!-- Contact Info Start -->
<div class="section contact-info-section section-padding">
    <div class="container">
        <!-- Contact Info Wrapper Start -->
        <div class="contact-info-wrapper">
            <!-- Section Title Start -->
            <div class="contact-info-title text-center">
                <h2 class="title">Contact our support team to know what you want</h2>
            </div>
            <!-- Section Title End -->
            <!-- Contact Info Item Wrapper Start -->
            <div class="contact-info-item-wrapper">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <!-- Contact Info Item Start -->
                        <div class="contact-info-item contact-info-1 text-center">
                            <div class="contact-info-icon">
                                <i class="fas fa-phone-volume"></i>
                            </div>
                            <div class="contact-info-text">
                                <h4 class="title">Our Official Number</h4>
                                <p>+ 91 8826660307</p>
                            </div>
                        </div>
                        <!-- Contact Info Item End -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <!-- Contact Info Item Start -->
                        <div class="contact-info-item contact-info-2 text-center">
                            <div class="contact-info-icon">
                                <i class="flaticon-email"></i>
                            </div>
                            <div class="contact-info-text">
                                <h4 class="title">Email Address</h4>
                                <p>idea@iitdrone.com</p>
                            </div>
                        </div>
                        <!-- Contact Info Item End -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <!-- Contact Info Item Start -->
                        <div class="contact-info-item contact-info-3 text-center">
                            <div class="contact-info-icon">
                                <i class="flaticon-location-pin"></i>
                            </div>
                            <div class="contact-info-text">
                                <h4 class="title">Our Location</h4>
                                <p>Prakhar Aviation Flying Zone, Vill - Darkheda, Tehsil - Jawar</p>
                                <p>Dist - Sehore, Indore-Bhopal Highway, Madhya Pradesh - 466211</p>
                            </div>
                        </div>
                        <!-- Contact Info Item End -->
                    </div>
                </div>
            </div>
            <!-- Contact Info Item Wrapper End -->
        </div>
        <!-- Contact Info Wrapper End -->
    </div>
</div>
<!-- Contact Info End -->
<!-- Call to Action Start -->
{{-- <div class="section call-to-action-2-section">
    <div class="container-fluid g-0">
        <!-- Call to Action Wrapper Start -->
        <div class="call-to-action-2-wrapper">
            <!-- Call to Action Image Start-->
            <div class="call-to-action-2-img" style="background-image: url({{ asset('front/assets/images/digital-1.jpg') }});">

            </div>
            <!-- Call to Action Image End -->
            <!-- Call to Action Content Start -->
            <div class="call-to-action-2-content" style="background-image: url({{ asset('front/assets/images/digital-bg.jpg') }});">
                <h2 class="title">Start today and get certified in Fundamentals of digital marketing</h2>
                <a class="btn" href="#">Start Course </a>
            </div>
            <!-- Call to Action Content End -->
        </div>
        <!-- Call to Action Wrapper End -->
    </div>
</div> --}}
<!-- Call to Action End -->
@endsection