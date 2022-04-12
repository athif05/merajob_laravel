@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>{{ $job_lists['job_title']}} | {{ env('MY_SITE_NAME') }}</title>
	
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
                  <h4 class="card-title">Basic Job Details</h4>
                  
					<div class="form-group">
						<label for="Name"><strong>Job Title : </strong> {{ $job_lists['job_title']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Salary : </strong> {{ $job_lists['salary']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>No of Opening : </strong> {{ $job_lists['no_of_opening']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Job Location : </strong> 
						
						@foreach($job_locations as $job_location)
							@if($job_location['id']==$job_lists['job_location_id'])
							{{$job_location['name']}}
								@endif
						@endforeach
						
						</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>State Name : </strong> {{ $job_lists['state_name']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>City Name : </strong> {{ $job_lists['city_name']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Job Description : </strong> {{ str_replace('</p>','',(str_replace('<p>','',$job_lists['job_description'])))}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Job Responsibilities : </strong> {{ str_replace('</p>','',(str_replace('<p>','',$job_lists['job_responsibilities'])))}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Job Requirements : </strong> {{ str_replace('</p>','',(str_replace('<p>','',$job_lists['job_requirements'])))}}</label>
					</div>
			
                </div>
              </div>
            </div>
			
			<div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Additional Job Details</h4>
                  
				    <div class="form-group">
						<label for="Name"><strong>Job Category : </strong> {{ $job_lists['main_job_category_name']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Types Of Job : </strong> {{ $job_lists['job_category_name']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Working Days : </strong> {{ $job_lists['working_day_name']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Working Hours : </strong> {{ $job_lists['working_hours']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Experience : </strong> 
							{{ $job_lists['experience_required']}}
							
							@if(!empty($job_lists['min_experience_required']))
								Min Experience - {{ $job_lists['min_experience_required'] }}
							@endif
							  
							@if(!empty($job_lists['max_experience_required']))
							  Max Experience - {{ $job_lists['max_experience_required'] }}
							@endif
					  
						</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>CTC : </strong> {{ $job_lists['ctc']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Skills : </strong> {{ $job_lists['skills']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Qualification : </strong> 
							<?php $qualification_ids=explode(',',$job_lists['qualification_ids']);?>
							@foreach($qualifications as $qualification)
								@if(in_array($qualification['id'], $qualification_ids))
									{{ $qualification['name'] }}, 
								@endif	
							@endforeach
						</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Gender : </strong> {{ $job_lists['gender']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Candidate Requirements : </strong> {{ $job_lists['candidate_requirements']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>English : </strong> {{ $job_lists['english_required']}}</label>
					</div>
					
					
                </div>
              </div>
            </div>
			
			<div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Interview Information</h4>
                  
					<div class="form-group">
						<label for="Name"><strong>Company Name : </strong> {{ $job_lists['interview_information_company_name']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>HR Name : </strong> {{ $job_lists['interview_information_hr_name']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>HR Contact No : </strong> {{ $job_lists['interview_information_hr_number']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>HR Email : </strong> {{ $job_lists['interview_information_hr_email']}}</label>
					</div>
					
                </div>
              </div>
            </div>
			
			<div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Job Address</h4>
                  
					<div class="form-group">
						<label for="Name"><strong>Full Address : </strong> {{ $job_lists['job_address_flat_address']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>State : </strong> 
						@foreach($states_names as $states_name)
							@if($states_name['id']==$job_lists['job_address_state'])
							{{$states_name['name']}}
							@endif
						@endforeach						
						</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>City : </strong> 
						@foreach($cities_names as $cities_name)
							@if($cities_name['id']==$job_lists['job_address_city'])
							{{$cities_name['name']}}
							@endif
						@endforeach	
						</label>
					</div>
					
                </div>
              </div>
            </div>
			
			<div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Interview Address</h4>
                  
					<div class="form-group">
						<label for="Name"><strong>Full Address : </strong> {{ $job_lists['interview_address_full_address']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>State : </strong> 
						@foreach($states_names as $states_name)
							@if($states_name['id']==$job_lists['interview_address_state'])
							{{$states_name['name']}}
							@endif
						@endforeach						
						</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>City : </strong> 
						@foreach($cities_names as $cities_name)
							@if($cities_name['id']==$job_lists['interview_address_city'])
							{{$cities_name['name']}}
							@endif
						@endforeach	
						</label>
					</div>
					
                </div>
              </div>
            </div>
			
			<div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Fee Charged</h4>
                  
					<div class="form-group">
						<label for="Name"><strong>If there any fee charged to the candidate? : </strong> {{ $job_lists['candidate_fee_charged']}}</label>
					</div>
					
					@if($job_lists['candidate_fee_charged']=='Yes')
					<div class="form-group">
						<label for="Name"><strong>Fee Amount : </strong> {{ $job_lists['candidate_fee_amount']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Reason : </strong> {{ $job_lists['candidate_fee_reasons_name']}}</label>
					</div>
					
						@if($job_lists['candidate_fee_reasons']=='5')
						<div class="form-group">
							<label for="Name"><strong>Other Reason : </strong> {{ $job_lists['candidate_fee_other_reasons']}}</label>
						</div>
						@endif
					
					@endif
                </div>
              </div>
            </div>


            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Total Job Applied by Candidate</h4>
                  
					<div class="form-group">
						<label for="Name"><strong>Applied by : </strong> {{ $total_no_of_jobs_applied}} Candidates</label>
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