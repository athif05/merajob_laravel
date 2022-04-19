<div class="header-align">
            <div class="header-align-start">
              <div class="header-logo-area">
                <a href="{{ url('/') }}">
                  <img class="logo-main" src="{{ asset('public/img/bvc-logo.png') }}" alt="Logo" />
                  <img class="logo-light" src="{{ asset('public/img/logo-light.png') }}" alt="Logo" />
                </a>
              </div>
            </div>
            <div class="header-align-center">
              <div class="header-navigation-area position-relative">
                <ul class="main-menu nav">

					<li><a href="{{ url('/') }}"><span>Home</span></a></li>

					<li><a href="{{ url('/jobs') }}"><span>Jobs</span></a></li>

					<!--<li><a href="{{ url('/employers-details') }}"><span>Employers Details</span></a></li>-->

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
								  <li><a href="{{ url('/candidate-jobs-list/'.session('login_user_data')[0]['id']) }}"><span>Job Listing</span></a></li>
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
					<!--<li><a href="{{ url('/registration') }}"><span>Registration</span></a></li>-->

                </ul>
              </div>
            </div>

          </div>