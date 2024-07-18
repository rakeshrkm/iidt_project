@extends('front.layouts.master', ['title' => 'Indian Institute of Drone Technology'])  
@section('contents')  
  <!-- Hero Start -->
  <div class="hero-section section d-lg-flex align-items-lg-start justify-content-lg-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <!-- Hero Content Start -->
                <div class="hero-content">
                    <h2 class="title pt-4">Fly high with our Professional Courses in Drone Technology</h2>
                    {{-- <p>Start streaming on-demand video lectures today from top level instructors Attention heatmaps. </p> --}}
                    {{-- <div class="hero-form">
                        <form action="#">
                            <input type="text" placeholder="What do you want to learn?">
                            <button class="btn btn-hover-heading-color">Search</button>
                        </form>
                    </div> --}}
                    {{-- <div class="hero-info-list">
                        <ul>
                            <li>
                                <i class="flaticon-check"></i>
                                <span>Get Certified</span>
                            </li>
                            <li>
                                <i class="flaticon-check"></i>
                                <span>Gain Job-eady Skills</span>
                            </li>
                        </ul>
                    </div> --}}
                </div>
                <!-- Hero Content End -->
            </div>
        </div>
    </div>
    <!-- Hero Image Start -->
    <div class="hero-images">
        <div class="image">
            <img src="{{ asset('front/assets/images/iidt/hero-img.png') }}" alt="">
        </div>
        <div class="shape-1 parallaxed">
            <img src="{{ asset('front/assets/images/iidt/shape-1.png') }}" alt="">
        </div>
        <div class="shape-2 parallaxed">
            <img src="{{ asset('front/assets/images/iidt/shape-2.png') }}" alt="">
        </div>
        <!-- Hero Image End -->
    </div>

</div>
<!-- Hero End -->

<!-- Features Start -->
<div class="section features-section">
    <div class="container">
        <!-- Features Wrapper Start -->
        <div class="features-wrapper">
            <div class="row g-0">
                <div class="col-lg-4 col-md-4 features-col ">
                    <!-- Features Item Start -->
                    <div class="features-item text-center d-flex">
                        <div class="features-icon">
                            <img src="{{ asset('front/assets/images/features/f-icon-1.png') }}" alt="">
                        </div>
                        <div class="features-content">
                            <h3 class="title">Job Ready Skills</h3>
                            <p>With Industry Oriented Courses</p>
                        </div>
                    </div>
                    <!-- Features Item End -->
                </div>
                <div class="col-lg-4 col-md-4 features-col">
                    <!-- Features Item Start -->
                    <div class="features-item text-center">
                        <div class="features-icon">
                            <img src="{{ asset('front/assets/images/features/f-icon-2.png') }}" alt="">
                       
                        </div>
                       
                        <div class="features-content text-center">
                            <h3 class="title">Expert Trainers</h3>
                            <p>Experienced & Qualified</p>
                        </div>
                    </div>
                    <!-- Features Item End -->
                </div>
                <div class="col-lg-4 col-md-4 features-col">
                    <!-- Features Item Start -->
                    <div class="features-item text-center">
                        <div class="features-icon">
                            <img src="{{ asset('front/assets/images/features/f-icon-3.png') }}" alt="">
                        </div>
                        <div class="features-content">
                            <h3 class="title">Placement Assistance</h3>
                            <p>Join Hands with Industry Leaders</p>
                        </div>
                    </div>
                    <!-- Features Item End -->
                </div>
            </div>
        </div>
        <!-- Features Wrapper End -->
    </div>
</div>
<!-- Features End -->

<!-- Courses Start -->
<div class="section section-padding">
    <div class="container">
        <!-- Section Title Start -->
        <div class="section-title text-center">
            <h2 class="title">Course For every Drone Enthusiast</h2>
        </div>
        <!-- Section Title End -->

        <!-- Courses Wrapper Start -->
        <div class="courses-wrapper">
            <div class="row">
                @foreach($data['course'] as $key => $value)
                @php             
                    $id = Crypt::encrypt($value->id);
                @endphp
              
                <div class="col-lg-3 col-sm-6">
                    <!-- Single Courses Start -->
                    <div class="single-course">
                        <!-- Courses Image Start -->
                        <div class="courses-image">
                            <a href="{{ url('course-detail/'. $id) }}"><img src="{{ asset('uploads/course-images/'.$value->course_images) }}" alt="Courses"></a>
                            {{-- <div class="top-meta">
                                <div class="categories">
                                    <a class="tag color-1" href="#">Business</a>
                                </div>
                                <div class="wishlist">
                                    <a href="#"><i class="far fa-bookmark"></i></a>
                                </div>
                            </div> --}}
                        </div>
                        <!-- Courses Image End -->
                        <!-- Courses Content Start -->
                        <div class="courses-content">
                            {{-- <div class="courses-author">
                                <img src="{{ asset('front/assets/images/courses/author-1.jpg') }}" alt="author">
                                <h4 class="name"><a href="#">Mick Harris</a></h4>
                            </div> --}}

                           
                            <h3 class="title"><a href="{{ url('course-detail/'. $id) }}">{{ $value->course_name }} </a></h3>
                        </div>
                        <!-- Courses Content End -->
                        <!-- Courses Meta Start -->
                        <div class="courses-meta">
                            <div class="course-enroll-rating d-flex">
                                <p><i class="flaticon-user"></i> 120</p>
                                {{-- <p><i class="flaticon-star-1"></i> 1</p> --}}
                            </div>
                            <div class="price">
                                @if( $value->amount == 0.00 && $value->actual_amount == '')
                                    {{-- <span class="text-danger">Coming soon</span> --}}
                                    <a class="btn join-btn" href="{{ route('student.registration') }}" target="_blank">Register Now</a>

                                @else
                                <span>INR <del class="text-danger">{{ $value->amount}}</del></span><br>
                                <span>INR {{ round($value->actual_amount)}}</span>

                                @endif
                            </div>
                        </div>
                        <!-- Courses Meta End -->

                    </div>
                    <!-- Single Courses End -->
                </div>
                @endforeach
                
                
            </div>

        </div>
        <!-- Courses Wrapper End -->
        <!-- View Courses Start-->
        <div class="view-all-courses">
            <div class="view-courses-content">
                <img src="{{ asset('front/assets/images/courses/view-img.png') }}" alt="courses">
                <h3 class="title">Learn specializations from top Courses</h3>
            </div>
            <a class="btn" href="{{ route('courses') }}">View All Courses</a>
        </div>
        <!-- View Courses End -->
    </div>
</div>
<!-- Courses End -->

<!-- Expert Track Start -->
{{-- <div class="section expert-track-section" style="background-image: url({{ asset('front/assets/images/bg/explore-img.jpg')}});">
    <div class="container">
        <!-- Expert Track Wrapper Start -->
        <div class="expert-track-wrapper">
            <div class="row">
                <div class="col-xl-6 col-lg-12">
                    <!-- Expert Track Content Start -->
                    <div class="expert-track-content">
                        <h3 class="sub-title">Introducing ExpertTracks</h3>
                        <h2 class="title">Flexible monthly Career-changing courses and 7-day free trial</h2>
                        <a class="btn" href="#">Explore Courses</a>
                    </div>
                    <!-- Expert Track Content End -->
                </div>
                <div class="col-xl-6  col-lg-12">
                    <!-- Expert Track Content Start -->
                    <div class="expert-track-content sign-up-content">
                        <h3 class="sub-title">Introducing ExpertTracks</h3>
                        <h2 class="title">Get 30% off limitless short courses and certificates for an entire year</h2>
                        <a class="btn" href="#">Sign Up Now</a>
                    </div>
                    <!-- Expert Track Content End -->
                </div>
            </div>
        </div>
        <!-- Expert Track Wrapper End -->
    </div>
</div> --}}
<!-- Expert Track Start -->

<!-- Global Learner Start -->
{{-- <div class="section global-learner-section section-padding-02">
    <div class="container">
        <!-- Global Learner Wrapper Start -->
        <div class="global-learner-wrapper">
            <!-- Global Learner Content Start -->
            <div class="global-learner-content">
                <h2 class="title">Learn from global experts and get certified by the world's leading </h2>
            </div>
            <!-- Global Learner Content End -->
            <!-- Global Learner Content Start -->
            <div class="learner-courses-content">
                <div class="single-item learner">
                    <h3 class="number">4,50303</h3>
                    <span>Learners</span>
                </div>
                <div class="single-item courses">
                    <h3 class="number">7,50345</h3>
                    <span>Courses</span>
                </div>
            </div>
            <!-- Global Learner Content End -->
        </div>
        <!-- Global Learner Wrapper End -->
    </div>
</div> --}}
<!-- Global Learner End -->


<!-- Access Courses Start -->
<div class="section access-course-section">
    <div class="container">
        <!-- Access Courses Wrapper Start -->
        <div class="access-course-wrapper">
            <div class="row">
                <div class="col-xl-6">
                    <!-- Access Courses Image Start -->
                    <div class="access-course-img text-center">
                        <img src="{{ asset('front/assets/images/iidt/access-img-logo.png') }}" alt="">
                           <a class="btn" href="{{route('student.registration')}}">Register Now</a>
                    </div>
                    <!-- Access Courses Image End -->
                </div>
                <div class="col-xl-6">
                    <!-- Access Courses Content Start -->
                    <div class="access-course-content">
                        <h2 class="title">Indian Institute of Drone Technology (IIDT)</h2>
                        <p>IIDT has proudly established with a very thoughtful vision of equipping country’s youth on Drone Technology and wish to Export the Quality Drone Experts to the world same as our Software Engineers across world. IIDT is the only Institute in India with world’s largest Drone Facility as follows:-</p>

                        <ol>
                            <li><span class="icon"><i class="flaticon-check"></i> </span> <span class="text">World’s biggest Runway for Drones with International standard for fixed wing Drones.</span> </li>
                            <li><span class="icon"><i class="flaticon-check"></i> </span> <span class="text">Two big Flying Zones for VTOL Drones.</span> </li>
                            <li><span class="icon"><i class="flaticon-check"></i> </span> <span class="text">India’s Biggest “Centre of Excellence”.</span> </li>
                            <li><span class="icon"><i class="flaticon-check"></i> </span> <span class="text">Fully Equipped Lab for Drones.</span> </li>
                            <li><span class="icon"><i class="flaticon-check"></i> </span> <span class="text">Research & Development. </span> </li>
                            <li><span class="icon"><i class="flaticon-check"></i> </span> <span class="text">State-of-the-Art Drone Technologies & Innovation Centre</span> </li>
                            <li><span class="icon"><i class="flaticon-check"></i> </span> <span class="text">World’s first Integrated Control & Command Centre for Drones (ICCC-D).</span> </li>
                            <li><span class="icon"><i class="flaticon-check"></i> </span> <span class="text">Fully indigenous Live Streaming Software.</span> </li>
                            <li><span class="icon"><i class="flaticon-check"></i> </span> <span class="text">Fully indigenous AI based Video Analytics Software.</span> </li>
                            <li><span class="icon"><i class="flaticon-check"></i> </span> <span class="text">Complete Training Infrastructure on Simulation Environment.</span> </li>
                            <li><span class="icon"><i class="flaticon-check"></i> </span> <span class="text">Freedom of experimenting things on Drones to the students.</span> </li>
                        </ol>
                    </div>
                    <!-- Access Courses Content End -->
                </div>
            </div>
        </div>
        <!-- Access Courses Wrapper End -->
    </div>
</div>
<!-- Access Courses End -->

<!-- Features Category Start -->
{{-- <div class="section features-category-section section-padding">
    <div class="container">
        <!-- Features Category Wrapper Start -->
        <div class="features-category-wrapper">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <!-- Features Category Item Start -->
                    <div class="features-category-item">
                        <div class="features-category-icon">
                            <img src="{{ asset('front/assets/images/features-cate/f-cate-1.png') }}" alt="">
                        </div>
                        <div class="features-category-content">
                            <h3 class="title"><a href="#">Development</a></h3>
                            <ul class="features-cate-list">
                                <li><a href="#">JavaScript</a></li>
                                <li><a href="#">Web Development</a></li>
                                <li><a href="#">Apps Development</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Features Category Item End -->
                </div>
                <div class="col-lg-4 col-md-4">
                    <!-- Features Category Item Start -->
                    <div class="features-category-item">
                        <div class="features-category-icon">
                            <img src="{{ asset('front/assets/images/features-cate/f-cate-2.png') }}" alt="">
                        </div>
                        <div class="features-category-content">
                            <h3 class="title"><a href="#">Technology</a></h3>
                            <ul class="features-cate-list">
                                <li><a href="#">Python </a></li>
                                <li><a href="#">Network Security</a></li>
                                <li><a href="#">Machine Learning</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Features Category Item End -->
                </div>
                <div class="col-lg-4 col-md-4">
                    <!-- Features Category Item Start -->
                    <div class="features-category-item">
                        <div class="features-category-icon">
                            <img src="{{ asset('front/assets/images/features-cate/f-cate-3.png') }}" alt="">
                        </div>
                        <div class="features-category-content">
                            <h3 class="title"><a href="#">Health</a></h3>
                            <ul class="features-cate-list">
                                <li><a href="#">Psychology</a></li>
                                <li><a href="#">Animal Health</a></li>
                                <li><a href="#">Health Informatics</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Features Category Item End -->
                </div>
            </div>
        </div>
        <!-- Features Category Wrapper End -->
    </div>
</div> --}}
<!-- Features Category End -->

<!-- Testimonial Start -->
<div class="section testimonial-section section-padding" id="testimonial">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="title">We have 1000+ students & they share <br> success stories</h2>
        </div>
        <!-- Testimonial Wrapper Start -->
        <div class="testimonial-wrapper swiper-container testimonial-active">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <!-- Single Testimonial Start -->
                    <div class="single-testimonial">
                        <div class="testimonial-img">
                            <img src="{{ asset('front/assets/images/iidt/1.jpg') }}" alt="">
                        </div>
                        <div class="testimonial-content color-1">
                            <p> I found the training to be exceptionally well-structured and informative. I particularly enjoyed the hands-on approach to
                                learning.</p>
                            <div class="testimonial-bottom">
                                <div class="name-degree">
                                    <span class="name">Aditi</span>
                                    {{-- <span class="degree">Student Biology</span> --}}
                                </div>
                                <span><i class="flaticon-straight-quotes"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- Single Testimonial End -->
                </div>
                <div class="swiper-slide">
                    <!-- Single Testimonial Start -->
                    <div class="single-testimonial">
                        <div class="testimonial-img">
                            <img src="{{ asset('front/assets/images/iidt/2.jpg') }}" alt="">
                        </div>
                        <div class="testimonial-content color-2">
                            <p>I earned a certificate in drone assembly and operation. In January, I am working as a drone technician at a company in Noida.</p>
                            <div class="testimonial-bottom">
                                <div class="name-degree">
                                    <span class="name">Jaikant Namdeo</span>
                                    {{-- <span class="degree">Student Math</span> --}}
                                </div>
                                <span><i class="flaticon-straight-quotes"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- Single Testimonial End -->
                </div>
                 <div class="swiper-slide">
                    <!-- Single Testimonial Start -->
                    <div class="single-testimonial">
                        <div class="testimonial-img">
                            <img src="{{ asset('front/assets/images/iidt/shifapraveen.jpeg') }}" alt="">
                        </div>
                        <div class="testimonial-content color-2">
                            <p>I have learned that drone technology have wide range of application mapping, surveillance and many more.</p>
                            <div class="testimonial-bottom">
                                <div class="name-degree">
                                    <span class="name">Shifa Parveen</span>
                                    {{-- <span class="degree">Student Math</span> --}}
                                </div>
                                <span><i class="flaticon-straight-quotes"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- Single Testimonial End -->
                </div>
                
                <div class="swiper-slide">
                    <!-- Single Testimonial Start -->
                    <div class="single-testimonial">
                        <div class="testimonial-img">
                            <img src="{{ asset('front/assets/images/iidt/3.jpg') }}" alt="">
                        </div>
                        <div class="testimonial-content color-3">
                            <p>I recently done the drone training program.It was an great experience, instructors were knowledgeable and supportive</p>
                            <div class="testimonial-bottom">
                                <div class="name-degree">
                                    <span class="name">Prince Shukla</span>
                                    {{-- <span class="degree">Student Physics</span> --}}
                                </div>
                                <span><i class="flaticon-straight-quotes"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- Single Testimonial End -->
                </div>
                <div class="swiper-slide">
                    <!-- Single Testimonial Start -->
                    <div class="single-testimonial">
                        <div class="testimonial-img">
                            <img src="{{ asset('front/assets/images/iidt/4.jpg') }}" alt="">
                        </div>
                        <div class="testimonial-content color-4">
                            <p>I learned drone assembling and drone pilot skill, the benefit of which I am getting in the form of a good salary.</p>
                            <div class="testimonial-bottom">
                                <div class="name-degree">
                                    <span class="name">Sachin Kushwaha</span>
                                    {{-- <span class="degree">Student History </span> --}}
                                </div>
                                <span><i class="flaticon-straight-quotes"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- Single Testimonial End -->
                </div>
                
                <div class="swiper-slide">
                    <!-- Single Testimonial Start -->
                    <div class="single-testimonial">
                        <div class="testimonial-img">
                            <img src="{{ asset('front/assets/images/iidt/vipul-maurya.jpeg') }}" alt="">
                        </div>
                        <div class="testimonial-content color-4">
                            <p>I have learned a lot about drone programming and hardware.These skills have opened up new job opportunities.</p>
                            <div class="testimonial-bottom">
                                <div class="name-degree">
                                    <span class="name">Vipul Maurya</span>
                                    {{-- <span class="degree">Student History </span> --}}
                                </div>
                                <span><i class="flaticon-straight-quotes"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- Single Testimonial End -->
                </div>
                <div class="swiper-slide">
                    <!-- Single Testimonial Start -->
                    <div class="single-testimonial">
                        <div class="testimonial-img">
                            <img src="{{ asset('front/assets/images/iidt/suryakant-tiwari.jpeg') }}" alt="">
                        </div>
                        <div class="testimonial-content color-4">
                            <p>This training has opened new job opportunities for me in areas like aerial photography and surveying.</p>
                            <div class="testimonial-bottom">
                                <div class="name-degree">
                                    <span class="name">Suriyakant Tiwari</span>
                                    {{-- <span class="degree">Student History </span> --}}
                                </div>
                                <span><i class="flaticon-straight-quotes"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- Single Testimonial End -->
                </div>

            </div>
            <!-- Add Pagination -->
            <div class="testimonial-arrow swiper-button-next"></div>
            <div class="testimonial-arrow swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
        <!-- Testimonial Wrapper End -->
    </div>
</div>
<!-- Testimonial End -->

<!-- Instructor Start -->
{{-- <div class="section instructor-section section-padding" style="background-image: url({{ asset('front/assets/images/bg/instructor-bg.jpg') }});">
    <div class="container">
        <!-- Instructor Wrapper Start -->
        <div class="instructor-wrapper">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7">
                    <!-- Instructor Content Start -->
                    <div class="instructor-content">
                        <h2 class="title">Become an Instructor</h2>
                        <p>Top instructors from around the world teach millions of students on Gostudy. We provide the tools and skills to teach what you love.</p>
                        <a class="btn" href="#">Start Teaching Today</a>
                    </div>
                    <!-- Instructor Content End -->
                </div>
                <div class="col-lg-6 col-md-5">
                    <!-- Instructor Play Button Start -->
                    <div class="instructor-play text-center">
                        <a class="popup-video" href="https://www.youtube-nocookie.com/embed/Ga6RYejo6Hk"><i class="fas fa-play"></i></a>
                    </div>
                    <!-- Instructor Play Button End -->
                </div>
            </div>
        </div>
        <!-- Instructor Wrapper End -->
    </div>
</div> --}}
<!-- Instructor End -->

<!-- Blog Start -->
{{-- <div class="section blog-section section-padding">
    <div class="container">
        <div class="blog-wrapper">
            <!-- Section Title Start -->
            <div class="section-title text-center">
                <h2 class="title">Popular Articles & what going on</h2>
            </div>
            <!-- Section Title End -->
            <!-- Blog Wrapper Start -->
            <div class="blog-content-wrapper">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <!-- Single Blog Start -->
                        <div class="single-blog">
                            <!-- Blog Image Start -->
                            <div class="blog-image">
                                <a href="#"><img src="{{ asset('front/assets/images/blog/blog-1.jpg') }}" alt="blog"></a>
                            </div>
                            <!-- Blog Image End -->
                            <!-- Blog Content Start -->
                            <div class="blog-content">
                                <div class="blog-author-category">
                                    <a class="category color-1" href="#">Health</a>
                                    <div class="blog-author">
                                        <img src="{{ asset('front/assets/images/courses/author-1.jpg') }}" alt="author">
                                        <h4 class="name"><a href="#">Mick Harris</a></h4>
                                    </div>
                                </div>
                                <h3 class="title"><a href="#">Educational technology and mobile learning</a></h3>
                                <a class="read-more" href="#">Read More</a>
                            </div>
                            <!-- Blog Content End -->
                        </div>
                        <!-- Single Blog End -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <!-- Single Blog Start -->
                        <div class="single-blog">
                            <!-- Blog Image Start -->
                            <div class="blog-image">
                                <a href="#"><img src="{{ asset('front/assets/images/blog/blog-2.jpg') }}" alt="blog"></a>
                            </div>
                            <!-- Blog Image End -->
                            <!-- Blog Content Start -->
                            <div class="blog-content">
                                <div class="blog-author-category">
                                    <a class="category color-2" href="#">Health</a>
                                    <div class="blog-author">
                                        <img src="{{ asset('front/assets/images/courses/author-1.jpg') }}" alt="author">
                                        <h4 class="name"><a href="#">Mick Harris</a></h4>
                                    </div>
                                </div>
                                <h3 class="title"><a href="#">We are changing the way the world learns</a></h3>
                                <a class="read-more" href="#">Read More</a>
                            </div>
                            <!-- Blog Content End -->
                        </div>
                        <!-- Single Blog End -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <!-- Single Blog Start -->
                        <div class="single-blog">
                            <!-- Blog Image Start -->
                            <div class="blog-image">
                                <a href="#"><img src="{{ asset('front/assets/images/blog/blog-3.jpg') }}" alt="blog"></a>
                            </div>
                            <!-- Blog Image End -->
                            <!-- Blog Content Start -->
                            <div class="blog-content">
                                <div class="blog-author-category">
                                    <a class="category color-3" href="#">Health</a>
                                    <div class="blog-author">
                                        <img src="{{ asset('front/assets/images/courses/author-1.jpg') }}" alt="author">
                                        <h4 class="name"><a href="#">Mick Harris</a></h4>
                                    </div>
                                </div>
                                <h3 class="title"><a href="#">Guide to visas and funding to study in the UK</a></h3>
                                <a class="read-more" href="#">Read More</a>
                            </div>
                            <!-- Blog Content End -->
                        </div>
                        <!-- Single Blog End -->
                    </div>
                </div>
            </div>
            <!-- Blog Wrapper End -->
        </div>

    </div>
</div> --}}
<!-- Blog End -->

<!-- Brand Logo End -->
<div class="section Brand-section">
    <div class="container">
        <!-- Brand Wrapper End -->
        <div class="brand-wrapper section-padding text-center">
            <h3 class="brand-title">Partnering with leading <span> Universities</span> </h3>

            <div class="brand-active">


                <div class="testimonial-wrapper swiper-container testimonial-active">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <!-- Single Testimonial Start -->
                            <div class="single-testimonial">
                                <div class="testimonial-content color-1">
                                    <img src="{{ asset('front/assets/images/iidt/university/bansal_university.jpg') }}" alt="Brand">
                                </div>
                            </div>
                            <!-- Single Testimonial End -->
                        </div>
                        <div class="swiper-slide">
                            <!-- Single Testimonial Start -->
                            <div class="single-testimonial">
                                <div class="testimonial-content color-1">
                                    <img src="{{ asset('front/assets/images/iidt/university/MAIT_University.jpg') }}" alt="Brand">
                                </div>
                            </div>
                            <!-- Single Testimonial End -->
                        </div>
                        <div class="swiper-slide">
                            <!-- Single Testimonial Start -->
                            <div class="single-testimonial">
                                <div class="testimonial-content color-1">
                                    <img src="{{ asset('front/assets/images/iidt/university/prestige_university.jpg') }}" alt="Brand">
                                </div>
                            </div>
                            <!-- Single Testimonial End -->
                        </div>
                        <div class="swiper-slide">
                            <!-- Single Testimonial Start -->
                            <div class="single-testimonial">
                                <div class="testimonial-content color-1">
                                    <img src="{{ asset('front/assets/images/iidt/university/St_Wilfred.jpg') }}" alt="Brand">
                                </div>
                            </div>
                            <!-- Single Testimonial End -->
                        </div>
                       
        
                    </div>
                    <!-- Add Pagination -->
                    <div class="testimonial-arrow swiper-button-next"></div>
                    <div class="testimonial-arrow swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        <!-- Brand Wrapper End -->
    </div>
</div>
<!-- Brand Logo End -->

<!-- Call to Action Start -->
{{-- <div class="section call-to-action-section">
    <div class="container">
        <!-- Call to Action Wrapper Start -->
        <div class="call-to-action-wrapper">

            <!-- Call to Action Image Start -->
            <div class="call-to-action-image">
                <div class="image">
                    <img src="{{ asset('front/assets/images/cta-img.png') }}" alt="">
                </div>
            </div>
            <!-- Call to Action Image End -->

            <!-- Call to Action Content Start -->
            <div class="call-to-action-content">
                <h2 class="title">Start today and get certified in Fundamentals of digital marketing </h2>
                <a class="btn" href="#">Register Now</a>
            </div>
            <!-- Call to Action Content End -->

        </div>
        <!-- Call to Action Wrapper End -->
    </div>
</div> --}}
<!-- Call to Action End -->
@endsection