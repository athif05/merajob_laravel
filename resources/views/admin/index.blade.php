<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin | {{ env('MY_SITE_NAME') }}</title>

  <!--== Favicon ==-->
  <link rel="shortcut icon" href="{{ asset('resources/views/admin/images/favicon.png')}}" />

  <!-- base:css -->
  <link rel="stylesheet" href="{{ asset('resources/views/admin/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{ asset('resources/views/admin/vendors/css/vendor.bundle.base.css')}}">

  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('resources/views/admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
                <img src="{{ asset('resources/views/admin/images/bvc-logo.png')}}" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>

              @if(session()->has('failer'))
                <div class="alert alert-danger text-center">
                  {{ session()->get('failer') }}
                </div>
              @endif

              <form class="pt-3" action="{{ route('login.admin') }}" method="post">
              @csrf

                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" @if(Cookie::has('emailAdmin')) value="{{ Cookie::get('emailAdmin')}}" @else value="{{ old('email') }}" @endif>
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password"  @if(Cookie::has('passwordAdmin')) value="{{ Cookie::get('passwordAdmin')}}" @endif>
                </div>
                <div class="mt-3">
                  <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN IN</a> -->
                  <input type="submit" name="submit" value="Sign In" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" name="remember_me" id="remember_me" class="form-check-input"  @if(Cookie::has('emailAdmin')) checked @endif>
                      Keep me signed in
                    </label>
                  </div>
                  <!-- <a href="#" class="auth-link text-black">Forgot password?</a> -->
                </div>
                
                <!-- <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div> -->
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="{{ asset('resources/views/admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('resources/views/admin/js/off-canvas.js')}}"></script>
  <script src="{{ asset('resources/views/admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('resources/views/admin/js/template.js')}}"></script>
  <script src="{{ asset('resources/views/admin/js/settings.js')}}"></script>
  <script src="{{ asset('resources/views/admin/js/todolist.js')}}"></script>
  <!-- endinject -->
</body>

</html>
