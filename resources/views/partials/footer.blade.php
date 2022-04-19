<!--== Start Footer Area Wrapper ==-->
  <footer class="footer-area">
    <!--== Start Footer Top ==--
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
    !--== End Footer Top ==-->

    <!--== Start Footer Main ==-->
    <div class="footer-main">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <div class="widget-item widget-about">
              <div class="widget-logo-area">
                <a href="{{ url('/') }}">
                  <img class="logo-main" src="{{ asset('public/img/bvc-logo.png') }}" alt="Logo" />
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
              <div class="col-md-4 col-lg-4">
                <div class="widget-item nav-menu-item1">
                  <h4 class="widget-title">Company</h4>
                  <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#widgetId-1">Company</h4>
                  <div id="widgetId-1" class="collapse widget-collapse-body">
                    <div class="collapse-body">
                      <div class="widget-menu-wrap">
                        <ul class="nav-menu">
                          <li><a href="{{ url('/about-us') }}">About Us</a></li>                        
                          <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
						  <li><a href="{{ url('/contact-us') }}">Our Partners</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-lg-4">
                <div class="widget-item nav-menu-item2">
                  <h4 class="widget-title">Resources</h4>
                  <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#widgetId-2">Resources</h4>
                  <div id="widgetId-2" class="collapse widget-collapse-body">
                    <div class="collapse-body">
                      <div class="widget-menu-wrap">
                        <ul class="nav-menu">
                          <!--<li><a href="account-{{ url('/login') }}">Quick Links</a></li>
                          <li><a href="job.html">Job Packages</a></li>-->
                          <li><a href="{{ url('/login') }}">Post New Job</a></li>
                          <li><a href="{{ url('/jobs') }}">Jobs Listing</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--<div class="col-md-3 col-lg-3">
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
              </div>-->
              <div class="col-md-4 col-lg-4">
                <div class="widget-item nav-menu-item4">
                  <h4 class="widget-title">Products</h4>
                  <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#widgetId-4">Products</h4>
                  <div id="widgetId-4" class="collapse widget-collapse-body">
                    <div class="collapse-body">
                      <div class="widget-menu-wrap">
                        <ul class="nav-menu">
                          <li><a href="account-{{ url('/login') }}">Star a Trial</a></li>
                          <li><a href="#how-it-work">How It Works</a></li>
                          <!--<li><a href="account-{{ url('/login') }}">Features</a></li>
                          <li><a href="{{ url('/about-us') }}">Price & Planing</a></li>-->
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
              <p class="copyright">© 2021 {{ env('MY_SITE_NAME') }}. Made with <i class="icofont-heart"></i> by {{ env('MY_SITE_AUTHOR') }}.</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Footer Bottom ==-->
  </footer>
  <!--== End Footer Area Wrapper ==-->
  
  
  <!--== Scroll Top Button ==-->
  <div id="scroll-to-top" class="scroll-to-top"><span class="icofont-rounded-up"></span></div>

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
              <li><a href="{{ url('/about-us') }}">About us</a></li>
              <li><a href="{{ url('/login') }}">Login</a></li>
              <li><a href="{{ url('/registration') }}">Registration</a></li>
              <li><a href="page-not-found.html">Page Not Found</a></li>
            </ul>
          </li>
          <li><a href="{{ url('/contact-us') }}">Contact</a></li>
        </ul>
      </div>
      <!-- Mobile Menu End -->
    </div>
  </aside>
  <!--== End Aside Menu ==-->
  
  <script type="text/javascript">
  
	$(document).ready(function(){
		
		$('.apply_now_class').click(function(){
			
			var job_id=$(this).attr('id');
			console.log(job_id);
			
			$.ajax({
				url: "{{url('apply-job-by-candidate')}}", 
				type: "POST",  
				data:{
					job_id:job_id,
					_token: '{{csrf_token()}}'
				},
				success:function(result){
					
					console.log(result);
					
					if(result=='Login'){
						
						window.location.href = "{{url('/login')}}";
						
					} else if(result=='AlreadyApplied'){
						
						swal("Sorry! You have already applied for this job...", {
						  icon: "error",
						});
						
					} else if(result=='Applied'){
						
						swal("Wow! Successfully applied for this job.", {
						  icon: "success",
						});
						
					}
										
			   }  

			});
			
		});
	});
	
  </script>
  
  