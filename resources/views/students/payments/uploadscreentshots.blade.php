@extends('admin.layouts.master')
@section('title', 'Add Payment Screentshot')
@section('content')
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                {{-- <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Upload Payment Details</h5>
                        </div>
                        <ul class="breadcrumb">
                            {{ Breadcrumbs::render('college_create') }}
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="">
                    <div class="card-header text-center">
                        <h5>Upload Payments Details</h5>
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

                    <form method="post" action="{{route('payments.updatePayments')}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                                <div class="row">
                                    <div class="col-md-4">

                                    </div>
                                    <div class="col-md-4">
                                    
                                        <div class="row card">
                                            <div class="col-md-12 text-center">
                                                <div class="form-group p-4">
                                                    <img src="{{asset('qrcode/qr code.png')}}" /> <br>

                                                    <span class="text-success p-2" style="font-size:25px;"> Rs {{ $payment->amount }}</span>
                                                    <input type="hidden" name="id" value="{{ $payment->id }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="paymentStatus">Screenshot of Payments<sup class="text-danger">*</sup></label>
                                                    <input type="file" class="form-control"  name="amount_screen_shot" />
                                                </div>
                                            </div>
                                            
                                            <button type="submit" class="btn  btn-primary float-right">Submit</button>
                                        </form>

                                        </div>
                                    
                                    </div>

                                    <div class="col-md-4"></div>
                                    
                                   
                                </div>
                            </div>
                               
                            </div>
                          
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection