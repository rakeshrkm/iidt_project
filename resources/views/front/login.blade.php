@extends('front.layouts.master', ['title' => 'Student Login'])  
@section('contents')  
  <link rel="stylesheet" href="{{ asset('front/assets/css/login.css') }}">
    <div class="main-bg">
        <div class="container pt-5 pb-5">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card shadow">
                  <div class="card-title text-center border-bottom">
                    <h2 class="p-3">Login</h2>
                  </div>
                  <div class="card-body">
                    <form method="post" action="{{ route('authentication') }}">
                      @csrf
                      <div class="mb-4">
                        <input type="text" name="email" class="form-control" id="email"  placeholder="Enter Email" />
                        @error('email')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-4">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" />
                        @error('password')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-4">
                        <input type="checkbox" class="form-check-input" id="remember" />
                        <label for="remember" class="form-label">Remember Me</label>
                      </div>
                      <div class="mb-4">
                        <div class="g-recaptcha mt-2" data-sitekey={{ env('RECAPTCHA_SITE_KEY') }}>

                        </div>
                        @if ($errors->has('g-recaptcha-response'))
                        <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                        @endif
                      </div>

                      <div class="d-grid">
                        <button type="submit" class="btn">Login</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection