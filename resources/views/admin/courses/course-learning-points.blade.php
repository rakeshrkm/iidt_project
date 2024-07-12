@extends('admin.layouts.master')
@section('title', 'Add Course')
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
                            {{ Breadcrumbs::render('courses_create') }}
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
                        <h5>Course Leaning Points</h5>
                    </div>
                    <div class="card-body">
                      
                        <div class="row">
                            <div class="col-md-6">
                                <form method="post" action="{{ route('courses.savelearningpoints') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="course_name">Course Name</label>
                                        
                                        <select class="form-control" id="course_id" name="course_id">
                                            <option value=" "> -- Select Course -- </option>
                                            @foreach($data as $key => $value)
                                                <option value="{{ $value->id}}"> {{ $value->course_name }}</option>
                                            @endforeach
                                        </select>
                                        
                                        @if($errors->has('course_id'))
                                            <small id="error" class="form-text text-muted text-danger">{{ $errors->first('course_name') }}</small>
                                        @endif
                                    </div>

                                    
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="learing points">Learning Point</label>
                                    <textarea type="text" class="form-control" name="learning_point"  value="{{ old('learning_point') }}" id="editor" placeholder="Enter Learning Point"></textarea>
                                    @if($errors->has('learning_point'))
                                        <small id="error" class="form-text text-muted text-danger">{{ $errors->first('learning_point') }}</small>
                                    @endif
                                </div>
                                    <button type="submit" class="btn  btn-primary float-right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/ckeditor.js') }}"></script>
@endsection
