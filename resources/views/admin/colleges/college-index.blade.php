@extends('admin.layouts.master')
@section('title', 'College Lists')
@section('content')
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">College</h5>
                        </div>
                        <ul class="breadcrumb">
                            {{ Breadcrumbs::render('college') }}
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
                            {{-- <select  id="gender" name="gender" style="height:27px;">
                                <option value=" "> -- Select gender -- </option>
                                @foreach($paymentTypes as $key => $value)
                                    <option value="{{ $value}}" {{ request('gender') == $value ? 'selected' : ''}}> {{  $value }}</option>
                                @endforeach
                            </select> --}}
                                <button type="submit" class="btn-sm btn-primary">Submit</button>
                            </form>
                        </div>

                        <a href="{{ route('college.create') }}" class="btn btn-md btn-primary float-right">Add New College</a>
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
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>Sr No. </th>
                                            <th>Name</th>
                                            <th>Spoke Person</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Created Date</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($colleges as $key => $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->spokesperson }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->mobile }}</td>
                                                <td>{{ date_format($value->created_at, 'd-m-Y') }}</td>
                                                <td>
                                                    <a href="{{ url('/college/edit/'.$value->id) }}"> <i class="nav-icon fas fa-edit" title="Update College"></i> </a>&nbsp;&nbsp;

                                                    <a href="#" data-toggle="modal" data-target="#myModal_{{$loop->iteration}}" data-bs-toggle="modal" data-bs-target="#myModal_{{$loop->iteration}}" class="text-danger"> <i class="nav-icon fas fa-trash" title="Delete College"></i></a>
                                                    <!-- Delete modal -->
                                                    <div id="myModal_{{$loop->iteration}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalCenterTitle">College</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p class="mb-0 text-danger">Are you sure you want to delete of  {{ucfirst($value->name)}} records. </p>
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
                                {{$colleges->withQueryString()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
