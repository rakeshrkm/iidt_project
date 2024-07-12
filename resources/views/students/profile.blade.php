@extends('admin.layouts.master')
@section('title', 'Student Profile')
@section('content')
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->

        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container emp-profile">
                            <form method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="profile-img">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                                            <div class="file btn btn-lg btn-primary">
                                                Change Photo
                                                <input type="file" name="file"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="profile-head">
                                                    <h5>
                                                       {{ $authUser->name }}
                                                    </h5>
                                                    <h6>
                                                        {{ $college->getCollegeDetail->name}}
                                                     </h6>
                                                    <h6>
                                                       {{ $authUser->RegisterUser->current_course}}
                                                    </h6>
                                               
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Purchased Courses</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="profile-work">
                                            <p>Remarks</p>
                                            <p>{{ $authUser->RegisterUser->remarks }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="tab-content profile-tab" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Name</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ ucfirst($authUser->name) }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Email</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $authUser->email }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Mobile</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $authUser->RegisterUser->mobile }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Applied Course</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $authUser->RegisterUser->course_name }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>DOB</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $authUser->RegisterUser->dob }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Gender</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{ $authUser->RegisterUser->gender }}</p>
                                                            </div>
                                                        </div>
                                            </div>
                                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Experience</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>Expert</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Hourly Rate</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>10$/hr</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Total Projects</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>230</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>English Level</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>Expert</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Availability</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>6 months</p>
                                                            </div>
                                                        </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Your Bio</label><br/>
                                                        <p>Your detail description</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
