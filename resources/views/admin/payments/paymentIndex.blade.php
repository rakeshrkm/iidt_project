@extends('admin.layouts.master')
@section('title', 'Payments Lists')
@section('content')
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Payments</h5>
                        </div>
                        <ul class="breadcrumb">
                            {{-- <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Lists</a></li> --}}
                            {{ Breadcrumbs::render('payments') }}
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
                            <h5>Payments Lists</h5>
                            <form method="get">
                                <input type="text" class="" value="{{request('search')}}" name="search"  />
                                    <button type="submit" class="btn-sm btn-primary">Submit</button>
                            </form>
                        </div>
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
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr No. </th>
                                            <th>Name</th>
                                            <th>Course Id</th>
                                            <th>Amount</th>
                                            <th>Screenshot</th>
                                            <th>Created Date</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($payments as $key => $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->GetUsersDetails->name }}</td>
                                                <td>{{ $value->GetCourseDetail->course_name }}</td>
                                                <td>{{ $value->amount }}</td>
                                                <td> <a href="{{ asset('uploads/course-payments/'.$value->amount_screen_shot) }}"> {{ $value->amount_screen_shot }}</a> </td>
                                                <td>{{ date_format($value->created_at, 'd-m-Y') }}</td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#myModal_{{$loop->iteration}}" class="text-{{ $value->status == 'Verified' ? 'success' : 'danger'}}" data-bs-toggle="modal" data-bs-target="#myModal_{{$loop->iteration}}"> {{ $value->status == 'Verified' ? 'Verified' : 'Verify Payments'}} </a>
                                                    <!-- Delete modal -->
                                                    <div id="myModal_{{$loop->iteration}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Payments Verify</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p class="mb-0 text-danger">Are you sure you want to verify payments of  {{$value->GetUsersDetails->name}}</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn  btn-secondary" data-dismiss="modal">No</button>
                                                                    <a href="{{ url('/payments/verify-payments/'.$value->id) }}"><button type="button" class="btn  btn-primary">Yes</button></a>
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
                                {{$payments->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
