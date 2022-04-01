@extends("layouts.master")

@section("title")

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ env('MY_SITE_NAME') }}"/>
    <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive"/>
    <meta name="author" content="{{ env('MY_SITE_AUTHOR') }}"/>

    <title>Jobs | {{ env('MY_SITE_NAME') }}</title>
	
@endsection


@section("content")

<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <section class="home-slider-area">
      <div class="home-slider-container default-slider-container">
        <div class="home-slider-wrapper slider-default">
          <div class="slider-content-area" data-bg-img="{{ asset('public/img/slider/job2.jpg')}}">
            <div class="container pt--0 pb--0">
              <div class="slider-container">
                <div class="row justify-content-center align-items-center">
                  <div class="col-12 col-lg-8">
                    <div class="slider-content">
                      <h2 class="title"><span class="counter" data-counterup-delay="80">{{$total_no_of_jobs}}</span> job available <br>You can choose your dream job</h2>
                      <!--<p class="desc">Find great job for build your bright career. Have many job in this plactform.</p>-->
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="job-search-wrap">
                      <div class="job-search-form">
                        <form method="get" action="{{ route('jobs.search') }}">
                          <div class="row row-gutter-10">
                            <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                              <div class="form-group">
                                <input type="text" class="form-control" name="searching_keyword" placeholder="Job title or keywords" value="{{request()->get('searching_keyword')}}">
                              </div>
                            </div>
                            <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                              <div class="form-group">
                                <select name="searching_city" class="form-control">
                                  <option value="">-- Choose City --</option>
                                  @foreach($job_locations as $job_location)
								  <option value="{{$job_location['id']}}" @if(request()->get('searching_city')==$job_location['id']) selected @endif>{{$job_location['name']}}</option>
								  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                              <div class="form-group">
                                <select name="searching_category" class="form-control">
                                  <option value="">-- Choose Category --</option>
								  @foreach($main_job_categories as $main_job_category)
                                  <option value="{{$main_job_category['id']}}" @if(request()->get('searching_category')==$main_job_category['id']) selected @endif>{{$main_job_category['name']}}</option>
								  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                              <div class="form-group">
                                <button type="submit" class="btn-form-search"><i class="icofont-search-1"></i></button>
                              </div>
							  
                            </div>
							<!--<div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                              <div class="form-group">
                                <a href="{{url('/jobs')}}">
								<button type="button" class="btn-form-search"><i class="icofont-close-circled"></i></button>
								</a>
                              </div>
                            </div>-->
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Recent Job Area Wrapper ==-->
    <section class="recent-job-area recent-job-inner-area">
      <div class="container">
        <div class="row">
		@foreach($job_lists as $job_list)
          <div class="col-md-6 col-lg-4">
            <!--== Start Recent Job Item ==-->
            <div class="recent-job-item recent-job-style2-item">
              <div class="company-info">
                <div class="logo">
                  <a href="{{ url('/employers-details/'.$job_list['employer_id'])}}">
				  
					@if($job_list['company_logo'])
						<img src="{{asset('').$job_list['company_logo']}}" width="75" height="75" alt="{{$job_list['company_name']}}">
					@else
						<img src="{{ asset('public/img/companies/w1.jpg')}}" width="75" height="75" alt="{{$job_list['company_name']}}">
						@endif
				  </a>
                </div>
                <div class="content">
                  <h4 class="name"><a href="{{ url('/employers-details/'.$job_list['employer_id'])}}">{{$job_list['company_name']}}</a></h4>
                  <p class="address">{{$job_list['city_name']}}, {{$job_list['state_name']}}</p>
                </div>
              </div>
              <div class="main-content">
                <h3 class="title"><a href="{{ url('/job-details/'.$job_list['employer_id'].'/'.$job_list['id'])}}">{{$job_list['job_title']}}</a></h3>
                <h5 class="work-type">{{ $job_list['job_category_name'] }}</h5>
                <p class="desc">{{$job_list['skills']}}</p>
              </div>
              <div class="recent-job-info">
                <div class="salary">
                  <h4>{{ $job_list['salary'] }}</h4>
                  <p>/monthly</p>
                </div>
                <a class="btn-theme btn-sm" href="{{ url('/job-details/'.$job_list['employer_id'].'/'.$job_list['id'])}}">Show Details</a>
              </div>
            </div>
            <!--== End Recent Job Item ==-->
          </div>
		@endforeach

        </div>
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="pagination-area">
			
              <nav>
                <ul class="page-numbers d-inline-flex">
					
					{{$job_lists->links()}}
					
				  <!--<li>
                    <a class="page-number next" href="{{ url('/jobs')}}">
                      <i class="icofont-long-arrow-left"></i>
                    </a>
                  </li>
                  <li>
                    <a class="page-number active" href="{{ url('/jobs')}}">1</a>
                  </li>
                  <li>
                    <a class="page-number" href="{{ url('/jobs')}}">2</a>
                  </li>
                  <li>
                    <a class="page-number" href="{{ url('/jobs')}}">3</a>
                  </li>
                  <li>
                    <a class="page-number next" href="{{ url('/jobs')}}">
                      <i class="icofont-long-arrow-right"></i>
                    </a>
                  </li>-->
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Recent Job Area Wrapper ==-->
  </main>
	
@endsection