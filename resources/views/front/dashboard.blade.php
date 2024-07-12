@extends('front.layouts.master', ['title' => 'Dashboard'])  
@section('contents')  

<div class="section top-courses-3-section courses-grid-section">
    <div class="container">
        <div class="top-courses-wrapper">
            <h3>Dashboard</h3>
            <!-- Section Title Start -->
            
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
                                    <span class="price">INR {{$value->actual_amount}}</span>
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