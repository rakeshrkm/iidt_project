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
                            <h5 class="m-b-10">Course Learning Points</h5>
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
                            <input type="text" class="" value="{{request('search')}}" name="search"/>
                                <button type="submit" class="btn-sm btn-primary">Submit</button>
                            </form>
                        </div>

                        <a href="{{ route('courses.learningPoints') }}" class="btn btn-md btn-primary float-right">Add New Course Learning Points</a>
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
                                                <th>Learning Points</th>
                                                {{-- <th>Created Date</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($data as $key => $value)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ !empty($value->getCourseName->course_name) ?  $value->getCourseName->course_name : ''}}</td>
                                                    <td class="text-wrap">{{ $value->learning_point }}</td>
                                                    {{-- <td>{{ date_format($value->created_at, 'd-m-Y') }}</td> --}}
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" ><span class="text-danger text-center"> No Record Found</span></td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{$data->withQueryString()}}
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
