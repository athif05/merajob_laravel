@extends("layouts.master")

@section("title")

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ env('MY_SITE_NAME') }}"/>
    <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive"/>
    <meta name="author" content="{{ env('MY_SITE_AUTHOR') }}"/>

    <title>Candidate Details | {{ env('MY_SITE_NAME') }}</title>
	
	<style>
		.home_btn2{
			width: 200px!important;
		}
	</style>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script> 
	
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
				@if(empty($candidates[0]['name']))
					@if(!empty(session('login_user_data')[0]['name']) ) {{ session('login_user_data')[0]['name'] }} @endif
				@else
					{{$candidates[0]['name']}}
				@endif
			  </h2>
              <nav class="breadcrumb-area">
                <ul class="breadcrumb justify-content-center">
                  <li><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>Candidate Details</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->
	
    <!--== Start Team Details Area Wrapper ==-->
    <section class="team-details-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
		  
			@if(session()->has('success'))
				<div class="alert alert-success">
					{{ session()->get('success') }}
				</div>
			@endif

            <div class="team-details-wrap">
              <div class="team-details-info">
                <div class="thumb">
				@if($candidates[0]['image'])
					<img src="{{asset('').$candidates[0]['image']}}" width="130" height="130" alt="Image-HasTech">
					@else
						<img src="{{ asset('public/img/team/user3.png')}}" width="130" height="130" alt="Image-HasTech">
						@endif
                  
                </div>
                <div class="content">
                  <h4 class="title">{{$candidates[0]['name']}}</h4>
                  <h5 class="sub-title">{{$candidates[0]['job_title']}}</h5>
                  <ul class="info-list">
                    <li><i class="icofont-location-pin"></i> {{$candidates[0]['city_name']}}, India</li>
                    <li><i class="icofont-phone"></i> {{$candidates[0]['mobile_number']}}</li>
                  </ul>
                </div>
              </div>
              <div class="team-details-btn">	

				@if($candidates[0]['user_id']== (session('login_user_data')[0]['id'] ?? 0))
					<!--<button type="button" class="btn-theme" style="margin-bottom:5px;" data-toggle="modal" data-target="#myModal" id="open">Edit</button>-->
					<a href="{{ url('/candidate-edit/'.$candidates[0]['user_id']) }}">
						<button type="button" class="btn-theme" style="margin-bottom:5px;">Edit</button>
					</a>
				@endif
				
				<button type="button" class="btn-theme btn-light">Short List</button>
				
				@if(!empty($candidates[0]['resume_file']))
					<a download="Resume_{{$candidates[0]['name']}}" href="{{asset('').$candidates[0]['resume_file']}}" title="Download Resume">
					<button type="button" class="btn-theme">Download Resume</button>
					</a>
				@endif
              </div>
            </div>
          </div>
        </div>
  
        <div class="row">
          <div class="col-lg-7 col-xl-8">
            <div class="team-details-item">
              <!--<div class="content">
                <h4 class="title">About Candidate</h4>
                <p class="desc">It is a long established fact that a reader will be distracted the readable content of page when looking atits layout. The point of using is that has more-or-less normal a distribution of letters, as opposed to usin content publishing packages web page editors. It is a long established fact that a reader will be distracts by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that has look like readable publishing packages and web page editors.</p>
                <p class="desc">It is a long established fact that a reader will be distracted the readable content of a page when looking atits layout. The point of using is that has more-or-less normal a distribution of letters, as opposed to usin content publishing packages web page editors.</p>
              </div>-->
              <div class="candidate-details-wrap">
                <h4 class="content-title">Education</h4>
                <div class="candidate-details-content">
				
				@foreach($candidate_qualifications as $candidate_qualification)
                  <div class="content-item" style="padding: 0px!important;">
                    <h4 class="title text-uppercase">{{$candidate_qualification['qualification']}} <span>//</span> <span>{{$candidate_qualification['year']}}</span></h4>
                    <h5 class="sub-title">{{$candidate_qualification['college_university']}}</h5>
                    <!--<p class="desc">It is a long established fact that a reader will be distracted the readable content of a page when looking atits layout the point of using is that has moreo less normal a distribution letters content publishing packages web page editors.</p>-->
                  </div>
				  <hr>
				@endforeach
				
                </div>
              </div>
			  
			  @if(count($candidate_work_experiences)!=0)
              <div class="candidate-details-wrap">
                <h4 class="content-title">Work & Experience</h4>
                <div class="candidate-details-content">
				
				@foreach($candidate_work_experiences as $candidate_work_experience)
                  <div class="content-item">
                    <h4 class="title">
						{{$candidate_work_experience['designation_name']}} 
						<span>//</span> 
						<span>{{ date('d-M-Y', strtotime($candidate_work_experience['date_from'])) }} - {{date('d-M-Y', strtotime($candidate_work_experience['date_to']))}}</span>
					</h4>
                    <h5 class="sub-title">{{$candidate_work_experience['organization_name']}}</h5>
                    <p class="desc">{{$candidate_work_experience['describe_role']}}</p>
                  </div>
				@endforeach
				
                </div>
              </div>
			  @endif
			  
              <!--<div class="content-list-wrap">
                <div class="content mb--0">
                  <h4 class="title">Professional Skills</h4>
                  <ul class="team-details-list mb--0">
                    <li><i class="icofont-check"></i> Web application Design</li>
                    <li><i class="icofont-check"></i> User Interface (UI) design</li>
                    <li><i class="icofont-check"></i> Mobile Application Design</li>
                    <li><i class="icofont-check"></i> Landing Page Design</li>
                    <li><i class="icofont-check"></i> Web Interface Design</li>
                    <li><i class="icofont-check"></i> Interaction Design</li>
                    <li><i class="icofont-check"></i> User Experience</li>
                    <li><i class="icofont-check"></i> Graphic Design</li>
                    <li><i class="icofont-check"></i> Branding & Identity</li>
                    <li><i class="icofont-check"></i> Project Planning</li>
                    <li><i class="icofont-check"></i> Prototyping</li>
                    <li><i class="icofont-check"></i> Problem Solving</li>
                  </ul>
                </div>
                <div class="content mb--0">
                  <h4 class="title">Software Skills</h4>
                  <ul class="team-details-list mb--0">
                    <li><i class="icofont-check"></i> Adobe Photoshop</li>
                    <li><i class="icofont-check"></i> Adobe Illustrator</li>
                    <li><i class="icofont-check"></i> Adobe XD</li>
                    <li><i class="icofont-check"></i> Figma</li>
                    <li><i class="icofont-check"></i> Sketch</li>
                    <li><i class="icofont-check"></i> InVision Studio</li>
                    <li><i class="icofont-check"></i> UXPin</li>
                    <li><i class="icofont-check"></i> MockFlow</li>
                    <li><i class="icofont-check"></i> Balsamiq</li>
                    <li><i class="icofont-check"></i> Microsoft Word</li>
                    <li><i class="icofont-check"></i> Microsoft Excel</li>
                    <li><i class="icofont-check"></i> Microsoft PowerPoint</li>
                  </ul>
                </div>
              </div> -->
            </div>
          </div>
          <div class="col-lg-5 col-xl-4">
            <div class="team-sidebar">
              <div class="widget-item">
                <div class="widget-title">
                  <h3 class="title">Information</h3>
                </div>
                <div class="summery-info">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="table-name">Email: </td>
                        <td class="dotted">:</td>
                        <td>{{$candidates[0]['email']}}</td>
                      </tr>
                      <tr>
                        <td class="table-name">Alternate Number:</td>
                        <td class="dotted">:</td>
                        <td>{{$candidates[0]['alternate_number']}}</td>
                      </tr>
                      <tr>
                        <td class="table-name">Permanent Address:</td>
                        <td class="dotted">:</td>
                        <td>{{$candidates[0]['permanent_address']}}</td>
                      </tr>
                      <tr>
                        <td class="table-name">Current Address:</td>
                        <td class="dotted">:</td>
                        <td>{{$candidates[0]['current_address']}}</td>
                      </tr>
                      <tr>
                        <td class="table-name">State:</td>
                        <td class="dotted">:</td>
                        <td>{{$candidates[0]['state_name']}}</td>
                      </tr>
                      <tr>
                        <td class="table-name">City:</td>
                        <td class="dotted">:</td>
                        <td>{{$candidates[0]['city_name']}}</td>
                      </tr>
                      <tr>
                        <td class="table-name">Work Experience:</td>
                        <td class="dotted">:</td>
                        <td>{{$candidates[0]['work_experience']}}</td>
                      </tr>
                      <tr>
                        <td class="table-name">Notice Period:</td>
                        <td class="dotted">:</td>
                        <td>{{$candidates[0]['notice_period']}}</td>
                      </tr>
                      <tr>
                        <td class="table-name">Last CTC:</td>
                        <td class="dotted">:</td>
                        <td>{{$candidates[0]['last_ctc']}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
			  
              <!--<div class="widget-item">
                <div class="widget-title">
                  <h3 class="title">Share With</h3>
                </div>
                <div class="social-icons">
                  <a href="https://www.facebook.com/" target="_blank" rel="noopener"><i class="icofont-facebook"></i></a>
                  <a href="https://twitter.com/" target="_blank" rel="noopener"><i class="icofont-twitter"></i></a>
                  <a href="https://www.skype.com/" target="_blank" rel="noopener"><i class="icofont-skype"></i></a>
                  <a href="https://www.pinterest.com/" target="_blank" rel="noopener"><i class="icofont-pinterest"></i></a>
                  <a href="https://dribbble.com/" target="_blank" rel="noopener"><i class="icofont-dribbble"></i></a>
                </div>
              </div>
			  
              <div class="widget-item widget-contact">
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
    <!--== End Team Details Area Wrapper ==-->
  </main>
  
  
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
      </script>
      <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

@endsection
