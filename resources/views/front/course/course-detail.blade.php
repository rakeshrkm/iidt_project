@extends('front.layouts.master', ['title' => 'Course Details'])  
@section('contents')  
  <!-- Page Banner Start -->
  <div class="section course-single-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Page Breadcrumb Start -->
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Course Details</li>
                </ul>
                <!-- Page Breadcrumb End -->
            </div>
        </div>
    </div>
</div>
<!-- Single Course Banner Start -->
<div class="section single-course-banner-section" style="background-image: url({{ asset('front/assets/images/bg/banner-2.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Single Course Content Start -->
                <div class="single-course-banner-content">
                    <div class="course-top-meta">
                        {{-- <ul class="course-rating">
                            <li class="rating-full"><i class="fas fa-star"></i></li>
                            <li class="rating-full"><i class="fas fa-star"></i></li>
                            <li class="rating-full"><i class="fas fa-star"></i></li>
                            <li class="rating-full"><i class="fas fa-star"></i></li>
                            <li class="rating-line"><i class="far fa-star"></i></li>
                        </ul> --}}
                        {{-- <span class="rating-count">4.67 <span>(3)</span></span> --}}
                    </div>
                    <h3 class="title">{{ ucwords($data->course_name) }}</h3>
                    <p>{{ $data->short_description }}</p>
                    {{-- <div class="single-course-author-meta">
                        <div class="single-course-author">
                            <div class="author-avatar">
                                <a href="#"><img src="{{ asset('front/assets/images/blog/author-1.jpg') }}" alt=""></a>
                            </div>
                            <div class="author-content">
                                <span>Instructor</span>
                                <span class="name"><a href="#">Kevin Perry</a></span>
                            </div>
                        </div>
                        <div class="single-course-update">
                            <span>Updated</span>
                            <span class="date">September 27, 2021</span>
                        </div>
                    </div> --}}
                </div>
                <!-- Single Course Content End -->
            </div>
        </div>
    </div>
</div>
<!-- Single Course Banner End -->

<!-- Single Course Start -->
<div class="section single-course-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Single Course Wrapper Start -->
                <div class="single-course-wrapper">
                    <!-- Single Course Description Start -->
                    <div class="single-course-description">
                        <h4 class="title">Description</h4>
                        {!! $data->description !!}
                    </div>
                    <!-- Single Course Description End -->
                    <!-- Single Course Benefits Start -->
                    <div class="single-course-benefits-wrap">
                        <h4 class="title">Components of Training</h4>
                        @foreach($learning_points as $key => $value)
                            {!!$value->learning_point!!}
                            @endforeach
                        {{-- <ul class="course-benefits-list">
                            
                        </ul> --}}
                    </div>
                    <!-- Single Course Benefits End -->
                    <!-- Single Course Topics Start -->
                    <div class="single-course-topics-wrap">
                        <div class="topics-header-wrap">
                            <div class="topics-title">
                                <h4 class="title">Topics for this course</h4>
                            </div>
                            <div class="topics-top-meta">
                                <span>{{ $course_topics->count()}} Topics</span>
                                <span>{{ $data->course_time }} Days</span>
                            </div>
                        </div>
                        <!-- Single Course Topics Accordion Start -->
                        <div class="topics-accordion">
                            <div class="accordion" id="accordionExample">
                                <!-- Single Course Topics Accordion Item Start -->
                                <div class="accordion-item">
                                  
                                        @foreach($course_topics as $key => $value)

                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" aria-expanded="true" aria-controls="collapseOne">
                                                    {!! $value->topics !!} 
                                                </button>
                                            </h2>
                                        @endforeach
                                      
                                  

                                    
                                    {{-- <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="course-lessons">
                                                <div class="course-lessons-item">
                                                    <h5 class="title"><i class="flaticon-play-button"></i> <a href="#">Flat Bread Yeast</a></h5>
                                                    <span class="duration">5:32</span>
                                                </div>
                                                <div class="course-lessons-item">
                                                    <h5 class="title"><i class="flaticon-play-button"></i> <a href="#">Wool Roll Bread</a></h5>
                                                    <span class="duration">9:50</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <!-- Single Course Topics Accordion Item End -->
                                <!-- Single Course Topics Accordion Item Start -->
                                <div class="accordion-item">
                                    {{-- <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Drink Recipe <span class="information-icon">?</span>
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="course-lessons">
                                                <div class="course-lessons-item">
                                                    <h5 class="title"><i class="flaticon-play-button"></i> <a href="#">Orange Mojito</a></h5>
                                                    <span class="duration">7:13</span>
                                                </div>
                                                <div class="course-lessons-item">
                                                    <h5 class="title"><i class="flaticon-play-button"></i> <a href="#">Lemonade Using Real Lemons</a></h5>
                                                    <span class="duration">3:22</span>
                                                </div>
                                                <div class="course-lessons-item">
                                                    <h5 class="title"><i class="flaticon-play-button"></i> <a href="#">Ginger Pineapple Drink</a></h5>
                                                    <span class="duration">9:12</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    
                                </div>
                                <!-- Single Course Topics Accordion Item End -->
                                <!-- Single Course Topics Accordion Item Start -->
                                {{-- <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Pizza Recipe <span class="information-icon">?</span>
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="course-lessons">
                                                <div class="course-lessons-item">
                                                    <h5 class="title"><i class="flaticon-play-button"></i> <a href="#">How to Make Neapolitan Pizza Dough</a></h5>
                                                    <span class="duration">16:17</span>
                                                </div>
                                                <div class="course-lessons-item">
                                                    <h5 class="title"><i class="flaticon-play-button"></i> <a href="#">Easy Artisan Pizza</a></h5>
                                                    <span class="duration">12:34</span>
                                                </div>
                                                <div class="course-lessons-item">
                                                    <h5 class="title"><i class="flaticon-play-button"></i> <a href="#">Focaccia Bread Recipe</a></h5>
                                                    <span class="duration">14:55</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- Single Course Topics Accordion Item End -->
                            </div>
                        </div>
                        <!-- Single Course Topics Accordion End -->
                        <!-- Single Course Instructor Start -->
                        {{-- <div class="single-course-instructor-wrap">
                            <h4 class="title">About the instructors</h4>
                            <!-- Single Instructor Start -->
                            <div class="single-instructor">
                                <div class="instructor-avatar">
                                    <a href="#"><img src="{{ asset('front/assets/images/profile-1.jpg') }}" alt=""></a>
                                </div>
                                <div class="instructor-text">
                                    <h4 class="name"><a href="#">Kevin Perry</a></h4>
                                    <p class="bio">My greatest passion in life is teaching. I was born and raised in Sydney, and experienced great success at school and at university due to amazing</p>
                                    <div class="instructor-meta-data">
                                        <div class="rating">
                                            <ul>
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                                <li class="rating-line"><i class="far fa-star"></i></li>
                                            </ul>
                                            <span class="rating-digit">4.86 <span class="total-rating">(7 Ratings)</span></span>

                                        </div>
                                        <div class="instructor-course-students">
                                            <div class="course">
                                                <span><i class="flaticon-mortarboard"></i> 5 Courses
                                            </span>
                                            </div>
                                            <div class="students">
                                                <span><i class="flaticon-avatar"></i> 128 Students</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Instructor End -->
                            <!-- Single Instructor Start -->
                            <div class="single-instructor">
                                <div class="instructor-avatar">
                                    <a href="#"><img src="{{ asset('front/assets/images/profile-2.jpg') }}" alt=""></a>
                                </div>
                                <div class="instructor-text">
                                    <h4 class="name"><a href="#">Mick Harris</a></h4>
                                    <p class="bio">I am a French born and raised mother who home schools both of her children with the official French program after their day at school. I have been tutoring Middle and High-School students this year</p>
                                    <div class="instructor-meta-data">
                                        <div class="rating">
                                            <ul>
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                                <li class="rating-line"><i class="far fa-star"></i></li>
                                            </ul>
                                            <span class="rating-digit">4.79 <span class="total-rating">(19 Ratings)</span></span>

                                        </div>
                                        <div class="instructor-course-students">
                                            <div class="course">
                                                <span><i class="flaticon-mortarboard"></i> 11 Courses
                                            </span>
                                            </div>
                                            <div class="students">
                                                <span><i class="flaticon-avatar"></i> 81 Students</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Instructor End -->
                        </div> --}}
                        <!-- Single Course Instructor End -->
                    </div>
                    <!-- Single Course Topics End -->
                    <!-- Single Course Review Start -->
                    {{-- <div class="single-course-feedback-wrap">
                        <h4 class="title">About the instructors</h4>
                        <div class="single-course-reviews-wrap">
                            <div class="single-course-rating-wrap">
                                <!-- Single Course Average Rating Start -->
                                <div class="average-rating-wrap">
                                    <div class="average-rating">
                                        <span class="average-digit">4.7</span>
                                        <ul class="rating">
                                            <li class="rating-full"><i class="fas fa-star"></i></li>
                                            <li class="rating-full"><i class="fas fa-star"></i></li>
                                            <li class="rating-full"><i class="fas fa-star"></i></li>
                                            <li class="rating-full"><i class="fas fa-star"></i></li>
                                            <li class="rating-line"><i class="far fa-star"></i></li>
                                        </ul>
                                        <span class="total-digit">Total 3 Ratings</span>
                                    </div>
                                    <div class="average-rating-meter">
                                        <!-- Single Meter Start -->
                                        <div class="single-meter">
                                            <div class="rating-meter-star">
                                                <span><i class="fas fa-star"></i> 5</span>
                                            </div>
                                            <div class="rating-meter-bar-inner">
                                                <div class="rating-bar"></div>
                                            </div>
                                            <div class="rating-meter-text">
                                                <span class="count">2 ratings</span>
                                            </div>
                                        </div>
                                        <!-- Single Meter End -->
                                        <!-- Single Meter Start -->
                                        <div class="single-meter">
                                            <div class="rating-meter-star">
                                                <span><i class="fas fa-star"></i>4</span>
                                            </div>
                                            <div class="rating-meter-bar-inner">
                                                <div class="rating-bar bar-2"></div>
                                            </div>
                                            <div class="rating-meter-text">
                                                <span class="count">2 ratings</span>
                                            </div>
                                        </div>
                                        <!-- Single Meter End -->
                                        <!-- Single Meter Start -->
                                        <div class="single-meter">
                                            <div class="rating-meter-star">
                                                <span><i class="fas fa-star"></i> 3</span>
                                            </div>
                                            <div class="rating-meter-bar-inner">
                                                <div class="rating-bar bar-empty"></div>
                                            </div>
                                            <div class="rating-meter-text">
                                                <span class="count">0 ratings</span>
                                            </div>
                                        </div>
                                        <!-- Single Meter End -->
                                        <!-- Single Meter Start -->
                                        <div class="single-meter">
                                            <div class="rating-meter-star">
                                                <span><i class="fas fa-star"></i> 2</span>
                                            </div>
                                            <div class="rating-meter-bar-inner">
                                                <div class="rating-bar bar-empty"></div>
                                            </div>
                                            <div class="rating-meter-text">
                                                <span class="count">0 ratings</span>
                                            </div>
                                        </div>
                                        <!-- Single Meter End -->
                                        <!-- Single Meter Start -->
                                        <div class="single-meter">
                                            <div class="rating-meter-star">
                                                <span><i class="fas fa-star"></i> 1</span>
                                            </div>
                                            <div class="rating-meter-bar-inner">
                                                <div class="rating-bar bar-empty"></div>
                                            </div>
                                            <div class="rating-meter-text">
                                                <span class="count">0 ratings</span>
                                            </div>
                                        </div>
                                        <!-- Single Meter End -->
                                    </div>
                                </div>
                                <!-- Single Course Average Rating End -->
                            </div>
                            <!-- Single Course Review List Start -->
                            <div class="single-course-reviews-list">
                                <!-- Review List Item Start -->
                                <div class="review-list-item">
                                    <div class="review-left">
                                        <div class="review-avatar">
                                            <a class="image color-1" href="#">MG</a>
                                        </div>
                                        <div class="review-info">
                                            <span class="name"><a href="#">mmd ghanbari</a></span>
                                            <span class="time">2 months ago</span>
                                            <ul class="rating">
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                                <li class="rating-line"><i class="far fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="review-right">
                                        <span class="message">good Awesome course.</span>
                                    </div>
                                </div>
                                <!-- Review List Item End -->
                                <!-- Review List Item Start -->
                                <div class="review-list-item">
                                    <div class="review-left">
                                        <div class="review-avatar">
                                            <a class="image color-2" href="#">MG</a>
                                        </div>
                                        <div class="review-info">
                                            <span class="name"><a href="#">Blessing Mugumwa </a></span>
                                            <span class="time">2 months ago</span>
                                            <ul class="rating">
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="review-right">
                                        <span class="message">Awesome course.</span>
                                    </div>
                                </div>
                                <!-- Review List Item End -->
                                <!-- Review List Item Start -->
                                <div class="review-list-item">
                                    <div class="review-left">
                                        <div class="review-avatar">
                                            <a class="review-img" href="#"><img src="{{ asset('front/assets/images/profile-3.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="review-info">
                                            <span class="name"><a href="#">Rivera Silva</a></span>
                                            <span class="time">6 months ago</span>
                                            <ul class="rating">
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                                <li class="rating-full"><i class="fas fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="review-right">
                                        <span class="message">Awesome course. I have only good things to say about this course. All topics are well explained. The notes are clear and exercises are very practical. Thank you.</span>
                                    </div>
                                </div>
                                <!-- Review List Item End -->
                            </div>
                            <!-- Single Course Review List End -->
                        </div>
                    </div> --}}
                    <!-- Single Course Review End -->
                </div>
                <!-- Single Course Wrapper End -->
            </div>
            <div class="col-lg-4">
                <!-- Single Course Sidebar Start -->
                <div class="single-course-sidebar">
                    <div class="single-course-sidebar-wrapper">
                        <!-- Single Course Price Box Start Start -->
                        <div class="course-price-box">
                            {{-- <div class="price-box-video">
                                <img src="assets/images/single-price-1.jpg" alt="">
                                <a class="popup-video" href="https://www.youtube-nocookie.com/embed/Ga6RYejo6Hk"><i class="fas fa-play"></i></a>
                            </div> --}}
                            {{-- <span class="price">Free</span> --}}
                            <ul class="price-box-content">
                                {{-- <li>
                                    <div class="price-box-icon">
                                        <span class="meta-label"><i class="flaticon-user-1"></i> Instructor</span>
                                    </div>
                                    <div class="price-box-info">
                                        <span class="value"><a href="#">Kevin Perry</a></span>
                                    </div>
                                </li> --}}
                                <li>
                                    <div class="price-box-icon">
                                        <span class="meta-label"><i class="flaticon-bar-chart-1"></i> Level</span>
                                    </div>
                                    <div class="price-box-info">
                                        <span class="value">All Levels</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="price-box-icon">
                                        <span class="meta-label"><i class="flaticon-wall-clock"></i> Duration</span>
                                    </div>
                                    <div class="price-box-info">
                                        <span class="value">03h 12m 30s </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="price-box-icon">
                                        <span class="meta-label"><i class="flaticon-shopping-cart-1"></i>  Enrolled</span>
                                    </div>
                                    <div class="price-box-info">
                                        <span class="value">59</span>
                                    </div>
                                </li>
                                {{-- <li>
                                    <div class="price-box-icon">
                                        <span class="meta-label"><i class="flaticon-google-docs"></i>  Lectures</span>
                                    </div>
                                    <div class="price-box-info">
                                        <span class="value">8 Lessons</span>
                                    </div>
                                </li> --}}
                            </ul>
                            <div class="price-box-btn">
                                <form action="#">
                                    <button class="btn" type="submit">Enroll Now</button>
                                </form>
                            </div>
                            {{-- <div class="price-box-social">
                                <span class="share-title">Share:</span>
                                <ul class="social">
                                    <li><a class="share-facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a class="share-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a class="share-linkedin" href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a class="share-pinterest" href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div> --}}
                        </div>
                        <!-- Single Course Price Box Start End -->
                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget">
                            <!-- Widget Title Start -->
                            <div class="widget-title">
                                <h3 class="title">More Courses</h3>
                            </div>
                            <!-- Widget Title End -->
                            <!-- Widget Recent Post Start -->
                            <div class="recent-posts" >
                                <ul>
                                    @foreach($courses as $key => $course_value)

                                    @php             
                                        $id = Crypt::encrypt($course_value->id);
                                    @endphp

                                        
                                        @if($course_value->course_name == $data->course_name)

                                            @php
                                                continue ;
                                            @endphp
                                        @else
                                        <li>
                                            <div class="post-thumb">
                                               
                                                @if(!empty($course_value->course_images))

                                                <a href="{{ url('course-detail/'. $id) }}"><img src="{{ asset('uploads/course-images/'.$course_value->course_images) }}" alt=""></a>

                                                @else
                                                <a href="{{ url('course-detail/'. $id) }}"><img src="{{ asset('front/assets/images/course-side-1.jpg') }}" alt=""></a>

                                                @endif

                                            </div>
                                            <div class="post-text">
                                                <h4 class="title"><a href="{{ url('course-detail/'. $id) }}">{{ $course_value->course_name }}</a></h4>
                                                {{-- <span class="price">INR {{$course_value->amount}}</span> --}}
                                                @if( $course_value->amount == 0.00 && $course_value->actual_amount == '')
                                                    <span class="text-danger">Coming soon</span>
                                                    @else
                                                    <span>INR <del class="text-danger">{{ $course_value->amount}}</del></span><br>
                                                    <span>INR {{ round($course_value->actual_amount)}}</span>

                                                    @endif
                                            </div>
                                        </li>
                                        @endif

                                    @endforeach
                                    
                                    
                                </ul>
                            </div>
                            <!-- Widget Recent Post End -->
                        </div>
                        <!-- Sidebar Widget End -->
                    </div>
                </div>
                <!-- Single Course Sidebar End -->
            </div>
        </div>
    </div>

</div>
<!-- Single Course End -->
@endsection