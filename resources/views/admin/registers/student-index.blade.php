@extends('admin.layouts.master')
@section('title', 'Students Lists')
@section('content')
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Students</h5>
                        </div>
                        <ul class="breadcrumb">
                            {{ Breadcrumbs::render('registers') }}
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
                                @foreach($genders as $key => $value)
                                    <option value="{{ $value}}" {{ request('gender') == $value ? 'selected' : ''}}> {{  $value }}</option>
                                @endforeach
                            </select>
                            <select  id="college" name="college_id" style="height:27px;">
                                <option value=" "> -- Select College -- </option>
                                @foreach($colleges as $key => $value)
                                    <option value="{{ $value->id}}" {{ request('college_id') == $value->id ? 'selected' : ''}}> {{  $value->name }}</option>
                                @endforeach
                            </select>
                                <button type="submit" class="btn-sm btn-primary">Submit</button>
                            </form>
                        </div>
                        <a href="{{ route('registers.create') }}" class="btn btn-md btn-primary float-right">Add New Students</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

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
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Sr No. </th>
                                            <th>Name</th>
                                            <th>Pursusing Course</th>
                                          
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>College</th>
                                            <th>Created Date</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($studentRegisters as $key => $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->name}}</td>
                                                <td class="text-wrap">{{ $value->current_course }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->mobile }}</td>
                                                <td class="text-wrap">{{ isset($value->getCollegeDetail->name) ? $value->getCollegeDetail->name : '' }}</td>
                                                <td>{{ date_format($value->created_at, 'd-m-Y')  }}</td>
                                                <td>
                                                    <a href="{{ route('registers.edit', ['studentRegister' => $value->id]) }}" title="Update Student Record"> <i class="nav-icon fas fa-edit"></i> </a> &nbsp;&nbsp;
                                                    
                                                    <a href="{{ route('registers.show', ['studentRegister' => $value->id]) }}" title="View Details"><i class="nav-icon fas fa-eye"></i></a>&nbsp;&nbsp;
                                                    <a href="#" data-toggle="modal" data-target="#myModal_{{$loop->iteration}}" data-bs-toggle="modal" data-bs-target="#myModal_{{$loop->iteration}}" class="text-danger"> <i class="nav-icon fas fa-trash" title="Delete Student"></i></a>

                                                    <a href="{{ route('registers.credentials', ['studentRegister' => $value->id]) }}" title="Creare Credentials">Create Credentials</a>

                                                    <!-- Delete modal -->
                                                    <div id="myModal_{{$loop->iteration}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Student Record</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p class="mb-0 text-danger">Are you sure you want to delete of  {{ucfirst($value->name)}} records ? </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn  btn-secondary" data-dismiss="modal">No</button>
                                                                    <a href="{{ route('registers.destroy', ['studentRegister' => $value->id]) }}"><button type="button" class="btn  btn-primary">Yes</button></a>
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
                                {{$studentRegisters->withQueryString()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
