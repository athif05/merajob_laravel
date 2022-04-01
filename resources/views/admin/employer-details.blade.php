@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Candidate Details | {{ env('MY_SITE_NAME') }}</title>
	
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
						<label for="Name"><strong>Name : </strong> {{ $candidates['name']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Email : </strong> {{ $candidates['email']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Mobile Number : </strong> {{ $candidates['mobile_number']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Alternate Number : </strong> {{ $candidates['alternate_number']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Permanent Address : </strong> {{ $candidates['permanent_address']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Current Address : </strong> {{ $candidates['current_address']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>State Name : </strong> {{ $candidates['state_name']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>City Name : </strong> {{ $candidates['city_name']}}</label>
					</div>

                </div>
              </div>
            </div>
			
			<div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Other Information</h4>
                  
					<div class="form-group">
						<label for="Name"><strong>Describe Job Profile : </strong> {{ $candidates['describe_job_profile']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Skills : </strong> {{ $candidates['skills']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Notice Period : </strong> {{ $candidates['notice_period']}}</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Last CTC : </strong> {{ $candidates['last_ctc']}}</label>
					</div>
										
					<div class="form-group">
						<label for="Name">
							<strong>Resume : </strong> 
							
							@if(!empty($candidates['resume_file'])) 
								<a href="{{ url($candidates['resume_file'])}}" download title="Click here for download resume.">Download Resume</a>
							@endif
							
						</label>
					</div>
					
					<div class="form-group">
						<label for="Name"><strong>Profile Image : </strong> 
						@if(!empty($candidates['image'])) 
							<br><img src="{{ url($candidates['image'])}}" style="width:120px; height:auto;"/>
							<br><a href="{{ url($candidates['image'])}}" download title="Click here for download image.">Download Profile Image</a>
						@endif
						
						</label>
					</div>
					
                </div>
              </div>
            </div>
			
			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Work Experience</h4>
                  
				    <div class="form-group">
						<label for="Name"><strong>Experience: </strong> {{ $candidates['work_experience']}}</label>
					</div>
					
					
					<div class="form-group">
					@if(count($candidate_work_experiences)>0)
						<table class="table table-striped project-orders-table" id="my_datatable">
							<thead style="color:#656565; font-weight:normal;" >
								<th style="line-height:15px; width:20%; border-bottom:1px solid #c9c8c8!important;">Designation</th>
								<th style="line-height:15px; width:30%; border-bottom:1px solid #c9c8c8!important;">Company Name</th>
								<th style="line-height:15px; width:10%; border-bottom:1px solid #c9c8c8!important;">Date From</th>
								<th style="line-height:15px; width:10%; border-bottom:1px solid #c9c8c8!important;">Date To </th>
								<th style="line-height:15px; width:30%; border-bottom:1px solid #c9c8c8!important;">Describe Role</th>
							</thead>
							
							<tbody>
							@foreach($candidate_work_experiences as $candidate_work_experience)
								<tr>
									<td>{{ $candidate_work_experience['designation_name']}}</td>  
									<td>{{ $candidate_work_experience['organization_name']}}</td>  
									<td>{{ $candidate_work_experience['date_from']}}</td> 
									<td>{{ $candidate_work_experience['date_to']}}</td> 
									<td>{{ $candidate_work_experience['describe_role']}}</td>   
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
			
			<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Qualification</h4>		
					
					<div class="form-group">
					@if(count($candidate_qualifications)>0)
						<table class="table table-striped project-orders-table" id="my_datatable">
							<thead style="color:#656565; font-weight:normal;" >
								<th style="line-height:15px; width:20%; border-bottom:1px solid #c9c8c8!important;">Course Name</th>
								<th style="line-height:15px; width:40%; border-bottom:1px solid #c9c8c8!important;">College/University</th>
								<th style="line-height:15px; width:20%; border-bottom:1px solid #c9c8c8!important;">Year</th>
								<th style="line-height:15px; width:20%; border-bottom:1px solid #c9c8c8!important;">Marks</th>
							</thead>
							
							<tbody>
							@foreach($candidate_qualifications as $candidate_qualification)
								<tr>
									<td>{{ $candidate_qualification['qualification']}}</td>  
									<td>{{ $candidate_qualification['college_university']}}</td>  
									<td>{{ $candidate_qualification['year']}}</td> 
									<td>{{ $candidate_qualification['marks']}}</td>  
								</tr>
							@endforeach
							</tbody>
							
						</table>
						@else
							<span class="danger">No qualification added by candidate...</span>
							@endif
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