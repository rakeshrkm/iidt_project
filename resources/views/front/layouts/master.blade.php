<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title ? $title : 'Indian Institute of Drone Technology'}}</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/assets/images/iidt/logo.png') }}">
    <!-- CSS
	============================================ -->
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/flaticon.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/aos.css') }}">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
    

    <!-- <link rel="stylesheet" href="assets/css/vendor/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css"> -->

    <script src='https://www.google.com/recaptcha/api.js'></script>


    {{-- date pickers --}}
    {{-- <link href = "{{ asset('front/assets/css/jquery-ui.css') }}" rel = "stylesheet"> --}}

<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
 <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
 <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
 {{-- <script src = "{{ asset('front/assets/js/jquery-1.10.2.js') }}"></script>
 <script src = "{{ asset('front/assets/js/jquery-ui.js') }}"></script> --}}
 



</head>
<body>
    <div class="main-wrapper">
        <!-- Preloader start -->
        <div class="preloader">
            <div class="loader">
                <div class="ytp-spinner">
                    <div class="ytp-spinner-container">
                        <div class="ytp-spinner-rotator">
                            <div class="ytp-spinner-left">
                                <div class="ytp-spinner-circle"></div>
                            </div>
                            <div class="ytp-spinner-right">
                                <div class="ytp-spinner-circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Preloader End -->
        @include('front.layouts.header')
        
            @yield('contents')

      @include('front.layouts.footer')

    </div>

    <!-- JS
    ============================================ -->
    {{-- <script src="{{ asset('front/assets/js/vendor/jquery-1.12.4.min.js') }}"></script> --}}
    <script src="{{ asset('front/assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('front/assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/bootstrap.min.js') }}"></script>

    <!-- Plugins JS -->
    <script src="{{ asset('front/assets/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/aos.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/waypoints.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/appear.min.js') }}"></script>
    
    <!-- Main JS -->
    <script src="{{ asset('front/assets/js/main.js') }}"></script>

    @yield('scripts')

{{-- google recaptcha --}}
{{-- 
    <script src="https://www.google.com/recaptcha/api.js"></script> --}}


</body>
</html>
