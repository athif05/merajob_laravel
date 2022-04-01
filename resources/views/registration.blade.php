@extends("layouts.master")

@section("title")

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ env('MY_SITE_NAME') }}"/>
    <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive"/>
    <meta name="author" content="{{ env('MY_SITE_AUTHOR') }}"/>

    <title>Registration | {{ env('MY_SITE_NAME') }}</title>

@endsection


@section("content")

  <main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="{{ asset('public/img/photos/sl1.jpg')}}">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title">Register Page</h2>
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
          <div class="col-md-10 col-lg-7 col-xl-6">
            <div class="login-register-form-wrap register-form-wrap">
              <div class="login-register-form">
                <div class="form-title">
                  <h4 class="title">Register Now</h4>
                </div>
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="candidate-tab" data-bs-toggle="pill" data-bs-target="#candidate" type="button" role="tab" aria-controls="candidate" aria-selected="true"><i class="icofont-businessman"></i> Candidate</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="employer-tab" data-bs-toggle="pill" data-bs-target="#employer" type="button" role="tab" aria-controls="employer" aria-selected="false"><i class="icofont-bag-alt"></i> Employer</button>
                  </li>
                </ul>
				
				@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="candidate" role="tabpanel" aria-labelledby="candidate-tab">
                    <form action="{{ route('registration.store') }}" method="post">
                      @csrf
					  
					  <input type="hidden" placeholder="Name" name="user_type" value="1">
					  
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                            <input class="form-control" type="text" placeholder="Name" name="name" value="{{old('name')}}">
                            @if ($errors->has('name'))
                              <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                          </div>
                        </div>
						<div class="col-12">
                          <div class="form-group">
                            <input class="form-control" type="text" placeholder="Number" name="mobile_number" value="{{old('mobile_number')}}">
                            @if ($errors->has('mobile_number'))
                                <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
                           @endif
                          </div>
                        </div>
						<div class="col-12">
                          <div class="form-group">
                            <input class="form-control" type="text" placeholder="Email" name="email" value="{{old('email')}}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                           @endif
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <input class="form-control" type="password" placeholder="Password" autocomplete="off" name="password" value="{{old('password')}}">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <input class="form-control" type="password" placeholder="Confirm Password" name="confirm_password">
							@if ($errors->has('confirm_password'))
                                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <div class="remember-forgot-info">
                              <div class="remember">
                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="privacy_policy">
                                <label class="form-check-label" for="defaultCheck1">Aaccept our terms and conditions and privacy policy.</label>
								@if ($errors->has('privacy_policy'))
									<span class="text-danger">{{ $errors->first('privacy_policy') }}</span>
								@endif
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <input type="submit" name="submit" value="Register Now" class="btn-theme">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="employer" role="tabpanel" aria-labelledby="employer-tab">
                    <form  action="{{ route('registration.store_employer') }}" method="post">
                      @csrf
					
						<input type="hidden" placeholder="Name" name="user_type" value="2">
					
                      <div class="row">
						<div class="col-12">
                          <div class="form-group">
                            <input class="form-control" type="text" placeholder="Name" name="name_emp" value="{{old('name_emp')}}">
                            @if ($errors->has('name_emp'))
                              <span class="text-danger">{{ $errors->first('name_emp') }}</span>
                            @endif
                          </div>
                        </div>
						<div class="col-12">
                          <div class="form-group">
                            <input class="form-control" type="text" placeholder="Number" name="mobile_number_emp" value="{{old('mobile_number_emp')}}">
                            @if ($errors->has('mobile_number_emp'))
                                <span class="text-danger">{{ $errors->first('mobile_number_emp') }}</span>
                           @endif
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <input class="form-control" type="email" placeholder="Email" name="email_emp" value="{{old('email_emp')}}">
							@if ($errors->has('email_emp'))
                                <span class="text-danger">{{ $errors->first('email_emp') }}</span>
                           @endif
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
							<input class="form-control" type="password" placeholder="Password" autocomplete="off" name="password_emp" value="{{old('password_emp')}}">
                            @if ($errors->has('password_emp'))
                                <span class="text-danger">{{ $errors->first('password_emp') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
							<input class="form-control" type="password" placeholder="Confirm Password" name="confirm_password_emp">
							@if ($errors->has('confirm_password_emp'))
                                <span class="text-danger">{{ $errors->first('confirm_password_emp') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <div class="remember-forgot-info">
                              <div class="remember">								
								<input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="privacy_policy_emp">
                                <label class="form-check-label" for="defaultCheck1">Aaccept our terms and conditions and privacy policy.</label>
								@if ($errors->has('privacy_policy_emp'))
									<span class="text-danger">{{ $errors->first('privacy_policy_emp') }}</span>
								@endif
								
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <input type="submit" name="submit" value="Register Now" class="btn-theme">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="login-register-form-info">
                  <p>Already have an account? <a href="{{ url('/login') }}">Login</a></p>
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
