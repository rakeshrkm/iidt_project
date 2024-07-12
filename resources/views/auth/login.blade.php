<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
	<title>Login Page </title>
	{{-- <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> --}}
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<img src="{{ asset('assets/images/logo.png')}}" alt="" class="img-fluid mb-4">
		<div class="card borderless">
			<div class="row align-items-center">
				<div class="col-md-12">
					<div class="card-body">
                        <form action="{{route('authenticate-user')}}" method="post">
                            @csrf
                            <h4 class="mb-3 f-w-400">Sign in</h4>
                            <hr>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="email" id="Email" placeholder="Email address">
                                @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                         
                            <div class="form-group mb-4">
                                <input type="password" name="password" class="form-control" id="Password" placeholder="Password">
                                @error('password')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div id="captcha">
                                    <span>{!! captcha_img('math') !!}</span>
                                    <button type="button" class="btn btn-danger" id="reload">
                                        ↻
                                    </button>
                                </div>
                                <div class="mt-2"></div>
                                <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha" required>
                                @error('captcha')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button class="btn btn-block btn-primary mb-4" type="submit">Signin</button>
                            
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Required Js -->
<script src="{{asset('assets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/pcoded.min.js')}}"></script>

<script>
     $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: "{{ route('reload-captcha') }}",
            success: function (data) {
                console.log('hi');
                console.log(data);
                $("#captcha span").html(data.captcha);
            }
        });
    });
</script>
</body>
</html>
