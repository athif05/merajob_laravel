<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from template.hasthemes.com/finate/finate/page-not-found.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Nov 2021 10:27:53 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ env('MY_SITE_NAME') }}"/>
    <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive"/>
    <meta name="author" content="{{ env('MY_SITE_AUTHOR') }}"/>

    <title>Page Not Found :: {{ env('MY_SITE_NAME') }}</title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="{{ asset('public/img/favicon.ico')}}" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&amp;display=swap" rel="stylesheet">


    <!--== Bootstrap CSS ==-->
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--== Icofont Icon CSS ==-->
    <link href="{{ asset('public/css/icofont.css') }}" rel="stylesheet" />
    <!--== Swiper CSS ==-->
    <link href="{{ asset('public/css/swiper.min.css') }}" rel="stylesheet" />
    <!--== Fancybox Min CSS ==-->
    <link href="{{ asset('public/css/fancybox.min.css') }}" rel="stylesheet" />
    <!--== Aos Min CSS ==-->
    <link href="{{ asset('public/css/aos.min.css') }}" rel="stylesheet" />

    <!--== Main Style CSS ==-->
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet" />
</head>

<body>

<!--wrapper start-->
<div class="wrapper">
  
  <!--== Start Header Wrapper ==-->
  <header class="header-area transparent">
    <div class="container">
      <div class="row no-gutter align-items-center position-relative">
        <div class="col-12">
          <div class="header-align">
            <div class="header-align-start">
              <div class="header-logo-area">
                <a href="{{ url('/') }}">
                  <img class="logo-main" src="assets/img/logo-light.png" alt="Logo" />
                  <img class="logo-light" src="assets/img/logo-light.png" alt="Logo" />
                </a>
              </div>
            </div>
            <div class="header-align-center">
              <div class="header-navigation-area position-relative">
                <ul class="main-menu nav">
                  <li><a href="{{ url('/') }}"><span>Home</span></a></li>
                  <li class="has-submenu"><a href="#/"><span>Find Jobs</span></a>
                    <ul class="submenu-nav">
                      <li><a href="job.html"><span>Jobs</span></a></li>
                      <li><a href="job-details.html"><span>Job Details</span></a></li>
                    </ul>
                  </li>
                  <li><a href="employers-details.html"><span>Employers Details</span></a></li>
                  <li class="has-submenu"><a href="#/"><span>Candidates</span></a>
                    <ul class="submenu-nav">
                      <li><a href="candidate.html"><span>Candidates</span></a></li>
                      <li><a href="candidate-details.html"><span>Candidate Details</span></a></li>
                    </ul>
                  </li>
                  <li class="has-submenu"><a href="#/"><span>Blog</span></a>
                    <ul class="submenu-nav">
                      <li><a href="blog-grid.html">Blog Grid</a></li>
                      <li><a href="{{ url('/blog')}}">Blog Left Sidebar</a></li>
                      <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                      <li><a href="{{ url('/blog-details') }}">Blog Details</a></li>
                    </ul>
                  </li>
                  <li class="has-submenu"><a href="#/"><span>Pages</span></a>
                    <ul class="submenu-nav">
                      <li><a href="about-us.html"><span>About us</span></a></li>
                      <li><a href="{{ url('/login') }}"><span>Login</span></a></li>
                      <li><a href="{{ url('/registration') }}"><span>Registration</span></a></li>
                      <li><a href="page-not-found.html"><span>Page Not Found</span></a></li>
                    </ul>
                  </li>
                  <li><a href="contact.html"><span>Contact</span></a></li>
                </ul>
              </div>
            </div>
            <div class="header-align-end">
              <div class="header-action-area">
                <a class="btn-registration" href="{{ url('/registration') }}"><span>+</span> Registration</a>
                <button class="btn-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                  <i class="icofont-navigation-menu"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!--== End Header Wrapper ==-->
  
  <main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/photos/sl1.jpg">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title">404_Error</h2>
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

    <!--== Start Faq Area Wrapper ==-->
    <section class="page-not-found-area">
      <div class="container pt--0 pb--0">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="page-not-found-wrap">
              <div class="page-not-found-thumb">
                <img src="assets/img/photos/404.png" alt="Image">
              </div>
              <div class="page-not-found-content">
                <h2 class="title">Sorry, this page is not found.</h2>
                <a class="btn-theme" href="{{ url('/') }}"><i class="icofont-long-arrow-left"></i> Back to home</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Faq Area Wrapper ==-->
  </main>

  <!--== Start Footer Area Wrapper ==-->
  <footer class="footer-area">
    <!--== Start Footer Top ==-->
    <div class="footer-top">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-lg-5">
            <div class="footer-newsletter-content">
              <h4 class="title">Subscribe for everyday job newsletter.</h4>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="footer-newsletter-form">
              <form action="#">
                <input type="email" placeholder="Enter your email">
                <button type="submit" class="btn-newsletter">Subscribe Now</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Footer Top ==-->

    <!--== Start Footer Main ==-->
    <div class="footer-main">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <div class="widget-item widget-about">
              <div class="widget-logo-area">
                <a href="{{ url('/') }}">
                  <img class="logo-main" src="assets/img/logo-light-theme.png" alt="Logo" />
                </a>
              </div>
              <p class="desc">That necessitat ecommerce platform that optimi your store popularised the release</p>
              <div class="social-icons">
                <a href="https://www.facebook.com/" target="_blank" rel="noopener"><i class="icofont-facebook"></i></a>
                <a href="https://www.skype.com/" target="_blank" rel="noopener"><i class="icofont-skype"></i></a>
                <a href="https://twitter.com/" target="_blank" rel="noopener"><i class="icofont-twitter"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="row">
              <div class="col-md-3 col-lg-3">
                <div class="widget-item nav-menu-item1">
                  <h4 class="widget-title">Company</h4>
                  <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#widgetId-1">Company</h4>
                  <div id="widgetId-1" class="collapse widget-collapse-body">
                    <div class="collapse-body">
                      <div class="widget-menu-wrap">
                        <ul class="nav-menu">
                          <li><a href="about-us.html">About Us</a></li>
                          <li><a href="about-us.html">Why Extobot</a></li>
                          <li><a href="contact.html">Contact With Us</a></li>
                          <li><a href="contact.html">Our Partners</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="widget-item nav-menu-item2">
                  <h4 class="widget-title">Resources</h4>
                  <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#widgetId-2">Resources</h4>
                  <div id="widgetId-2" class="collapse widget-collapse-body">
                    <div class="collapse-body">
                      <div class="widget-menu-wrap">
                        <ul class="nav-menu">
                          <li><a href="account-{{ url('/login') }}">Quick Links</a></li>
                          <li><a href="job.html">Job Packages</a></li>
                          <li><a href="job.html">Post New Job</a></li>
                          <li><a href="job.html">Jobs Listing</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="widget-item nav-menu-item3">
                  <h4 class="widget-title">Legal</h4>
                  <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#widgetId-3">Legal</h4>
                  <div id="widgetId-3" class="collapse widget-collapse-body">
                    <div class="collapse-body">
                      <div class="widget-menu-wrap">
                        <ul class="nav-menu">
                          <li><a href="account-{{ url('/login') }}">Affiliate</a></li>
                          <li><a href="{{ url('/blog')}}">Blog</a></li>
                          <li><a href="account-{{ url('/login') }}">Help & Support</a></li>
                          <li><a href="job.html">Careers</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="widget-item nav-menu-item4">
                  <h4 class="widget-title">Products</h4>
                  <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#widgetId-4">Products</h4>
                  <div id="widgetId-4" class="collapse widget-collapse-body">
                    <div class="collapse-body">
                      <div class="widget-menu-wrap">
                        <ul class="nav-menu">
                          <li><a href="account-{{ url('/login') }}">Star a Trial</a></li>
                          <li><a href="about-us.html">How It Works</a></li>
                          <li><a href="account-{{ url('/login') }}">Features</a></li>
                          <li><a href="about-us.html">Price & Planing</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Footer Main ==-->

    <!--== Start Footer Bottom ==-->
    <div class="footer-bottom">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="footer-bottom-content">
              <p class="copyright">© 2021 Finate. Made with <i class="icofont-heart"></i> by <a target="_blank" href="https://themeforest.net/user/codecarnival">Codecarnival.</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Footer Bottom ==-->
  </footer>
  <!--== End Footer Area Wrapper ==-->

  <!--== Start Aside Menu ==-->
  <aside class="off-canvas-wrapper offcanvas offcanvas-start" tabindex="-1" id="AsideOffcanvasMenu" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h1 class="d-none" id="offcanvasExampleLabel">Aside Menu</h1>
      <button class="btn-menu-close" data-bs-dismiss="offcanvas" aria-label="Close">menu <i class="icofont-simple-left"></i></button>
    </div>
    <div class="offcanvas-body">
      <!-- Mobile Menu Start -->
      <div class="mobile-menu-items">
        <ul class="nav-menu">
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="#">Find Jobs</a>
            <ul class="sub-menu">
              <li><a href="job.html">Jobs</a></li>
              <li><a href="job-details.html">Job Details</a></li>
            </ul>
          </li>
          <li><a href="employers-details.html">Employers Details</a></li>
          <li><a href="#">Candidates</a>
            <ul class="sub-menu">
              <li><a href="candidate.html">Candidates</a></li>
              <li><a href="candidate-details.html">Candidate Details</a></li>
            </ul>
          </li>
          <li><a href="#">Blog</a>
            <ul class="sub-menu">
              <li><a href="blog-grid.html">Blog Grid</a></li>
              <li><a href="{{ url('/blog')}}">Blog Left Sidebar</a></li>
              <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
              <li><a href="{{ url('/blog-details') }}">Blog Details</a></li>
            </ul>
          </li>
          <li><a href="#">Pages</a>
            <ul class="sub-menu">
              <li><a href="about-us.html">About us</a></li>
              <li><a href="{{ url('/login') }}">Login</a></li>
              <li><a href="{{ url('/registration') }}">Registration</a></li>
              <li><a href="page-not-found.html">Page Not Found</a></li>
            </ul>
          </li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </div>
      <!-- Mobile Menu End -->
    </div>
  </aside>
  <!--== End Aside Menu ==-->
</div>

<!--=======================Javascript============================-->

<!--=== jQuery Modernizr Min Js ===-->
<script src="{{ asset('public/js/modernizr.js') }}"></script>
<!--=== jQuery Min Js ===-->
<script src="{{ asset('public/js/jquery-main.js') }}"></script>
<!--=== jQuery Migration Min Js ===-->
<script src="{{ asset('public/js/jquery-migrate.js') }}"></script>
<!--=== jQuery Popper Min Js ===-->
<script src="{{ asset('public/js/popper.min.js') }}"></script>
<!--=== jQuery Bootstrap Min Js ===-->
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
<!--=== jQuery Swiper Min Js ===-->
<script src="{{ asset('public/js/swiper.min.js') }}"></script>
<!--=== jQuery Fancybox Min Js ===-->
<script src="{{ asset('public/js/fancybox.min.js') }}"></script>
<!--=== jQuery Aos Min Js ===-->
<script src="{{ asset('public/js/aos.min.js') }}"></script>
<!--=== jQuery Counterup Min Js ===-->
<script src="{{ asset('public/js/counterup.js') }}"></script>
<!--=== jQuery Waypoint Js ===-->
<script src="{{ asset('public/js/waypoint.js') }}"></script>

<!--=== jQuery Custom Js ===-->
<script src="{{ asset('public/js/custom.js') }}"></script>

</body>


<!-- Mirrored from template.hasthemes.com/finate/finate/page-not-found.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Nov 2021 10:27:54 GMT -->
</html>