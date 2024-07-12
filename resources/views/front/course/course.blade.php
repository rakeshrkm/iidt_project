@extends('front.layouts.master', ['title' => 'Course'])  
@section('contents')  
<div class="section page-banner-section" style="background-image: url({{asset('front/assets/images/bg/banner-img.jpg') }});">
    <div class="container">
        <!-- Page Banner Wrapper Start -->
        <div class="page-banner-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Banner Content Start -->
                    <div class="page-banner text-center">
                        <h2 class="title">Courses Grid</h2>
                        <ul class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Courses</li>
                        </ul>
                    </div>
                    <!-- Page Banner Content End -->
                </div>
            </div>
        </div>
        <!-- Page Banner Wrapper End -->
    </div>
</div>
<!-- Page Banner End -->

<!-- Courses Start -->
<div class="section top-courses-3-section courses-grid-section">
    <div class="container">
        <div class="top-courses-wrapper">
            <!-- Section Title Start -->
            <div class="section-title text-center">
                <h2 class="title">Course For every Drone Enthusiast</h2>
            </div>
            <!-- Section Title End -->
            {{-- <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12">
                    <div class="top-courses-filter text-center">
                        <ul>
                            <li class="active" data-filter="*">All <span>8</span></li>
                            <li data-filter=".course-cooking">Cooking <span>3</span></li>
                            <li data-filter=".course-finance">Finance <span>3</span></li>
                            <li data-filter=".course-health">Health <span>5</span></li>
                            <li data-filter=".course-technology">Technology <span>2</span></li>
                        </ul>
                    </div>
                </div>
            </div> --}}

            <!-- Courses Wrapper Start -->
            <div class="top-courses-content-wrapper">
                <div class="row grid">

                    @foreach($data as $key => $value)
                    @php
                            
                $id = Crypt::encrypt($value->id);
              @endphp
                    <div class="col-lg-3 col-sm-6 course-health course-cooking">
                        <!-- Single Courses Start -->
                        <div class="single-course">
                            <!-- Courses Image Start -->
                            <div class="courses-image">
                                <a href="{{ url('course-detail/'. $id) }}">
                                    @if(!empty($value->course_images))
                                    <img src="{{ asset('uploads/course-images/'.$value->course_images) }}" alt="Courses" height="150">
                                    @else
                                    <img src="{{ asset('front/assets/images/bg/explore-img.jpg')}}" alt="Not Images" height="150">
                                    @endif
                                </a>
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
                                {{-- <div class="courses-price">
                                  
                                </div> --}}
                                <h3 class="title"><a href="{{ url('course-detail/'. $id) }}">{{$value->course_name}}</a></h3>
                            </div>
                            <!-- Courses Content End -->
                            <!-- Courses Meta Start -->
                            <div class="courses-meta">
                                <div class="course-enroll-rating d-flex">
                                    <p><i class="flaticon-user"></i> 4</p>
                                    {{-- <p><i class="flaticon-star-1"></i> 1</p> --}}
                                </div>
                                <div class="cart-btn">
                                    {{-- <a href="#">Add to cart</a> --}}

                                    @if( $value->amount == 0.00 && $value->actual_amount == '')
                                        <span class="text-danger">Coming soon</span>
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

                
                    
                    {{-- <div class="col-lg-3 col-sm-6 course-finance course-health">
                        <!-- Single Courses Start -->
                        <div class="single-course">
                            <!-- Courses Image Start -->
                            <div class="courses-image">
                                <a href="#"><img src="{{ asset('front/assets/images/courses/course-3.jpg') }}" alt="Courses"></a>
                                <div class="top-meta">
                                    <div class="categories">
                                        <a class="tag color-2" href="#">Finance</a>
                                    </div>
                                    <div class="wishlist">
                                        <a href="#"><i class="far fa-bookmark"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Courses Image End -->
                            <!-- Courses Content Start -->
                            <div class="courses-content">
                                <div class="courses-author">
                                    <img src="{{ asset('front/assets/images/courses/author-1.jpg') }}" alt="author">
                                    <h4 class="name"><a href="#">Mick Harris</a></h4>
                                </div>
                                <div class="courses-price">
                                    <span class="price">Free</span>
                                </div>
                                <h3 class="title"><a href="#">English Pronunciation for Beginners</a></h3>
                            </div>
                            <!-- Courses Content End -->
                            <!-- Courses Meta Start -->
                            <div class="courses-meta">
                                <div class="course-enroll-rating d-flex">
                                    <p><i class="flaticon-user"></i> 46</p>
                                    <p><i class="flaticon-star-1"></i> 4</p>
                                </div>
                                <div class="cart-btn">
                                    <a href="#">Get Enrolled</a>
                                </div>
                            </div>
                            <!-- Courses Meta End -->

                        </div>
                        <!-- Single Courses End -->
                    </div>
                    <div class="col-lg-3 col-sm-6 course-finance course-health">
                        <!-- Single Courses Start -->
                        <div class="single-course">
                            <!-- Courses Image Start -->
                            <div class="courses-image">
                                <a href="#"><img src="{{ asset('front/assets/images/courses/course-4.jpg') }}" alt="Courses"></a>
                                <div class="top-meta">
                                    <div class="categories">
                                        <a class="tag color-3" href="#">Cooking</a>
                                    </div>
                                    <div class="wishlist">
                                        <a href="#"><i class="far fa-bookmark"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Courses Image End -->
                            <!-- Courses Content Start -->
                            <div class="courses-content">
                                <div class="courses-author">
                                    <img src="{{ asset('front/assets/images/courses/author-2.jpg') }}" alt="author">
                                    <h4 class="name"><a href="#">Kevin Perry</a></h4>
                                </div>
                                <div class="courses-price">
                                    <span class="price">£29.99</span>
                                </div>
                                <h3 class="title"><a href="#">Health and Safety Awareness Training</a></h3>
                            </div>
                            <!-- Courses Content End -->
                            <!-- Courses Meta Start -->
                            <div class="courses-meta">
                                <div class="course-enroll-rating d-flex">
                                    <p><i class="flaticon-user"></i> 2</p>
                                    <p><i class="flaticon-star-1"></i> 1</p>
                                </div>
                                <div class="cart-btn">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                            <!-- Courses Meta End -->

                        </div>
                        <!-- Single Courses End -->
                    </div>
                    <div class="col-lg-3 col-sm-6 course-technology">
                        <!-- Single Courses Start -->
                        <div class="single-course">
                            <!-- Courses Image Start -->
                            <div class="courses-image">
                                <a href="#"><img src="{{ asset('front/assets/images/courses/course-5.jpg') }}" alt="Courses"></a>
                                <div class="top-meta">
                                    <div class="categories">
                                        <a class="tag color-4" href="#">Business</a>
                                    </div>
                                    <div class="wishlist">
                                        <a href="#"><i class="far fa-bookmark"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Courses Image End -->
                            <!-- Courses Content Start -->
                            <div class="courses-content">
                                <div class="courses-author">
                                    <img src="{{ asset('front/assets/images/courses/author-1.jpg') }}" alt="author">
                                    <h4 class="name"><a href="#">Mick Harris</a></h4>
                                </div>
                                <div class="courses-price">
                                    <span class="price">Free</span>
                                </div>
                                <h3 class="title"><a href="#">Complete Financial Analyst Course</a></h3>
                            </div>
                            <!-- Courses Content End -->
                            <!-- Courses Meta Start -->
                            <div class="courses-meta">
                                <div class="course-enroll-rating d-flex">
                                    <p><i class="flaticon-user"></i> 2</p>
                                    <p><i class="flaticon-star-1"></i> 1</p>
                                </div>
                                <div class="cart-btn">
                                    <a href="#">Get Enrolled</a>
                                </div>
                            </div>
                            <!-- Courses Meta End -->

                        </div>
                        <!-- Single Courses End -->
                    </div>
                    <div class="col-lg-3 col-sm-6 course-health course-finance">
                        <!-- Single Courses Start -->
                        <div class="single-course">
                            <!-- Courses Image Start -->
                            <div class="courses-image">
                                <a href="#"><img src="{{ asset('front/assets/images/courses/course-6.jpg') }}" alt="Courses"></a>
                                <div class="top-meta">
                                    <div class="categories">
                                        <a class="tag color-2" href="#">Health</a>
                                    </div>
                                    <div class="wishlist">
                                        <a href="#"><i class="far fa-bookmark"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Courses Image End -->
                            <!-- Courses Content Start -->
                            <div class="courses-content">
                                <div class="courses-author">
                                    <img src="{{ asset('front/assets/images/courses/author-2.jpg') }}" alt="author">
                                    <h4 class="name"><a href="#">Kevin Perry</a></h4>
                                </div>
                                <div class="courses-price">
                                    <span class="price">£29.99</span>
                                </div>
                                <h3 class="title"><a href="#">Easy Food Recipes to Make at Home</a></h3>
                            </div>
                            <!-- Courses Content End -->
                            <!-- Courses Meta Start -->
                            <div class="courses-meta">
                                <div class="course-enroll-rating d-flex">
                                    <p><i class="flaticon-user"></i> 2</p>
                                    <p><i class="flaticon-star-1"></i> 1</p>
                                </div>
                                <div class="cart-btn">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                            <!-- Courses Meta End -->

                        </div>
                        <!-- Single Courses End -->
                    </div>
                    <div class="col-lg-3 col-sm-6 course-cooking">
                        <!-- Single Courses Start -->
                        <div class="single-course">
                            <!-- Courses Image Start -->
                            <div class="courses-image">
                                <a href="#"><img src="{{ asset('front/assets/images/courses/course-7.jpg') }}" alt="Courses"></a>
                                <div class="top-meta">
                                    <div class="categories">
                                        <a class="tag color-1" href="#">Animation</a>
                                    </div>
                                    <div class="wishlist">
                                        <a href="#"><i class="far fa-bookmark"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Courses Image End -->
                            <!-- Courses Content Start -->
                            <div class="courses-content">
                                <div class="courses-author">
                                    <img src="{{ asset('front/assets/images/courses/author-1.jpg') }}" alt="author">
                                    <h4 class="name"><a href="#">Mick Harris</a></h4>
                                </div>
                                <div class="courses-price">
                                    <span class="price">Free</span>
                                </div>
                                <h3 class="title"><a href="#">Drawing and Painting Course for Children</a></h3>
                            </div>
                            <!-- Courses Content End -->
                            <!-- Courses Meta Start -->
                            <div class="courses-meta">
                                <div class="course-enroll-rating d-flex">
                                    <p><i class="flaticon-user"></i> 5</p>
                                    <p><i class="flaticon-star-1"></i> 2</p>
                                </div>
                                <div class="cart-btn">
                                    <a href="#">Get Enrolled</a>
                                </div>
                            </div>
                            <!-- Courses Meta End -->

                        </div>
                        <!-- Single Courses End -->
                    </div>
                    <div class="col-lg-3 col-sm-6 course-health">
                        <!-- Single Courses Start -->
                        <div class="single-course">
                            <!-- Courses Image Start -->
                            <div class="courses-image">
                                <a href="#"><img src="{{ asset('front/assets/images/courses/course-11.jpg') }}" alt="Courses"></a>
                                <div class="top-meta">
                                    <div class="categories">
                                        <a class="tag color-2" href="#">Business</a>
                                    </div>
                                    <div class="wishlist">
                                        <a href="#"><i class="far fa-bookmark"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Courses Image End -->
                            <!-- Courses Content Start -->
                            <div class="courses-content">
                                <div class="courses-author">
                                    <img src="{{ asset('front/assets/images/courses/author-2.jpg') }}" alt="author">
                                    <h4 class="name"><a href="#">Kevin Perry</a></h4>
                                </div>
                                <div class="courses-price">
                                    <span class="price">£49.99</span>
                                </div>
                                <h3 class="title"><a href="#">IELTS Course for international students</a></h3>
                            </div>
                            <!-- Courses Content End -->
                            <!-- Courses Meta Start -->
                            <div class="courses-meta">
                                <div class="course-enroll-rating d-flex">
                                    <p><i class="flaticon-user"></i> 5</p>
                                    <p><i class="flaticon-star-1"></i> 2</p>
                                </div>
                                <div class="cart-btn">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                            <!-- Courses Meta End -->

                        </div>
                        <!-- Single Courses End -->
                    </div>
                    <div class="col-lg-3 col-sm-6 course-cooking course-technology">
                        <!-- Single Courses Start -->
                        <div class="single-course">
                            <!-- Courses Image Start -->
                            <div class="courses-image">
                                <a href="#"><img src="{{ asset('front/assets/images/courses/course-9.jpg') }}" alt="Courses"></a>
                                <div class="top-meta">
                                    <div class="categories">
                                        <a class="tag color-3" href="#">Animation</a>
                                    </div>
                                    <div class="wishlist">
                                        <a href="#"><i class="far fa-bookmark"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Courses Image End -->
                            <!-- Courses Content Start -->
                            <div class="courses-content">
                                <div class="courses-author">
                                    <img src="{{ asset('front/assets/images/courses/author-2.jpg') }}" alt="author">
                                    <h4 class="name"><a href="#">Kevin Perry</a></h4>
                                </div>
                                <div class="courses-price">
                                    <span class="price">Free</span>
                                </div>
                                <h3 class="title"><a href="#">Android App Development Course</a></h3>
                            </div>
                            <!-- Courses Content End -->
                            <!-- Courses Meta Start -->
                            <div class="courses-meta">
                                <div class="course-enroll-rating d-flex">
                                    <p><i class="flaticon-user"></i> 57</p>
                                    <p><i class="flaticon-star-1"></i> 1</p>
                                </div>
                                <div class="cart-btn">
                                    <a href="#">Get Enrolled</a>
                                </div>
                            </div>
                            <!-- Courses Meta End -->

                        </div>
                        <!-- Single Courses End -->
                    </div> --}}
                </div>

            </div>
            <!-- Courses Wrapper End -->

            <!-- Gostudy Pagination Start -->
            <div class="gostudy-pagination courses-grid-pagination">
                <ul class="pagination justify-content-center">
                    {{$data->links() }}
                </ul>
            </div>
            <!-- Gostudy Pagination End -->

        </div>

    </div>
</div>
@endsection