<!-- == Start Header Wrapper == -->
  <header class="header-area transparent">
    <div class="container">
      <div class="row no-gutter align-items-center position-relative">
        <div class="col-12">
		
		@include('partials.common-header-menu')
		
          <!--<div class="header-align">
            <div class="header-align-start">
              <div class="header-logo-area">
                <a href="{{ url('/') }}">
                  <img class="logo-main" src="{{ asset('public/img/logo-light.png') }}" alt="Logo" />
                  <img class="logo-light" src="{{ asset('public/img/logo-light.png') }}" alt="Logo" />
                </a>
              </div>
            </div>
            <div class="header-align-center">
              <div class="header-navigation-area position-relative">
                <ul class="main-menu nav">

					<li><a href="{{ url('/') }}"><span>Home</span></a></li>

					<li><a href="{{ url('/jobs') }}"><span>Jobs</span></a></li>

					<li><a href="{{ url('/employers-details') }}"><span>Employers Details</span></a></li>

					<li><a href="{{ url('/blog') }}"><span>Blog</span></a></li>

					<li><a href="{{ url('/about-us') }}"><span>About Us</span></a></li>

					<li><a href="{{ url('/contact-us') }}"><span>Contact Us</span></a></li>
											
					@if(empty(session('login_user_data')[0]['id']) )
					<li><a href="{{ url('/login') }}"><span>Login</span></a></li>
					@else
						
						@if(session('login_user_data')[0]['user_type']=='1')
							<li class="has-submenu"><a href="#/"><span>My Account</span></a>
								<ul class="submenu-nav">
								  <li><a href="{{ url('/candidate-details/'.session('login_user_data')[0]['id']) }}"><span>Profile</span></a></li>
								  <li><a href="job-details.html"><span>Job Listing</span></a></li>
								  <li><a href="{{ url('/logout') }}"><span>Logout</span></a></li>
								</ul>
							</li>
						@elseif(session('login_user_data')[0]['user_type']=='2')
							<li class="has-submenu"><a href="#/"><span>My Account</span></a>
								<ul class="submenu-nav">
								  <li><a href="{{ url('/employers-details/'.session('login_user_data')[0]['id']) }}"><span>Profile</span></a></li>
								  <li><a href="{{ url('/employers-jobs-list/'.session('login_user_data')[0]['id']) }}"><span>All Jobs</span></a></li>
								  <li><a href="{{ url('/post-new-job/'.session('login_user_data')[0]['id']) }}"><span>Post New Job</span></a></li>
								  <li><a href="{{ url('/logout') }}"><span>Logout</span></a></li>
								</ul>
							</li>

						@endif
					@endif
					!--<li><a href="{{ url('/registration') }}"><span>Registration</span></a></li>--

                  !--<li class="has-submenu"><a href="#/"><span>Find Jobs</span></a>
                    <ul class="submenu-nav">
                      <li><a href="job.html"><span>Jobs</span></a></li>
                      <li><a href="job-details.html"><span>Job Details</span></a></li>
                    </ul>
                  </li>--

                  !--<li class="has-submenu"><a href="#/"><span>Candidates</span></a>
                    <ul class="submenu-nav">
                      <li><a href="candidate.html"><span>Candidates</span></a></li>
                      <li><a href="candidate-details.html"><span>Candidate Details</span></a></li>
                    </ul>
                  </li>--

                  !--<li class="has-submenu"><a href="#/"><span>Blog</span></a>
                    <ul class="submenu-nav">
                      <li><a href="blog-grid.html">Blog Grid</a></li>
                      <li><a href="{{ url('/blog')}}">Blog Left Sidebar</a></li>
                      <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                      <li><a href="{{ url('/blog-details') }}">Blog Details</a></li>
                    </ul>
                  </li>--

                  --<li class="has-submenu"><a href="#/"><span>Pages</span></a>
                    <ul class="submenu-nav">
                      <li><a href="about-us.html"><span>About us</span></a></li>
                      <li><a href="{{ url('/login') }}"><span>Login</span></a></li>
                      <li><a href="{{ url('/registration') }}"><span>Registration</span></a></li>
                      <li><a href="page-not-found.html"><span>Page Not Found</span></a></li>
                    </ul>
                  </li>--

                </ul>
              </div>
            </div>

            !--<div class="header-align-end">
              <div class="header-action-area">
                <a class="btn-registration" href="{{ url('/registration') }}"><span>+</span> Registration</a>
                <button class="btn-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                  <i class="icofont-navigation-menu"></i>
                </button>
              </div>
            </div>--

          </div>-->
        </div>
      </div>
    </div>
  </header>
  <!-- == End Header Wrapper == -->