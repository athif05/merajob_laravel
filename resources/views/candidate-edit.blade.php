@extends("layouts.master-form")

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
	
	
	<!-- tags style and css and js, start here-->
	<style type="text/css">
        .bootstrap-tagsinput{
            width: 100%;
        }
        .label-info{
            background-color: #17a2b8;

        }
        .label {
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,
            border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
    </style>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-angular.min.js" integrity="sha512-KT0oYlhnDf0XQfjuCS/QIw4sjTHdkefv8rOJY5HHdNEZ6AmOh1DW/ZdSqpipe+2AEXym5D0khNu95Mtmw9VNKg==" crossorigin="anonymous"></script>
	<!-- tags style and css and js, end here-->
	
	
	<!--  validate edit modal form css, start here -->
	<style type="text/css">
		.allowed-submit{opacity: .5;cursor: not-allowed;}
		.valid-input{
			border:1px solid green !important;
		}
		.invalid-input{
			border:1px solid red !important;
		}
		.invalid-msg{
			color: red;
		}
		.validation-form h3{
			background:#eae9e9;
			text-align:center;
			padding:5px 0px;
		}
		.validation-form{
			border:1px solid orange;
			width:50%;
			background:#dad9d9;
			padding:10px 30px;
		}
		.validation-form .form-group{
			margin:15px 0px;
		}
		.validation-form .form-group input{
			padding:10px;
			width:94%;
			boz-sizing:border-box;
			border:none;
			border-bottom:1px solid orange;
		}
		.validation-form .form-group input:focus{
			outline:unset;
		}
		.validation-form .form-group input[type="submit"]{
			width:100%;
			background:orange;
			font-size:20px;
			color:white;
		}
		
		.error-msg-star { color:red;}
	</style>
<!--  validate edit modal form css, end here -->

<style>
.team-details-area .container {
    padding-top: 15px;
    padding-bottom: 111px;
}
</style>
@endsection


@section("content")

  <main class="main-content">
    <!--== Start Page Header Area Wrapper ==--
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
    !--== End Page Header Area Wrapper ==-->
	
    <!--== Start Team Details Area Wrapper ==-->
    <section class="team-details-area">
      <div class="container" style="padding-top: 15px;">
		<!-- Trigger the modal with a button -->
  
    <form method="post" action="{{ route('candidate-details.update') }}" id="myForm" enctype="multipart/form-data">
        @csrf
  <!-- Modal -->
  <div class="" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<div class="alert alert-danger" style="display:none"></div>
      <div class="modal-header">
      	
        <h5 class="modal-title">Update Your Profile</h5>
               
      </div>
      <div class="modal-body">
	  
		<h6 style="border-bottom:1px solid #ccc; border-top:1px solid #ccc; text-align:center; background-color:#f4f4f4; line-height: 30px;">Personal Information</h6>
		
		<input type="hidden" name="edit_id" id="edit_id" value="{{$candidates[0]['user_id']}}">
		
        <div class="row">
            <div class="form-group col-md-4">
              <label for="Name">Name: <span class="error-msg-star">*</span></label>
              <input type="text" class="form-control" name="name" id="name" maxlength="50" value="{{$candidates[0]['name']}}" required>
			  <div class="name-msg"></div>
				@if ($errors->has('name'))
				<span class="text-danger">{{ $errors->first('name') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
                <label for="Club">Email:</label>
                <input type="text" class="form-control" name="email" id="email" value="{{$candidates[0]['email']}}" maxlength="50">
				<div class="email-msg"></div> 
				@if ($errors->has('email'))
				<span class="text-danger">{{ $errors->first('email') }}</span>
			@endif
            </div> 
			
			<div class="form-group col-md-4">
                <label for="Country">Mobile Number: <span class="error-msg-star">*</span></label>
                <input type="text" class="form-control" name="mobile_number" id="mobile_number" maxlength="10" value="{{$candidates[0]['mobile_number']}}" required>
				<div class="mobile_number-msg"></div>
				@if ($errors->has('mobile_number'))
				<span class="text-danger">{{ $errors->first('mobile_number') }}</span>
			@endif
            </div>
        </div>
		  
        <div class="row">
			<div class="form-group col-md-4">
              <label for="Goal Score">Alternate Number:</label>
              <input type="text" class="form-control" name="alternate_number" id="alternate_number" maxlength="10" value="{{$candidates[0]['alternate_number']}}" required>
			  <div class="alternate_number-msg"></div>
			  @if ($errors->has('alternate_number'))
				<span class="text-danger">{{ $errors->first('alternate_number') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
              <label for="Goal Score">Permanent Address: <span class="error-msg-star">*</span></label>
			  <textarea class="form-control" name="permanent_address" id="permanent_address" maxlength="500" required>{{$candidates[0]['permanent_address']}}</textarea>
			  <div class="permanent_address-msg"></div>
			  @if ($errors->has('permanent_address'))
				<span class="text-danger">{{ $errors->first('permanent_address') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
              <label for="Goal Score">Current Address: <span class="error-msg-star">*</span></label>
			  <textarea class="form-control" name="current_address" id="current_address" maxlength="500" required> {{$candidates[0]['current_address']}}</textarea>
			  <div class="current_address-msg"></div>
			  @if ($errors->has('current_address'))
				<span class="text-danger">{{ $errors->first('current_address') }}</span>
			@endif
            </div>
        </div>
		
		<div class="row">
            <div class="form-group col-md-4">
				<label for="Goal Score">State: <span class="error-msg-star">*</span></label>
				<select class="form-control" name="state_id" id="state_id" required>
					<option value="">-- Select State --</option>
					@foreach($states_names as $states_name)
					
					<option value="{{ $states_name['id']}}" @if($candidates[0]['state_id']==$states_name['id']) selected @endif>{{ $states_name['name']}}</option>
					@endforeach
				</select>
				<div class="state_id-msg"></div>
				@if ($errors->has('state_id'))
				<span class="text-danger">{{ $errors->first('state_id') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
				<label for="Goal Score">City: <span class="error-msg-star">*</span></label>
				<select class="form-control" name="city_id" id="city_id" required>
					<option value="">-- Select City --</option>
					@foreach($cities_names as $cities_name)
					<option value="{{ $cities_name['id']}}" @if(!empty($candidates[0]['city_name']) && ($candidates[0]['city_name']==$cities_name['name'])) selected  @endif>{{ $cities_name['name']}} </option>
					@endforeach
				</select>
				<div class="city_id-msg"></div>
				@if ($errors->has('city_id'))
				<span class="text-danger">{{ $errors->first('city_id') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
              <label for="Goal Score">Work Experience: <span class="error-msg-star">*</span></label>
			  <select class="form-control" name="work_experience" id="work_experience" required>
					<option value="">-- Select Work Experience --</option>
					@foreach($work_experiences as $work_experience)
					<option value="{{ $work_experience['id']}}" @if(!empty($candidates[0]['work_experience']) && ($candidates[0]['work_experience']==$work_experience['id'])) selected  @endif>{{ $work_experience['name']}} </option>
					@endforeach
				</select>
			  <div class="work_experience-msg"></div>
			  @if ($errors->has('work_experience'))
				<span class="text-danger">{{ $errors->first('work_experience') }}</span>
			@endif
            </div>
			
        </div>
		
		<div class="row" id="work_experience_div" @if(count($candidate_work_experiences)==0)style="display:none"@endif>
			<label for="Goal Score">Work Experience: <span class="error-msg-star">*</span></label>
			<div class="form-group col-md-12">
				<table class="table table-bordered" id="dynamicWorkTable">  
					
					<thead style="color:#656565; font-weight:normal;" >
						<th style="line-height:15px; width:20%; border-bottom:1px solid #c9c8c8!important;">Designation</th>
						<th style="line-height:15px; width:30%; border-bottom:1px solid #c9c8c8!important;">Company Name</th>
						<th style="line-height:15px; width:10%; border-bottom:1px solid #c9c8c8!important;">Date From</th>
						<th style="line-height:15px; width:10%; border-bottom:1px solid #c9c8c8!important;">Date To </th>
						<th style="line-height:15px; width:20%; border-bottom:1px solid #c9c8c8!important;">Describe Role</th>
						<th style="line-height:15px; width:10%; border-bottom:1px solid #c9c8c8!important;">Action</th>
					</thead>
					
					<tbody>  
						<?php $kl=1;?>
						
						@if(count($candidate_work_experiences)!=0)
							
							@foreach($candidate_work_experiences as $candidate_work_experience)
							
							<tr>
								<td><input type="text" name="addmore_designation[]" placeholder="Enter your designation" class="form-control" style="height: 30px; font-size: 14px;" value="{{ $candidate_work_experience['designation_name']}}"/></td>  
								<td><input type="text" name="addmore_company_name[]" placeholder="Enter your company name" class="form-control" style="height: 30px; font-size: 14px;" value="{{ $candidate_work_experience['organization_name']}}"/></td>  
								<td><input type="date" name="addmore_from[]" placeholder="Enter from" class="form-control" style="height: 30px; font-size: 14px;" value="{{ $candidate_work_experience['date_from']}}"/></td> 
								<td><input type="date" name="addmore_to[]" placeholder="Enter to" class="form-control" style="height: 30px; font-size: 14px;" value="{{ $candidate_work_experience['date_to']}}"/></td> 
								<td><input type="text" name="addmore_describe_role[]" placeholder="Describe Role" class="form-control" style="height: 30px; font-size: 14px;" value="{{ $candidate_work_experience['describe_role']}}"/></td>  
								<td>
								
								@if($kl==1)							
								<button type="button" name="add" id="addWork" class="btn btn-success"  style="height: 30px; font-size: 14px;">Add More</button>
								@endif
								
								
								@if($kl!=1)							
								<button type="button" class="btn btn-danger remove-trWork" style="height: 30px; font-size: 14px;">Remove</button>
								@endif
								</td>  
							</tr>
							<?php $kl++;?>
							@endforeach
							
						@else
							
							<tr>
								<td><input type="text" name="addmore_designation[]" placeholder="Enter your designation" class="form-control" style="height: 30px; font-size: 14px;"/></td>
								<td><input type="text" name="addmore_company_name[]" placeholder="Enter your company name" class="form-control" style="height: 30px; font-size: 14px;"/></td>								
								<td><input type="date" name="addmore_from[]" placeholder="Enter from" class="form-control" style="height: 30px; font-size: 14px;"/></td>
								<td><input type="date" name="addmore_to[]" placeholder="Enter to" class="form-control" style="height: 30px; font-size: 14px;"/></td>								
								<td><input type="text" name="addmore_describe_role[]" placeholder="Describe Role" class="form-control" style="height: 30px; font-size: 14px;"/></td>  
								<td>			
									<button type="button" name="add" id="addWork" class="btn btn-success"  style="height: 30px; font-size: 14px;">Add More</button>
								</td>  
							</tr>
							
							@endif
					</tbody> 
					
				</table> 
            </div>
			
        </div>
		
		<div class="row">
			<label for="Goal Score">Qualification: <span class="error-msg-star">*</span></label>
			<div class="form-group col-md-12">
				<table class="table table-bordered" id="dynamicTable">  
					
					<thead style="color:#656565; font-weight:normal;" >
						<th style="line-height:15px; width:20%; border-bottom:1px solid #c9c8c8!important;">Course Name</th>
						<th style="line-height:15px; width:30%; border-bottom:1px solid #c9c8c8!important;">College/University</th>
						<th style="line-height:15px; width:20%; border-bottom:1px solid #c9c8c8!important;">Year</th>
						<th style="line-height:15px; width:20%; border-bottom:1px solid #c9c8c8!important;">Marks</th>
						<th style="line-height:15px; width:10%; border-bottom:1px solid #c9c8c8!important;">Action</th>
					</thead>
					
					<tbody>  
						<?php $jk=1;?>
						
						@if(count($candidate_qualifications)!=0)
							
							@foreach($candidate_qualifications as $candidate_qualification)
							
							<tr>
								<td><input type="text" name="addmore_qualification[]" placeholder="Enter your qualification" class="form-control" style="height: 30px; font-size: 14px;" value="{{ $candidate_qualification['qualification']}}"/></td>  
								<td><input type="text" name="addmore_college_university[]" placeholder="Enter your college/university" class="form-control" style="height: 30px; font-size: 14px;" value="{{ $candidate_qualification['college_university']}}"/></td>  
								<td><input type="text" name="addmore_year[]" placeholder="Enter your year" class="form-control" style="height: 30px; font-size: 14px;" value="{{ $candidate_qualification['year']}}"/></td>  
								<td><input type="text" name="addmore_marks[]" placeholder="Enter your marks" class="form-control" style="height: 30px; font-size: 14px;" value="{{ $candidate_qualification['marks']}}"/></td>  
								<td>
								
								@if($jk==1)							
								<button type="button" name="add" id="add" class="btn btn-success"  style="height: 30px; font-size: 14px;">Add More</button>
								@endif
								
								
								@if($jk!=1)							
								<button type="button" class="btn btn-danger remove-tr" style="height: 30px; font-size: 14px;">Remove</button>
								@endif
								</td>  
							</tr>
							<?php $jk++;?>
							@endforeach
							
						@else
							
							<tr>
								<td><input type="text" name="addmore_qualification[]" placeholder="Enter your qualification" class="form-control" style="height: 30px; font-size: 14px;"/></td>
								<td><input type="text" name="addmore_college_university[]" placeholder="Enter your college/university" class="form-control" style="height: 30px; font-size: 14px;"/></td>								
								<td><input type="text" name="addmore_year[]" placeholder="Enter your year" class="form-control" style="height: 30px; font-size: 14px;"/></td>  
								<td><input type="text" name="addmore_marks[]" placeholder="Enter your marks" class="form-control" style="height: 30px; font-size: 14px;"/></td>  
								<td>			
									<button type="button" name="add" id="add" class="btn btn-success"  style="height: 30px; font-size: 14px;">Add More</button>
								</td>  
							</tr>
							
							@endif
					</tbody> 
					
				</table> 
            </div>
			
        </div>
		
		<div class="row">
			
			<div class="form-group col-md-4">
              <label for="Goal Score">Describe Job Profile:</label>
			  <textarea class="form-control" name="describe_job_profile" id="describe_job_profile" maxlength="500">{{$candidates[0]['describe_job_profile']}}</textarea>
			  <div class="describe_job_profile-msg"></div>
			  @if ($errors->has('describe_job_profile'))
				<span class="text-danger">{{ $errors->first('describe_job_profile') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
              <label for="Goal Score">Skills <span class="error-msg-star">*</span></label>
              <input type="text" class="form-control" id="skills" data-role="tagsinput" name="skills" class="form-control" value="{{$candidates[0]['skills']}}" style="padding: 8px 6px;" required>
			  <div class="skills-msg"></div>
			  @if ($errors->has('skills'))
				<span class="text-danger">{{ $errors->first('skills') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
              <label for="Goal Score">Notice Period: <span class="error-msg-star">*</span></label>
			  <select class="form-control" name="notice_period" id="notice_period" required>
					<option value="">-- Select Notice Period --</option>
					@foreach($notice_periods as $notice_period)
					<option value="{{ $notice_period['id']}}" @if(!empty($candidates[0]['notice_period']) && ($candidates[0]['notice_period']==$notice_period['id'])) selected  @endif>{{ $notice_period['name']}} </option>
					@endforeach
				</select>
			  <div class="notice_period-msg"></div>
			  @if ($errors->has('notice_period'))
				<span class="text-danger">{{ $errors->first('notice_period') }}</span>
			@endif
            </div>
			
        </div>
		
		<div class="row">
			
			<div class="form-group col-md-4">
              <label for="Goal Score">Last CTC:</label>
              <input type="text" class="form-control" name="last_ctc" id="last_ctc" maxlength="10" value="{{$candidates[0]['last_ctc']}}">
			  <div class="last_ctc-msg"></div>
			  @if ($errors->has('last_ctc'))
				<span class="text-danger">{{ $errors->first('last_ctc') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
              <label for="Goal Score">Profile Image</label>
              <input type="file" class="form-control" name="profile_image" id="profile_image" accept="image/png, image/jpeg, image/jpg">
            </div>
			
			<div class="form-group col-md-4">
              <label for="Goal Score">Upload Resume <span class="error-msg-star">*</span></label>
              <input type="file" class="form-control" name="resume_file" id="resume_file" accept="application/pdf, application/doc" @if(empty($candidates[0]['resume_file'])) required @endif>
			  <div class="resume_file-msg"></div>
			  @if ($errors->has('resume_file'))
				<span class="text-danger">{{ $errors->first('resume_file') }}</span>
			@endif
            </div>
        </div>
		  
		<!--<h6 style="border-bottom:1px solid #ccc; border-top:1px solid #ccc; text-align:center; background-color:#f4f4f4; line-height: 30px;">Professional Information</h6>-->
		
		<!--<div class="row">
            <div class="form-group col-md-4">
              <label for="Goal Score">Job Title: <span class="error-msg-star">*</span></label>
              <input type="text" class="form-control" name="job_title" id="job_title" maxlength="100" value="{{$candidates[0]['job_title']}}" required>
			  <div class="job_title-msg"></div>
			  @if ($errors->has('job_title'))
				<span class="text-danger">{{ $errors->first('job_title') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
              <label for="Goal Score">Job Keywords: <span class="error-msg-star">*</span></label>
              <input type="text" class="form-control" name="job_keywords" id="job_keywords" data-role="tagsinput" name="job_keywords" value="{{$candidates[0]['job_keywords']}}" required>
			  <div class="job_keywords-msg"></div>
			  @if ($errors->has('job_keywords'))
				<span class="text-danger">{{ $errors->first('job_keywords') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
				<label for="Goal Score">Job Category <span class="error-msg-star">*</span></label>
				<select class="form-control" name="job_categories_id" id="job_categories_id" required>
					<option value="">-- Select Job Category --</option>
					@foreach($job_categories as $job_categorie)
					<option value="{{ $job_categorie['id']}}" @if(!empty($candidates[0]['job_categories_id']) && ($candidates[0]['job_categories_id']==$job_categorie['id'])) selected  @endif>{{ $job_categorie['name']}} </option>
					@endforeach
				</select>
				<div class="job_categories_id-msg"></div>
				@if ($errors->has('job_categories_id'))
				<span class="text-danger">{{ $errors->first('job_categories_id') }}</span>
			@endif
            </div>
        </div>
		  
		<div class="row">
			<div class="form-group col-md-4">
				<label for="Goal Score">Job Locations <span class="error-msg-star">*</span> <p style="font-size:10px; color:red;">(Press Ctrl key for select multiple)</p></label>
				
				<select class="form-control select" name="job_locations_id[]" id="job_locations_id"  multiple data-mdb-filter="true" required>
					<option value="">-- Select Job Locations --</option>
					@foreach($job_locations as $job_location)
					<option value="{{ $job_location['id']}}" @if(in_array($job_location['id'],$job_location_array)) selected @endif>{{ $job_location['name']}} </option>
					@endforeach
				</select>
				<div class="job_locations_id-msg"></div>
				@if ($errors->has('job_locations_id'))
				<span class="text-danger">{{ $errors->first('job_locations_id') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
              <label for="Goal Score">English Required <span class="error-msg-star">*</span></label><br>
			  
              <input type="radio" name="english_required_id" value="No English" @if(!empty($candidates[0]['english_required_id']) && ($candidates[0]['english_required_id']=='No English')) checked  @endif> &nbsp; No English
			  
			  <input type="radio" name="english_required_id" value="Basic English"  @if(!empty($candidates[0]['english_required_id']) && ($candidates[0]['english_required_id']=='Basic English')) checked  @endif> &nbsp; Basic English
			  
			  <input type="radio" name="english_required_id" value="Good English" @if(!empty($candidates[0]['english_required_id']) && ($candidates[0]['english_required_id']=='Good English')) checked  @endif> &nbsp; Good English
			  
			  <input type="radio" name="english_required_id" value="Excellent/Fluent English" @if(!empty($candidates[0]['english_required_id']) && ($candidates[0]['english_required_id']=='Excellent/Fluent English')) checked  @endif> &nbsp; Excellent/Fluent English
			  
			  <div class="english_required_id-msg"></div>
			  @if ($errors->has('english_required_id'))
				<span class="text-danger">{{ $errors->first('english_required_id') }}</span>
			@endif
            </div>
        </div>-->
		
		<!--<div class="row">
            <div class="form-group col-md-4">
              <label for="Goal Score">Working or Not <span class="error-msg-star">*</span></label><br>
			  <input type="radio" name="working_or_not" value="Yes"  @if(!empty($candidates[0]['working_or_not']) && ($candidates[0]['working_or_not']=='Yes')) checked  @endif> &nbsp; Yes
			  <input type="radio" name="working_or_not" value="No" @if(!empty($candidates[0]['working_or_not']) && ($candidates[0]['working_or_not']=='No')) checked  @endif> &nbsp; No
			  <div class="working_or_not-msg"></div>
			  @if ($errors->has('working_or_not'))
				<span class="text-danger">{{ $errors->first('working_or_not') }}</span>
			@endif
            </div>
        </div>-->
		  
      </div>
      <div class="modal-footer">
		<a href="{{ url('/candidate-details/'.$candidates[0]['user_id']) }}">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		</a>
        <button  class="btn btn-success" id="submit-btn">Update Profile</button>
		 <!--class="allowed-submit" disabled="desabled"-->
        </div>
    </div>
  </div>
</div>
  </form>
  
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
	

	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->

	<script type="text/javascript">
    var i = 0;
       
    $("#add").click(function(){
   
        ++i;
   
        $("#dynamicTable").append('<tr><td><input type="text" name="addmore_qualification[]" placeholder="Enter your qualification" class="form-control" style="height: 30px; font-size: 14px;"/></td><td><input type="text" name="addmore_college_university[]" placeholder="Enter your college/university" class="form-control" style="height: 30px; font-size: 14px;"/></td> <td><input type="text" name="addmore_year[]" placeholder="Enter your year" class="form-control" style="height: 30px; font-size: 14px;"/></td><td><input type="text" name="addmore_marks[]" placeholder="Enter your marks" class="form-control" style="height: 30px; font-size: 14px;"/></td><td><button type="button" class="btn btn-danger remove-tr" style="height: 30px; font-size: 14px;">Remove</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
</script>


<script type="text/javascript">
    var i = 0;
       
    $("#addWork").click(function(){
   
        ++i;
   
        $("#dynamicWorkTable").append('<tr><td><input type="text" name="addmore_designation[]" placeholder="Enter your designation" class="form-control" style="height: 30px; font-size: 14px;"/></td><td><input type="text" name="addmore_company_name[]" placeholder="Enter your company name" class="form-control" style="height: 30px; font-size: 14px;"/></td> <td><input type="date" name="addmore_from[]" placeholder="Enter from" class="form-control" style="height: 30px; font-size: 14px;"/></td><td><input type="date" name="addmore_to[]" placeholder="Enter to" class="form-control" style="height: 30px; font-size: 14px;"/></td><td><input type="text" name="addmore_describe_role[]" placeholder="Describe Role" class="form-control" style="height: 30px; font-size: 14px;"/></td><td><button type="button" class="btn btn-danger remove-trWork" style="height: 30px; font-size: 14px;">Remove</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
</script>


	<script>
         jQuery(document).ready(function(){
			 
			/* call city ajax function, start here */
			$('#state_id').on('change', function(){
				
				var state_ids = this.value;
				console.log(state_ids);
				
				$.ajax({
					url: "{{url('get-cities-by-state')}}", 
					type: "POST",  
					data:{
						state_ids:state_ids,
						_token: '{{csrf_token()}}'
					},  
					dataType : 'json',
					success:function(result){
						$('#city_id').html('<option value="">-- Select City --</option>');  
						
						$.each(result.cities,function(key,value){
							$("#city_id").append('<option value="'+value.id+'">'+value.name+'</option>');
						});
				   }  

			   });  
			   
			});
			/* call city ajax function, end here */
			
			/* show work experience div, start here */
			$('#work_experience').on('change', function(){
				var work_experience_id = this.value;
				console.log(work_experience_id);
				
				if(work_experience_id==1){
					$('#work_experience_div').hide();
				} else {
					$('#work_experience_div').show();
				}
				
			});
			/* show work experience div, end here */
		
			   
			/* validate edit modal form script, start here */
				//validation for First Name
				$('#name').on('input', function () {
					var name = $(this).val();
					var validName = /^[a-zA-Z ]*$/;
					if (name.length == 0) {
						$('.name-msg').addClass('invalid-msg').text("Name is required");
						$(this).addClass('invalid-input').removeClass('valid-input');

					}
					else if (!validName.test(name)) {
						$('.name-msg').addClass('invalid-msg').text('Only characters & Whitespace are allowed');
						$(this).addClass('invalid-input').removeClass('valid-input');

					}
					else {
						$('.name-msg').empty();
						$(this).addClass('valid-input').removeClass('invalid-input');
					}
				});

				// valiadtion for Email
				$('#email').on('input', function () {
					var emailAddress = $(this).val();
					var validEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
					/*if (emailAddress.length == 0) {
						$('.email-msg').addClass('invalid-msg').text('Email is required');
						$(this).addClass('invalid-input').removeClass('valid-input');
					}
					else */
						
					if (!validEmail.test(emailAddress)) {
						$('.email-msg').addClass('invalid-msg').text('Invalid Email Address');
						$(this).addClass('invalid-input').removeClass('valid-input');
					}
					else {
						$('.email-msg').empty();
						$(this).addClass('valid-input').removeClass('invalid-input');
					}
				});
				
				//validation for mobile number
				$('#mobile_number').on('input', function () {
					var mobile_number = $(this).val();
					var validNumber = /^\d{10}$/;
					if (mobile_number.length == 0) {
						$('.mobile_number-msg').addClass('invalid-msg').text("Mobile number is required");
						$(this).addClass('invalid-input').removeClass('valid-input');

					} else if (mobile_number.length != 10) {
						$('.mobile_number-msg').addClass('invalid-msg').text("Mobile number length should be 10 digit");
						$(this).addClass('invalid-input').removeClass('valid-input');

					} else if (!validNumber.test(mobile_number)) {
						$('.mobile_number-msg').addClass('invalid-msg').text('Only number are allowed');
						$(this).addClass('invalid-input').removeClass('valid-input');

					}
					else {
						$('.mobile_number-msg').empty();
						$(this).addClass('valid-input').removeClass('invalid-input');
					}
				});
				
				
				//validation for alternate mobile number
				$('#alternate_number').on('input', function () {
					var alternate_number = $(this).val();
					var validNumber = /^\d{10}$/;
					
					if (alternate_number.length != 10) {
						$('.alternate_number-msg').addClass('invalid-msg').text("Alternate Mobile number length should be 10 digit");
						$(this).addClass('invalid-input').removeClass('valid-input');

					} else if (!validNumber.test(alternate_number)) {
						$('.alternate_number-msg').addClass('invalid-msg').text('Only number are allowed');
						$(this).addClass('invalid-input').removeClass('valid-input');

					}
					else {
						$('.alternate_number-msg').empty();
						$(this).addClass('valid-input').removeClass('invalid-input');
					}
				});
				
				
				//validation for permanent_address
				$('#permanent_address').blur(function () {
					
					if (permanent_address.length == 0) {
						$('.permanent_address-msg').addClass('invalid-msg').text("Permanent address is required");
						$(this).addClass('invalid-input').removeClass('valid-input');

					}
					else {
						$('.permanent_address-msg').empty();
						$(this).addClass('valid-input').removeClass('invalid-input');
					}
				});
				
				
				// valiadtion for state_id
				$('#state_id').on('input', function () {
					var state_id = $(this).val();
					
					if (state_id.length == 0) {
						$('.state_id-msg').addClass('invalid-msg').text('State is required');
						$(this).addClass('invalid-input').removeClass('valid-input');
					}
					else {
						$('.state_id-msg').empty();
						$(this).addClass('valid-input').removeClass('invalid-input');
					}
				});
				
				// valiadtion for city_id
				$('#city_id').on('input', function () {
					var city_id = $(this).val();
					
					if (city_id.length == 0) {
						$('.city_id-msg').addClass('invalid-msg').text('City is required');
						$(this).addClass('invalid-input').removeClass('valid-input');
					}
					else {
						$('.city_id-msg').empty();
						$(this).addClass('valid-input').removeClass('invalid-input');
					}
				});
				
				
				// valiadtion for job_title
				$('#job_title').on('input', function () {
					var job_title = $(this).val();
					
					if (job_title.length == 0) {
						$('.job_title-msg').addClass('invalid-msg').text('Job title is required');
						$(this).addClass('invalid-input').removeClass('valid-input');
					}
					else {
						$('.job_title-msg').empty();
						$(this).addClass('valid-input').removeClass('invalid-input');
					}
				});
				
				
				// valiadtion for job_keywords
				$('#job_keywords').on('input', function () {
					var job_keywords = $(this).val();
					
					if (job_keywords.length == 0) {
						$('.job_keywords-msg').addClass('invalid-msg').text('Job keywords is required');
						$(this).addClass('invalid-input').removeClass('valid-input');
					}
					else {
						$('.job_keywords-msg').empty();
						$(this).addClass('valid-input').removeClass('invalid-input');
					}
				});
				
				
				// valiadtion for job_categories_id
				$('#job_categories_id').on('input', function () {
					var job_categories_id = $(this).val();
					
					if (job_categories_id.length == 0) {
						$('.job_categories_id-msg').addClass('invalid-msg').text('Job Category is required');
						$(this).addClass('invalid-input').removeClass('valid-input');
					}
					else {
						$('.job_categories_id-msg').empty();
						$(this).addClass('valid-input').removeClass('invalid-input');
					}
				});
				
				
				// valiadtion for job_locations_id
				$('#job_locations_id').on('input', function () {
					var job_locations_id = $(this).val();
					
					if (job_locations_id.length == 0) {
						$('.job_locations_id-msg').addClass('invalid-msg').text('Job locations is required');
						$(this).addClass('invalid-input').removeClass('valid-input');
					}
					else {
						$('.job_locations_id-msg').empty();
						$(this).addClass('valid-input').removeClass('invalid-input');
					}
				});
				
				// valiadtion for skills
				$('#skills').on('input', function () {
					var skills = $(this).val();
					
					if (skills.length == 0) {
						$('.skills-msg').addClass('invalid-msg').text('Skills is required');
						$(this).addClass('invalid-input').removeClass('valid-input');
					}
					else {
						$('.skills-msg').empty();
						$(this).addClass('valid-input').removeClass('invalid-input');
					}
				});
				
				// valiadtion for english_required_id
				$('#english_required_id').on('input', function () {
					var english_required_id = $(this).val();
					
					if (english_required_id.length == 0) {
						$('.english_required_id-msg').addClass('invalid-msg').text('English Field is required');
						$(this).addClass('invalid-input').removeClass('valid-input');
					}
					else {
						$('.english_required_id-msg').empty();
						$(this).addClass('valid-input').removeClass('invalid-input');
					}
				});
				
				// valiadtion for working_or_not
				$('#working_or_not').on('input', function () {
					var working_or_not = $(this).val();
					
					if (working_or_not.length == 0) {
						$('.working_or_not-msg').addClass('invalid-msg').text('Working or not is required');
						$(this).addClass('invalid-input').removeClass('valid-input');
					}
					else {
						$('.working_or_not-msg').empty();
						$(this).addClass('valid-input').removeClass('invalid-input');
					}
				});
				
				// valiadtion for resume_file
				$('#resume_file').on('input', function () {
					var resume_file = $(this).val();
					
					if (resume_file.length == 0) {
						$('.resume_file-msg').addClass('invalid-msg').text('Resume is required');
						$(this).addClass('invalid-input').removeClass('valid-input');
					}
					else {
						$('.resume_file-msg').empty();
						$(this).addClass('valid-input').removeClass('invalid-input');
					}
				});
			   

            });
      </script>

@endsection
