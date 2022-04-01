@extends("layouts.master")

@section("title")

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ env('MY_SITE_NAME') }}"/>
    <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive"/>
    <meta name="author" content="{{ env('MY_SITE_AUTHOR') }}"/>

    <title>Employer Details | {{ env('MY_SITE_NAME') }}</title>
	
	<style>
		.recent-job-style3-item {
			background-color: #f4f7f7;
			padding: 1px 10px 10px!important;
		}
		
		.recent-job-item .main-content {
			margin: 10px 0 20px!important;
		}
	</style>
	
@endsection


@section("content")
	
	<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="{{ asset('public/img/photos/sl1.jpg')}}">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title">
				@if(empty($employer_details[0]['company_name']))
					@if(!empty(session('login_user_data')[0]['name']) ) {{ session('login_user_data')[0]['name'] }} @endif
				@else
					{{$employer_details[0]['company_name']}}
				@endif
			  </h2>
              <nav class="breadcrumb-area">
                <ul class="breadcrumb justify-content-center">
                  <li><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>Employers</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Employers Details Area Wrapper ==-->
    <section class="employers-details-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
		  
		  @if(session()->has('success'))
				<div class="alert alert-success">
					{{ session()->get('success') }}
				</div>
			@endif
			
            <div class="employers-details-wrap">
              <div class="employers-details-info">
                <div class="thumb">
				
				@if($employer_details[0]['company_logo'])
					<img src="{{asset('').$employer_details[0]['company_logo']}}" width="130" height="130" alt="{{$employer_details[0]['company_name']}}">
					@else
						<img src="{{ asset('public/img/companies/11.jpg')}}" width="130" height="130" alt="{{$employer_details[0]['company_name']}}">
						@endif
                </div>
                <div class="content">
                  <h4 class="title">{{$employer_details[0]['company_name']}}</h4>
                  <ul class="info-list">
                    <li><i class="icofont-location-pin"></i> {{$employer_details[0]['city_name']}}, INDIA</li>
                    <li><i class="icofont-phone"></i> {{$employer_details[0]['company_phone']}}</li>
                  </ul>
                  <!--<button type="button" class="btn-theme">Follow Us</button>-->
                  <button type="button" class="btn-theme btn-white">Add Review</button>
				  					  
				@if(!empty(session('login_user_data')[0]['id']) && (session('login_user_data')[0]['id']==$employer_details[0]['employer_id']))
				  @if(empty($employer_details[0]['employer_id']))
					 
				  <a href="{{ url('/employer-edit/'.session('login_user_data')[0]['id']) }}">
				@else
					
				  <a href="{{ url('/employer-edit/'.$employer_details[0]['employer_id']) }}">
					@endif
					  
				  
						<button type="button" class="btn-theme">Edit Profile</button>
				  </a>
				  @endif
                </div>
              </div>
              <div class="employers-counter">
                <div class="counter-item">
                  <h4 class="counter">{{$total_jobs}}</h4>
                  <h5 class="title">Total jobs</h5>
                </div>
                <div class="counter-item">
                  <h4 class="counter">27</h4>
                  <h5 class="title">Review</h5>
                </div>
                <div class="counter-item">
                  <h4 class="counter">452</h4>
                  <h5 class="title">Views</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-7 col-xl-8">
            <div class="employers-details-item">
              <div class="content">
                <h4 class="title">About Employers</h4>
                <p class="desc">{{$employer_details[0]['about_company']}}</p>
                <!--<ul class="employers-details-list">
                  <li><i class="icofont-check"></i> Developing custom themes (WordPress.org & ThemeForest Standards)</li>
                  <li><i class="icofont-check"></i> Creating reactive website designs</li>
                  <li><i class="icofont-check"></i> Working under strict deadlines</li>
                  <li><i class="icofont-check"></i> Develop page speed optimized themes</li>
                </ul>-->
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="content mb--0 pb-2">
                    <h4 class="title">Open Position</h4>
                  </div>
                </div>
				
				@foreach($job_lists as $job_list)
                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                  <!--== Start Recent Job Item ==-->
                  <div class="recent-job-item recent-job-style3-item">
                    <!--<div class="company-info">
                      <div class="logo">
                        <a href="{{ url('/company-details')}}"><img src="{{ asset('public/img/companies/w1.jpg')}}" width="75" height="75" alt="Image-HasTech"></a>
                      </div>
                      <div class="content mb--0">
                        <h4 class="name"><a href="{{ url('/company-details')}}">Darkento Ltd.</a></h4>
                        <p class="address">New York, USA</p>
                      </div>
                    </div>-->
                    <div class="main-content">
                      <h3 class="title"><a href="{{ url('/job-details/'.$job_list['employer_id'].'/'.$job_list['id'])}}">{{ $job_list['job_title'] }}</a></h3>
                      <h5 class="work-type">{{ $job_list['job_category_name'] }}</h5>
                      <p class="desc"><strong>Skills:</strong> {{ $job_list['skills'] }}</p>
                    </div>
                    <div class="recent-job-info">
                      <div class="salary">
                        <h4>{{ $job_list['salary'] }}</h4>
                        <p>/monthly</p>
                      </div>
					  	
						@if(!empty(session('login_user_data')[0]['id']) && (session('login_user_data')[0]['id']==$employer_details[0]['employer_id']))
						<a href="{{ url('/edit-post-job/'.$job_list['employer_id'].'/'.$job_list['id'])}}" target="_blank">
							Edit
						</a>
						@endif
						<a class="btn-theme btn-sm" href="{{ url('/job-details/'.$job_list['employer_id'].'/'.$job_list['id'])}}">Show Details</a>
						
                    </div>
                  </div>
                  <!--== End Recent Job Item ==-->
                </div>
				@endforeach
            
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-xl-4">
            <div class="employers-sidebar">
              <div class="widget-item">
                <div class="widget-title">
                  <h3 class="title">Information</h3>
                </div>
                <div class="summery-info">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="table-name">Categories</td>
                        <td class="dotted">:</td>
                        <td>{{$employer_details[0]['company_domains_name']}}</td>
                      </tr>
                      <tr>
                        <td class="table-name">Since</td>
                        <td class="dotted">:</td>
                        <td>{{$employer_details[0]['company_established_year']}}</td>
                      </tr>
                      <tr>
                        <td class="table-name">Views</td>
                        <td class="dotted">:</td>
                        <td>{{$employer_details[0]['company_views']}}+</td>
                      </tr>
                      <tr>
                        <td class="table-name">Reviews*</td>
                        <td class="dotted">:</td>
                        <td>(4.8) <span class="rating"></span></td>
                      </tr>
                      <tr>
                        <td class="table-name">Total Jobs</td>
                        <td class="dotted">:</td>
                        <td>{{$total_jobs}}+</td>
                      </tr>
                      <tr>
                        <td class="table-name">Location</td>
                        <td class="dotted">:</td>
                        <td>{{$employer_details[0]['company_address']}}, {{$employer_details[0]['city_name']}}, {{$employer_details[0]['state_name']}}</td>
                      </tr>
                      <tr>
                        <td class="table-name">Team Members</td>
                        <td class="dotted">:</td>
                        <td>{{$employer_details[0]['team_member']}}</td>
                      </tr>
                      <tr>
                        <td class="table-name">Job Success*</td>
                        <td class="dotted">:</td>
                        <td>98%</td>
                      </tr>
                      <tr>
                        <td class="table-name">Phone</td>
                        <td class="dotted">:</td>
                        <td>{{$employer_details[0]['company_phone']}}</td>
                      </tr>
					  <tr>
                        <td class="table-name">Mobile</td>
                        <td class="dotted">:</td>
                        <td>{{$employer_details[0]['mobile_number']}}</td>
                      </tr>
                      <tr>
                        <td class="table-name">Email</td>
                        <td class="dotted">:</td>
                        <td>{{$employer_details[0]['email']}}</td>
                      </tr>
                      <tr>
                        <td class="table-name">Website</td>
                        <td class="dotted">:</td>
                        <td data-text-color="#ff6000">{{$employer_details[0]['company_website']}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
			  
              <div class="widget-item">
                <div class="widget-title">
                  <h3 class="title">Share With</h3>
                </div>
                <div class="social-icons">
                  <a href="{{$employer_details[0]['facebook_links']}}" target="_blank" rel="noopener"><i class="icofont-facebook"></i></a>
                  <a href="{{$employer_details[0]['twitter_links']}}" target="_blank" rel="noopener"><i class="icofont-twitter"></i></a>
                  <a href="{{$employer_details[0]['skype_links']}}" target="_blank" rel="noopener"><i class="icofont-skype"></i></a>
                  <a href="{{$employer_details[0]['pinterest_links']}}" target="_blank" rel="noopener"><i class="icofont-pinterest"></i></a>
                </div>
              </div>
			  
              <!--<div class="widget-item widget-contact">
                <div class="widget-title">
                  <h3 class="title">Contact Now</h3>
                </div>
                <div class="widget-contact-form">
                  <form id="contact-form" action="https://whizthemes.com/mail-php/raju/arden/mail.php" method="POST">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input class="form-control" type="text" name="con_name" placeholder="Name:">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <input class="form-control" type="email" name="con_email" placeholder="Email:">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <textarea class="form-control" name="con_message" placeholder="Message"></textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group mb--0">
                          <button class="btn-theme d-block w-100" type="submit">Send Message</button>
                        </div>
                      </div>
                    </div>
                  </form>

                  !--== Message Notification ==--
                  <div class="form-message"></div>
                </div>
              </div>-->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Employers Details Area Wrapper ==-->
  </main>
  
@endsection
