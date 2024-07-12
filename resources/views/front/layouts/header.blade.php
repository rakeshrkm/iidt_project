  <!-- Header Start  -->
  <div id="header" class="header section">
    <div class="container">
        <!-- Header Wrapper Start  -->
        <div class="header-wrapper">
            <!-- Header Logo Start -->
            <div class="header-logo d-flex">
                <div>
                <a href="{{route('home')}}"><img src="{{ asset('front/assets/images/iidt/logo.png') }}" alt="" height="80"></a>
                </div>
                <div class="p-3">
                    <p style="color:#1b2336;font-weight:600;font-size:14px;">Indian Institute of Drone Technology</p>
                    <p style="color:#1b2336;font-weight:600;font-size:14px">भारतीय ड्रोन प्रौद्योगिकी संस्थान</p> 
                </div>
              
            </div>
            {{-- <div class="header-logo">
                  
            </div> --}}
            <!-- Header Logo End -->

            <!-- Header Right Start -->
            <div class="header-right">

                <!-- Header Menu Start -->
                <div class="header-menu d-none d-lg-block">
                    <ul class="main-menu">
                        <li class="active-menu">

                            @if(Auth::check() == true)
                            <a href="{{ route('student.dashboard') }}">Dashboard </a> &nbsp;&nbsp;
                            @else
                            <a href="{{ route('home') }}">Home</a>
                            @endif

                         
                            {{-- <ul class="sub-menu">
                                <li class="active"><a href="index.html">Home Default</a></li>
                              
                            </ul> --}}
                        </li>
                   
                        <li><a href="{{ route('courses') }}">Courses</a>
                            <ul class="sub-menu">
                                @php
                                    $course = DB::table('courses')->select('id','course_name')->get();     
                                   
                                @endphp
                                @foreach($course as $key => $value)
                                @php
                                     $id = Crypt::encrypt($value->id);
                                @endphp
                               
                                <li><a href="{{ url('course-detail/'. $id) }}">{{ $value->course_name}}</a></li>
                                <hr>
                                @endforeach
                            </ul>
                        </li>
                        {{-- <li><a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="about-us.href">About Us</a></li>
                                <li><a href="team.href">Our Team</a></li>
                                <li><a href="team-single.href">Team Single</a></li>
                                <li><a href="error.href">Page 404</a></li>
                                <li><a href="faq.href">FAQ`s</a></li>
                            </ul>
                        </li> --}}
                        {{-- <li><a href="blog.href">Blog</a>
                            <ul class="sub-menu">
                                <li><a href="blog.href">Blog Grid</a></li>
                                <li><a href="blog-standard.href">Blog Listing</a></li>
                                <li><a href="blog-details.href">Blog Single</a></li>
                            </ul>
                        </li> --}}
                        <li><a href="{{ route('countactLoadPage') }}">Contact</a></li>
                    </ul>
                </div>
                <!-- Header Menu End -->

                <!-- Header Meta Start -->
                <div class="header-meta">

                    <!-- Header Search Start -->
                    {{-- <div class="header-search d-none d-lg-block">
                        <a class="search-btn" href="#"><i class="flaticon-loupe"></i></a>
                        <div class="header-search-content">
                            <form action="#" method="get">
                                <input type="text" placeholder="Search...">
                                <button class="close-search" type="submit"><i class="flaticon-loupe"></i></button>
                            </form>
                        </div>
                    </div> --}}
                    <!-- Header Search End -->
                    <!-- Header Cart Start -->
                    {{-- <div class="header-cart">
                        <a class="cart-btn" href="#"><i class="flaticon-shopping-cart"></i></a>
                    </div> --}}
                    <!-- Header Cart End -->
                    <!-- Header Login Join Start -->
                    @if(Auth::check() == true)
                    <a class="login btn join-btn pl-2" href="{{ route('student.logout') }}"> Logout</a>
                    @else
                    <div class="header-login-join d-none d-lg-block">
                        <a class="login btn join-btn" href="{{ route('LoginPageLoad') }}">Login</a>
                        <a class="btn join-btn" href="{{ route('student.registration') }}" target="_blank">Register Now</a>
                    </div>
                    @endif
                    <!-- Header Login Join End -->
                </div>
                <!-- Header Meta End -->

                <div class="header-toggle d-lg-none">
                    <button data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
            <!-- Header Right End -->
        </div>
        <!-- Header Wrapper End -->

    </div>
</div>
<!-- Header End -->

<!-- Offcanvas Start -->
<div class="offcanvas offcanvas-start" id="offcanvasMenu">

    <div class="offcanvas-header">
        <!-- Offcanvas Logo Start -->
        <div class="offcanvas-logo d-flex">
            <div>
                <a href="{{route('home')}}"><img src="{{ asset('front/assets/images/iidt/logo.png') }}" alt=""></a>
                </div>
                <div class="p-3">
                    <p style="color:#1b2336;font-weight:600;font-size:14px;">Indian Institute of Drone Technology</p>
                    <p style="color:#1b2336;font-weight:600;font-size:14px">भारतीय ड्रोन प्रौद्योगिकी संस्थान</p> 
                </div>
        </div>
        <!-- Offcanvas Logo End -->
        <button class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">
        <div class="offcanvas-menu">
            <ul class="main-menu">
                <li class="active-menu">
                    <a href="#">Home</a>
                    <ul class="sub-menu">
                        <a href="{{ route('home') }}">Home</a>
                        {{-- <li><a href="#">Online Academy</a></li>
                        <li>
                            <a href="#">Online Courses</a>
                        </li>
                        <li>
                            <a href="#">Learning Coach</a>
                        </li>
                        <li>
                            <a href="#">Home Classic</a>
                        </li> --}}
                    </ul>
                </li>
                <li><a href="{{ route('courses') }}">Courses</a>
                    <ul class="sub-menu">
                        @php
                         $course = DB::table('courses')->select('id','course_name')->get();
                        @endphp
                        @foreach($course as $key => $value)
                        <li><a href="{{ route('courses') }}">{{ $value->course_name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                {{-- <li><a href="#">Pages</a>
                    <ul class="sub-menu">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Our Team</a></li>
                        <li><a href="#">Team Single</a></li>
                        <li><a href="#">Page 404</a></li>
                        <li><a href="#">FAQ`s</a></li>
                    </ul>
                </li>
                <li><a href="#">Blog</a>
                    <ul class="sub-menu">
                        <li><a href="#">Blog Grid</a></li>
                        <li><a href="#">Blog Listing</a></li>
                        <li><a href="#">Blog Single</a></li>
                    </ul>
                </li> --}}
                <li><a href="{{ route('countactLoadPage') }}">Contact</a></li>

                @if(Auth::check())
                <div class="header-login-join d-none d-lg-block">
                    <a class="login btn join-btn" href="{{ route('LoginPageLoad') }}">Login</a>
                    <a class="btn join-btn" href="{{ route('student.registration') }}" target="_blank">Register Now</a>
                </div>
                @else
                <a class="login btn join-btn" href="{{ route('student.dashboard') }}">Dashboard </a> &nbsp;&nbsp;

                    <a class="login btn join-btn pl-2" href="{{ route('student.logout') }}"> Logout</a>
                @endif

            </ul>
        </div>
    </div>

</div>
<!-- Offcanvas End -->

<!-- Shopping Cart Start -->
<div class="shopping-cart">

    <div class="shopping-cart-inner">
        <div class="shopping-cart-content">
            <p class="empty-message">No products in the cart.</p>
        </div>
    </div>

    <div class="body-overlay"></div>
</div>
<!-- Shopping Cart End -->