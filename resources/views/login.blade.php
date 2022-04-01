@extends("layouts.master")

@section("title")

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ env('MY_SITE_NAME') }}"/>
    <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive"/>
    <meta name="author" content="{{ env('MY_SITE_AUTHOR') }}"/>

    <title>Login | {{ env('MY_SITE_NAME') }}</title>

@endsection


@section("content")

  <main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="{{ asset('public/img/photos/sl1.jpg')}}">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title">Login</h2>
              <nav class="breadcrumb-area">
                <ul class="breadcrumb justify-content-center">
                  <li><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>Pages</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Login Area Wrapper ==-->
    <section class="account-login-area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-7 col-xl-6">
            <div class="login-register-form-wrap">
              <div class="login-register-form">
                <div class="form-title">
                  <h4 class="title">Sign In</h4>
                </div>

                @if(session()->has('failer'))
                    <div class="alert alert-danger text-center">
                        {{ session()->get('failer') }}
                    </div>
                @endif
				
				@if(session()->has('verified_account'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('verified_account') }}
                    </div>
                @endif

                <form action="{{ route('login.index') }}" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <input class="form-control" type="text" name="user_name" placeholder="Mobile Number/Email ID" value="{{old('user_name')}}">
						@if ($errors->has('user_name'))
						  <span class="text-danger">{{ $errors->first('user_name') }}</span>
						@endif
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password">
						@if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <div class="remember-forgot-info">
                          <div class="remember">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">Remember me</label>
                          </div>
                          <div class="forgot-password">
                            <a href="#/">Forgot Password?</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
						<input type="submit" name="submit" value="Sign In" class="btn-theme">
                      </div>
                    </div>
                  </div>
                </form>
                <div class="login-register-form-info">
                  <p>Don't you have an account? <a href="{{ url('/registration') }}">Register</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Login Area Wrapper ==-->
  </main>

@endsection
