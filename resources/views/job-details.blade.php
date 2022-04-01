@extends("layouts.master")

@section("title")

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ env('MY_SITE_NAME') }}"/>
    <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive"/>
    <meta name="author" content="{{ env('MY_SITE_AUTHOR') }}"/>

    <title>Job Details | {{ env('MY_SITE_NAME') }}</title>
	
@endsection


@section("content")
  
  <main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="{{ asset('public/img/photos/sl1.jpg')}}">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title">Job Details</h2>
              <nav class="breadcrumb-area">
                <ul class="breadcrumb justify-content-center">
                  <li><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>Job Details</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Job Details Area Wrapper ==-->
    <section class="job-details-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="job-details-wrap">
              <div class="job-details-info">
                <div class="thumb">
                  @if($employer_details[0]['company_logo'])
					<img src="{{asset('').$employer_details[0]['company_logo']}}" width="130" height="130" alt="{{$employer_details[0]['company_name']}}">
					@else
						<img src="{{ asset('public/img/companies/11.jpg')}}" width="130" height="130" alt="{{$employer_details[0]['company_name']}}">
						@endif
                </div>
                <div class="content">
                  <h4 class="title">{{ $job_lists[0]['job_title'] }}</h4>
                  <h5 class="sub-title">{{$employer_details[0]['company_name']}}</h5>
                  <ul class="info-list">
                    <li><i class="icofont-location-pin"></i> {{$employer_details[0]['city_name']}}, INDIA</li>
                    <li><i class="icofont-phone"></i> {{$employer_details[0]['company_phone']}}</li>
                  </ul>
                </div>
              </div>
              <div class="job-details-price">
                <h4 class="title">{{ $job_lists[0]['salary'] }} <span>/monthly</span></h4>
				
				@if(!empty(session('login_user_data')[0]['id']) && (session('login_user_data')[0]['id']==$employer_details[0]['employer_id']))
				<a href="{{ url('/edit-post-job/'.$job_lists[0]['employer_id'].'/'.$job_lists[0]['id'])}}" target="_blank">
							<button type="button" class="btn-theme">Edit</button>
						</a>
						<br><br>
				@endif
				
				@if( (empty(session('login_user_data')[0]['id'])) || (!empty(session('login_user_data')[0]['id']) && (session('login_user_data')[0]['user_type']!='2')))
                <button type="button" class="btn-theme apply_now_class" id="{{$job_lists[0]['id']}}">Apply Now</button>
				@endif
				
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-7 col-xl-8">
            <div class="job-details-item">
              <div class="content">
                <h4 class="title">Description</h4>
                <p class="desc">{{ str_replace('</p>','',str_replace('<p>','',$job_lists[0]['job_description'])) }}</p>
              </div>
              <div class="content">
                <h4 class="title">Responsibilities</h4>
                <p class="desc">{{ str_replace('</p>','',str_replace('<p>','',$job_lists[0]['job_responsibilities'])) }}</p>
              </div>
              <div class="content">
                <h4 class="title">Requirements</h4>
				<p class="desc">{{ str_replace('</p>','',str_replace('<p>','',$job_lists[0]['job_requirements'])) }}</p>
                <!--<ul class="job-details-list">
                  <li><i class="icofont-check"></i> Having approved theme/s on ThemeForest will be given high preference.</li>
                  <li><i class="icofont-check"></i> Strong knowledge of WordPress Theme Standards</li>
                  <li><i class="icofont-check"></i> Ability to convert HTML templates into fully functional WordPress themes.</li>
                  <li><i class="icofont-check"></i> Good knowledge in O OP PHP and front-end stuffs like HTML, CSS, JS, jQuery, etc.</li>
                  <li><i class="icofont-check"></i> Moderate knowledge in WordPress Core APIs like options, metadata, REST, hooks, settings, etc.</li>
                  <li><i class="icofont-check"></i> Ability to debug and fix bugs arising from other developer’s code.</li>
                  <li><i class="icofont-check"></i> Sense of humor</li>
                  <li><i class="icofont-check"></i> Hard worker and passionate – we are growing super fast</li>
                </ul>-->
              </div>
              <!--<div class="content">
                <h4 class="title">Educational Requirements --</h4>
                <p class="desc">It doesn’t matter where you went to college or what your CGPA was as long as you are smart, passionate, ready to work hard, and have fun.</p>
              </div>-->
              <div class="content">
                <h4 class="title">Working Hours</h4>
                <ul class="job-details-list">
                  <li><i class="icofont-check"></i> {{ $job_lists[0]['working_hours'] }}</li>
                  <li><i class="icofont-check"></i> {{ $job_lists[0]['working_day_name'] }}</li>
                  <!--<li><i class="icofont-check"></i> Weekend: Saturday, Sunday.</li>-->
                </ul>
              </div>
              <!--<div class="content">
                <h4 class="title">Benefits</h4>
                <ul class="job-details-list">
                  <li><i class="icofont-check"></i> Work in a flat organization where your voice is always heard.</li>
                  <li><i class="icofont-check"></i> Provident fund.</li>
                  <li><i class="icofont-check"></i> Gratuity.</li>
                  <li><i class="icofont-check"></i> Medical Fund.</li>
                  <li><i class="icofont-check"></i> Having Corporate deals with multiple Hospitals.</li>
                  <li><i class="icofont-check"></i> Performance bonus.</li>
                  <li><i class="icofont-check"></i> Increment: Yearly.</li>
                  <li><i class="icofont-check"></i> Festival Bonus: 2 (Yearly)</li>
                  <li><i class="icofont-check"></i> Lunch Facilities: Full Subsidize.</li>
                  <li><i class="icofont-check"></i> Unlimited Tea, Coffee & Snacks.</li>
                  <li><i class="icofont-check"></i> Annual tour.</li>
                  <li><i class="icofont-check"></i> Team Outing.</li>
                  <li><i class="icofont-check"></i> Marriage Bonus and Marriage Leave.</li>
                  <li><i class="icofont-check"></i> Paternity and Maternity Leave.</li>
                  <li><i class="icofont-check"></i> Yearly Family Tour.</li>
                  <li><i class="icofont-check"></i> Knowledge Sharing Session.</li>
                  <li><i class="icofont-check"></i> Leave Encashment Facilities.</li>
                  <li><i class="icofont-check"></i> Work with a vibrant team and amazing products.</li>
                  <li><i class="icofont-check"></i> Table Tennis(Ping Pong) :table_tennis_paddle_and_ball:</li>
                  <li><i class="icofont-check"></i> Training and learning materials to improve skills.</li>
                  <li><i class="icofont-check"></i> Last but not the least, WorldClass Work Environment.</li>
                </ul>
              </div>-->
              <div class="content">
                <!--<h4 class="title">Statement</h4>
                <p class="desc">{{$employer_details[0]['about_company']}}</p>-->
					
				@if( (empty(session('login_user_data')[0]['id'])) || (!empty(session('login_user_data')[0]['id']) && (session('login_user_data')[0]['user_type']!='2')))
                <a class="btn-apply-now apply_now_class" href="javascript:void(0)" id="{{$job_lists[0]['id']}}">Apply Now <i class="icofont-long-arrow-right"></i></a>
				@endif
				
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-xl-4">
            <div class="job-sidebar">
              <div class="widget-item">
                <div class="widget-title">
                  <h3 class="title">Summery</h3>
                </div>
                <div class="summery-info">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="table-name">Job Type</td>
                        <td class="dotted">:</td>
                        <td data-text-color="#03a84e">{{ $job_lists[0]['job_category_name'] }}</td>
                      </tr>
                      <tr>
                        <td class="table-name">Category</td>
                        <td class="dotted">:</td>
                        <td>{{ $job_lists[0]['main_job_category_name'] }}</td>
                      </tr>
					  <tr>
                        <td class="table-name">No of Opening</td>
                        <td class="dotted">:</td>
                        <td data-text-color="#03a84e">{{ $job_lists[0]['no_of_opening'] }}</td>
                      </tr>
					  <tr>
                        <td class="table-name">Job Location</td>
                        <td class="dotted">:</td>
                        <td>
						@foreach($job_locations as $job_location)
							@if($job_location['id']==$job_lists[0]['job_location_id'])
							{{$job_location['name']}}
								@endif
						@endforeach
						</td>
                      </tr>
                      <tr>
                        <td class="table-name">Posted</td>
                        <td class="dotted">:</td>
                        <td>{{ date('d-M-Y', strtotime($job_lists[0]['created_at'])) }}</td>
                      </tr>
                      <tr>
                        <td class="table-name">Salary</td>
                        <td class="dotted">:</td>
                        <td>{{ $job_lists[0]['salary'] }} / Monthly</td>
                      </tr>
					  <tr>
                        <td class="table-name">CTC</td>
                        <td class="dotted">:</td>
                        <td>{{ $job_lists[0]['ctc'] }} / Annually</td>
                      </tr>
                      <tr>
                        <td class="table-name">Experience</td>
                        <td class="dotted">:</td>
                        <td>{{ $job_lists[0]['experience_required'] }}</td>
                      </tr>
					  
					  @if(!empty($job_lists[0]['min_experience_required']))
					  <tr>
                        <td class="table-name">Experience</td>
                        <td class="dotted">:</td>
                        <td>{{ $job_lists[0]['min_experience_required'] }}</td>
                      </tr>
					  @endif
					  
					  @if(!empty($job_lists[0]['max_experience_required']))
					  <tr>
                        <td class="table-name">Experience</td>
                        <td class="dotted">:</td>
                        <td>{{ $job_lists[0]['max_experience_required'] }}</td>
                      </tr>
					  @endif
					  
					  @if(!empty($job_lists[0]['candidate_requirements']))
					  <tr>
                        <td class="table-name">Candidate Requirements</td>
                        <td class="dotted">:</td>
                        <td>{{ $job_lists[0]['candidate_requirements'] }}</td>
                      </tr>
					  @endif
					  
                      <tr>
                        <td class="table-name">Gender</td>
                        <td class="dotted">:</td>
                        <td>{{ $job_lists[0]['gender'] }}</td>
                      </tr>
                      <tr>
                        <td class="table-name">Qualification</td>
                        <td class="dotted">:</td>
                        <td>
						<?php $qualification_ids=explode(',',$job_lists[0]['qualification_ids']);?>
						@foreach($qualifications as $qualification)
							@if(in_array($qualification['id'], $qualification_ids))
								{{ $qualification['name'] }}, 
							@endif	
						@endforeach
						</td>
                      </tr>
                      <tr>
                        <td class="table-name">Skills</td>
                        <td class="dotted">:</td>
                        <td>{{ $job_lists[0]['skills'] }}</td>
                      </tr>
					  <tr>
                        <td class="table-name">English Required</td>
                        <td class="dotted">:</td>
                        <td>{{ $job_lists[0]['english_required'] }}</td>
                      </tr>
                      <tr>
                        <td class="table-name">Applied --</td>
                        <td class="dotted">:</td>
                        <td>26 Applicant</td>
                      </tr>
                      <tr>
                        <td class="table-name">Application End --</td>
                        <td class="dotted">:</td>
                        <td data-text-color="#ff6000">20 November, 2021</td>
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
              <!--<div class="widget-item widget-tag">
                <div class="widget-title">
                  <h3 class="title">Tags:</h3>
                </div>
                <div class="widget-tag-list">
                  <a href="{{ url('/job')}}">Cleaning</a>
                  <a href="{{ url('/job')}}">Cleaning Agency</a><br>
                  <a href="{{ url('/job')}}">Business</a>
                  <a href="{{ url('/job')}}">Cleaning</a>
                  <a href="{{ url('/job')}}">Business</a>
                  <a href="{{ url('/job')}}">Cleaning</a>
                  <a href="{{ url('/job')}}">Cleaning Agency</a>
                  <a href="{{ url('/job')}}">Business</a>
                  <a href="{{ url('/job')}}">Cleaning Agency</a>
                  <a href="{{ url('/job')}}">Cleaning</a>
                  <a href="{{ url('/job')}}">Business</a>
                  <a href="{{ url('/job')}}">Business</a>
                  <a href="{{ url('/job')}}">Cleaning Agency</a>
                  <a href="{{ url('/job')}}">Business</a>
                </div>
              </div>-->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Job Details Area Wrapper ==-->
  </main>

@endsection
