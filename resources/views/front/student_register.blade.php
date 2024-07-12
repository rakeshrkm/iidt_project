@extends('front.layouts.master', ['title' => 'Student Registration'])
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
                        <h2 class="title">Registration</h2>
                        <ul class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Students Registeration</li>
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
                <div class="col-md-12">
                    <!-- Contact Form Start -->
                    <div class="contact-form card shadow mb-2">
                        <h4 class="title">Register Here</h4>
                        <div class="row">
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
                           
                                <form method="post" action="{{ route('student.submit') }}">
                                    @csrf
                        <div class="row">
                            <div class="col-md-6">    
                                <div class="form-group single-form">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name" placeholder="Enter name">
                                    @if($errors->has('name'))
                                    <small id="error" class="form-text text-danger">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group single-form">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email" placeholder="Enter email">
                                    @if($errors->has('email'))
                                    <small id="error" class="form-text text-danger">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 ">
                                <div class="form-group single-form">
                                    <label for="mobile">Mobile</label>
                                    <input type="mobile" class="form-control" value="{{ old('mobile') }}" name="mobile" id="mobile" placeholder="Enter mobile">
                                    @if($errors->has('mobile'))
                                    <small id="error" class="form-text text-danger">{{ $errors->first('mobile') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group single-form">
                                    <label for="dob">DOB</label>
                                    <input type="text" class="form-control" value="{{ old('dob') }}" name="dob" id="my_date_picker" placeholder="Enter dob">
                                    @if($errors->has('dob'))
                                    <small id="error" class="form-text text-danger">{{ $errors->first('dob') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group single-form">
                                    <label for="college">Password</label>
                                    <input type="text" class="form-control" value="" name="password" id="password" placeholder="Enter Password">
                                    @if($errors->has('password'))
                                    <small id="error" class="form-text text-danger">{{ $errors->first('password') }}</small>
                                    @endif
                                </div>
                            </div>

                            {{-- <div class="col-md-6">
                                <div class="form-group single-form">
                                    <label>College / University Name </label>
                                    <select class="form-control" id="college_id" name="college_id">
                                        <option value=" "> -- Select college -- </option>
                                        @foreach($colleges as $key => $value)
                                        <option value="{{ $value->id}}"> {{ $value->name }}</option>
                            @endforeach
                            </select>
                            @if($errors->has('college_id'))
                            <small id="error" class="form-text text-muted text-danger">{{ $errors->first('college_id') }}</small>
                            @endif
                        </div>
                    </div> --}}



                    <div class="col-md-6">
                        <div class="form-group single-form">
                            <label for="college">Confirm Password</label>
                            <input type="text" class="form-control" value="" name="password_confirmation" id="password_confirmation" placeholder="Enter Confirm Password">
                            @if($errors->has('password_confirmation'))
                            <small id="error" class="form-text text-danger">{{ $errors->first('password_confirmation') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group single-form">
                            <label>Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value=" "> -- Select gender -- </option>
                                @foreach($genders as $key => $value)
                                <option value="{{ $value}}" {{ old('gender') == $value ? 'selected' : ''}}> {{ $value }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('gender'))
                            <small id="error" class="form-text text-danger">{{ $errors->first('gender') }}</small>
                            @endif

                        </div>
                    </div>
                    <div class="col-md-6">  
                        <label class="mt-2">Captcha</label>
                        <div class="g-recaptcha mt-2" data-sitekey={{ env('RECAPTCHA_SITE_KEY') }}>

                        </div>
                        @if ($errors->has('g-recaptcha-response'))
                        <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                        @endif

                    </div>
                </div>
                <button type="submit" class="btn mt-4 mb-4 pull-left">Submit</button>

            </div>
        </div>
        </form>
    </div>
</div>
    <!-- Contact Form End -->
</div>
</div>
<!-- Contact Form End -->
<!-- Call to Action End -->
@endsection
@section('scripts')
<script> 


    $('#my_date_picker').mouseover(function(){
        $( "#my_date_picker" ).datepicker({
            format: "yyyy/mm/dd",
            autoclose: true,
            orientation: "top",
            maxDate: new Date()      
        });
    })
    

       


   
</script>  
    
@endsection
