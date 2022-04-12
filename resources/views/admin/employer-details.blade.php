@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Employer Details | {{ env('MY_SITE_NAME') }}</title>
	
	<style>
		.form-group {
			margin-bottom :  2px!important;
		}
	</style>
	
@endsection


@section("content")
  
  <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
		  
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Personal Information</h4>
                  
					<div class="form-group">
						<label for="Name"><strong>Company Name : </strong> {{ $employer_detailss['company_name']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Email : </strong> {{ $employer_detailss['email']}}</label>
					</div>

					<div class="form-group">
						<label for="Name"><strong>Company Website: </strong> {{ $employer_detailss['company_website']}}</label>
					</div>

					<div class="form-group">
						<label for="Name"><strong>Company Views: </strong> {{ $employer_detailss['company_views']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Company Phone : </strong> {{ $employer_detailss['company_phone']}}</label>
					</div>

					<div class="form-group">
						<label for="Name"><strong>Mobile Number : </strong> {{ $employer_detailss['mobile_number']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Alternate Number : </strong> {{ $employer_detailss['alternate_number']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Company Address : </strong> {{ $employer_detailss['company_address']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>State Name : </strong> {{ $employer_detailss['state_name']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>City Name : </strong> {{ $employer_detailss['city_name']}}</label>
					</div>


                </div>
              </div>
            </div>
			
			<div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">About Company</h4>
                  
					<div class="form-group">
						<label for="Name"><strong>About Company : </strong> {{ $employer_detailss['about_company']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Company Domain : </strong> {{ $employer_detailss['company_domains_name']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Company Established Year : </strong> {{ $employer_detailss['company_established_year']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Team Member : </strong> {{ $employer_detailss['team_member']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Company Logo : </strong> 
						@if(!empty($employer_detailss['company_logo'])) 
							<br><img src="{{ url($employer_detailss['company_logo'])}}" style="width:120px; height:auto;"/>
						@endif
						
						</label>
					</div>
					
                </div>
              </div>
            </div>
			
			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Social Media</h4>		
					
					<div class="form-group">
						<label for="Name"><strong>Facebook: </strong><a href="{{ $employer_detailss['facebook_links']}}" target="_blank"> {{ $employer_detailss['facebook_links']}}</a></label>
					</div>

					<div class="form-group">
						<label for="Name"><strong>Twitter: </strong><a href="{{ $employer_detailss['twitter_links']}}" target="_blank"> {{ $employer_detailss['twitter_links']}}</a></label>
					</div>

					<div class="form-group">
						<label for="Name"><strong>Skype: </strong><a href="{{ $employer_detailss['skype_links']}}" target="_blank"> {{ $employer_detailss['skype_links']}}</a></label>
					</div>

					<div class="form-group">
						<label for="Name"><strong>Pinterest: </strong><a href="{{ $employer_detailss['pinterest_links']}}" target="_blank"> {{ $employer_detailss['pinterest_links']}}</a></label>
					</div>
					
                </div>
              </div>
            </div>		


            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Job Post ({{$total_jobs}})</h4>
                  
				  <div class="form-group">

				  	<div style="float: left; width:100%; overflow-x:scroll;">

					@if($total_jobs>0)
						<table class="table table-striped project-orders-table" id="my_datatable">
							<thead style="color:#656565; font-weight:normal;" >
								<th style="line-height:15px; width:20%; border-bottom:1px solid #c9c8c8!important;">Job Title</th>
								<th style="line-height:15px; width:30%; border-bottom:1px solid #c9c8c8!important;">Salary</th>
								<th style="line-height:15px; width:10%; border-bottom:1px solid #c9c8c8!important;">Opening</th>
								<th style="line-height:15px; width:10%; border-bottom:1px solid #c9c8c8!important;">Job Location</th>
								<th style="line-height:15px; width:30%; border-bottom:1px solid #c9c8c8!important;">City</th>
								<th style="line-height:15px; width:30%; border-bottom:1px solid #c9c8c8!important;">Job Types</th>
								<th style="line-height:15px; width:30%; border-bottom:1px solid #c9c8c8!important;">Working Days</th>
								<th style="line-height:15px; width:30%; border-bottom:1px solid #c9c8c8!important;">Experience</th>
								<th style="line-height:15px; width:30%; border-bottom:1px solid #c9c8c8!important;">Skills</th>
								<th style="line-height:15px; width:30%; border-bottom:1px solid #c9c8c8!important;">Action</th>
							</thead>
							
							<tbody>
							@foreach($job_lists as $job_list)
								<tr>
									<td>{{ $job_list['job_title']}}</td>  
									<td>{{ $job_list['salary']}}</td>  
									<td>{{ $job_list['no_of_opening']}}</td> 
									<td>
										@foreach($job_locations as $job_location)
											@if($job_location['id']==$job_list['job_location_id'])
												{{ $job_location['name'] }}
											@endif
										@endforeach
									</td> 
									<td>{{ $job_list['city_name']}}</td>
									<td>{{ $job_list['job_category_name']}}</td>
									<td>{{ $job_list['working_day_name']}}</td>
									<td>{{ $job_list['maxexperience_required']}}</td>
									<td>{{ $job_list['skills']}}</td>   
									<td>
										<a href="{{ url('/admin/job-details/'.$job_list['employer_id'].'/'.$job_list['id'])}}" target="_blank">Know More...</a>
									</td>
								</tr>
							@endforeach
							</tbody>
							
						</table>
						@else
							<span class="danger">No work experience added by candidate...</span>
							@endif
						</div>
					</div>

                </div>
              </div>
            </div>

			
          </div>

        </div>
        <!-- content-wrapper ends -->
        
		@include('admin/partials.footer')
		
      </div>
		  
@endsection