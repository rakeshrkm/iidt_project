@extends('admin.layouts.master')
@section('title', 'Dashboard')
@section('content')
<div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard Analytics</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->

    @if(auth()->user()->role_id == 1)
    <div class="row">
        <!-- table card-1 start -->
        <div class="col-md-12 col-xl-4">
            <div class="card flat-card">
                <div class="row-table">
                    <div class="col-sm-6 card-body br">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="icon feather icon-user text-c-green mb-1 d-block"></i>
                            </div>
                            <div class="col-sm-8 text-md-center">
                                <a href="{{route('registers.index')}}" ><h5>{{$data['student_count']}}</h5>
                                <span>Student Count</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="icon feather icon-university text-c-red mb-1 d-block"></i>
                            </div>
                            <div class="col-sm-8 text-md-center">
                                <a href="{{route('college.index')}}">
                               <h5>{{$data['college_count']}}</h5>
                                <span>College Count</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if(auth()->user()->role_id == 2)
    <div class="row">

        @foreach($data['course'] as $item)
            <div class="col-md-4">

            <div class="course card p-4">
                <div class="row">
                    <div class="col-md-6">
                           <label class="text-bold"><b>Name</b></label> 
                    </div>
                    <div class="col-md-6">
                            <p>{{ucfirst($item->course_name)}}
                    </div>

                    <div class="col-md-6">
                        <label class="text-bold"><b>Payment Type</b></label> 
                    </div>
                    <div class="col-md-6">
                            <p>{{ucfirst($item->payment_type)}}
                    </div>
                    @if(!empty($item->actual_amount))
                        @if(count($item->offers) > 0)
                            <div class="col-md-6">
                                <label class="text-bold"><b>Amount</b></label> 
                            </div>
                            <div class="col-md-6">
                                <p class="text-danger" ><del> Rs.{{ucfirst($item->amount)}} </del></p>
                            </div>
                    
                
                            <div class="col-md-6">
                                <label class="text-bold"><b>Discounted Amount</b></label> 
                            </div>
                            <div class="col-md-6">
                                <p>Rs. {{ucfirst($item->actual_amount)}}</del> </p>
                            </div>
                        @else
                            <div class="col-md-6">
                                <label class="text-bold"><b>Amount</b></label> 
                            </div>
                            <div class="col-md-6">
                                <p >Rs.{{ucfirst($item->amount)}}</p>
                            </div>

                        @endif

                    @else
                        <div class="col-md-6">
                            <label class="text-bold"><b>Amount</b></label> 
                        </div>
                        <div class="col-md-6">
                            <p >Rs.{{ucfirst($item->amount)}}</p>
                        </div>
                    @endif

                    <div class="col-md-6">
                        <label class="text-bold"><b>Course Time (in Dayes)</b></label> 
                    </div>
                    <div class="col-md-6">
                            <p>{{ucfirst($item->course_time)}}
                    </div>
                    <div class="col-md-12">
                        {{-- <a href="{{ url('payments/create/'.$item->id) }}" ><button class="btn btn-success text center">Pay Now </button></a>
                         --}}
                        <a href="{{ route('payments.create', ['id' => $item->id]) }}" ><button class="btn btn-success text center">Pay Now </button></a>

                    </div>
                </div>
                
            </div>
        </div>
        @endforeach

    </div>
    @endif
    <!-- [ Main Content ] end -->
</div>
@endsection