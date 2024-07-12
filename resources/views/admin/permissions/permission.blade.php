@extends('admin.layouts.master')
@section('title', 'Permission')
@section('content')
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Permission</h5>
                        </div>
                        <ul class="breadcrumb">
                            {{-- {{ Breadcrumbs::render('courses_create') }} --}}
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
                        <h5>Permission</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <form action="{{ route('permissions.store') }}" method="post">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Role Name</label>
                                                <select class="form-control" name="role_id" id="inputStatus">
                                                    <option value=""> -- Select Role -- </option>
                                                    @foreach($roles as $key => $value)
                                                        <option value="{{$value->id}}"> {{ ucfirst($value->name) }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group" id="checkboxInput" style="height: 400px; overflow-y: scroll;">
                                                <label for="inputName">Route Name </label></br>
                                                @error('route_name')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-success float-right">Submit</button>
                        </form>
                           
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
<script>
       $('#inputStatus').change(function() {
        var roleId = $(this).val(); 

        $.ajax({
            url: "{{ route('permissions.fetch') }}",
            type: "GET",
            data: { role_id: roleId },
            success: function(response) {
                var routes = response.routes;
                // console.log(routes);
                var resultData = response.data;
                // var resultData = response.data.route_name;
                $('#checkboxInput').empty();
                // if(resultData.length > 0){
                    routes.forEach(function(route) {
                        var checked = '';
                        if (resultData) {
                            var checked = resultData.route_name.includes(route.route_name) ? 'checked' : ''; // Check if route_name is present in resultData
                        }
                        $('#checkboxInput').append(`<input type="checkbox" name="route_name[]" value="${route.route_name}" ${checked}> <span class="text-bold">${route.name}<span><br/>`);
                    });
                // } else {
                //     $('#checkboxInput').html('<option>No data available.</option>');
                // }
            },
            error: function(xhr) {
                console.log(xhr.responseText); // Log any errors for debugging
            }
        });
    });
    </script>
@endsection

@endsection
