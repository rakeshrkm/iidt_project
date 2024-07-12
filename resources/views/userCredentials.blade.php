<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Credentials</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
         .wrapper {    
	margin-top: 80px;
	margin-bottom: 20px;
}

.form-signin {
  max-width: 420px;
  padding: 30px 38px 66px;
  margin: 0 auto;
  background-color: #eee;
  border: 3px dotted rgba(0,0,0,0.1);  
  }

.form-signin-heading {
  text-align:center;
  margin-bottom: 30px;
}

.form-control {
  position: relative;
  font-size: 16px;
  padding: 10px;

}

input[type="text"] {
  margin-bottom: 0px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;

}

input[type="password"] {
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  
}


.colorgraph {
  height: 7px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
    
    </style>
</head>
    <body>
        <div class ="container">
            <div class="wrapper">
                <form action="{{route('saveCredentials')}}" method="post" name="Login_Form" class="form-signin">   
                    @csrf    
                    <h3 class="form-signin-heading">Welcome ! Please Sign Up</h3>
                      <hr class="colorgraph"><br>
                      <div class="form-group">
                          <input type="email" class="form-control" name="email" placeholder="Email" value="{{$email}}" />
                          @error('email')
                            <small class="text-danger">{{ $message }}</small>
                          @enderror
                          <input type="hidden" class="form-control" name="id"  value="{{$id}}" />
                      
                          <input type="hidden" class="form-control" name="name"  value="{{$name}}" />

                      </div>

                      <div class="form-group">
                          <input type="password" class="form-control" name="password" placeholder="Password"  autofocus="" />
                          @error('password')
                          <small class="text-danger">{{ $message }}</small>
                          @enderror
                      </div>

                        <div class="form-group">
                            <input type="password" class="form-control confirm_password" name="password_confirmation" placeholder="Confirm Password"/>
                            @error('confirm_password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                      <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="submit">Login</button>  			
                </form>			
            </div>
        </div>
    </body>
</html>