@extends('admin.layouts.master')
@section('title', 'Course Lists')
@section('content')
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Course</h5>
                        </div>
                        <ul class="breadcrumb">
                            {{-- <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Lists</a></li> --}}
                            {{ Breadcrumbs::render('courses') }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        
                        <div class="float-left">
                            <h5>Students Lists</h5>
                            <form method="get">
                            <input type="text" class="" value="{{request('search')}}" name="search"  />
                            <select  id="gender" name="gender" style="height:27px;">
                                <option value=" "> -- Select gender -- </option>
                                @foreach($paymentTypes as $key => $value)
                                    <option value="{{ $value}}" {{ request('gender') == $value ? 'selected' : ''}}> {{  $value }}</option>
                                @endforeach
                            </select>
                                <button type="submit" class="btn-sm btn-primary">Submit</button>
                            </form>
                        </div>

                        <a href="{{ route('courses.create') }}" class="btn btn-md btn-primary float-right">Add New Course</a>
                    </div>
                    <div class="card-body">
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr No. </th>
                                                <th>Course Name</th>
                                                <th>Corse Code</th>
                                                <th>Payment Type</th>
                                                <th>Amount</th>
                                                <th>Discount Amount(in %)</th>
                                                <th>Actual Amount</th>
                                                <th>Course Time(in days)</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($courses as $key => $value)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $value->course_name }}</td>
                                                    <td>{{ $value->course_code }}</td>
                                                    <td>{{ $value->payment_type }}</td>
                                                    <td>{{ $value->amount }}</td>
                                                    <td>{{ $value->discount_amount_percentage }}</td>
                                                    <td>{{ $value->actual_amount }}</td>
                                                    <td>{{ $value->course_time }}</td>
                                                    <td>{{ date_format($value->created_at, 'd-m-Y') }}</td>
                                                    <td>
                                                        <a href="{{ url('/admin/courses/edit/'.$value->id) }}"> <i class="nav-icon fas fa-edit" title="Update Course"></i> </a> &nbsp; &nbsp;
    
                                                        <a href="#" data-toggle="modal" data-target="#myModal_{{$loop->iteration}}" data-bs-toggle="modal" data-bs-target="#myModal_{{$loop->iteration}}" class="text-danger"> <i class="nav-icon fas fa-trash" title="Delete College"></i></a>
                                                        <!-- Delete modal -->
                                                        <div id="myModal_{{$loop->iteration}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Course </h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p class="mb-0 text-danger">Are you sure you want to delete records ?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn  btn-secondary" data-dismiss="modal">No</button>
                                                                        <a href="{{ url('/college/destory/'.$value->id) }}"><button type="button" class="btn  btn-primary">Yes</button></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
    
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" ><span class="text-danger text-center"> No Record Found</span></td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{$courses->withQueryString()}}
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
