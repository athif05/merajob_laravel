@extends("layouts.master-form")

@section("title")

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ env('MY_SITE_NAME') }}"/>
    <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive"/>
    <meta name="author" content="{{ env('MY_SITE_AUTHOR') }}"/>

    <title>Post A New Job | {{ env('MY_SITE_NAME') }}</title>
	
	<style>
		.home_btn2{
			width: 200px!important;
		}
	</style>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script> 
	
	<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
	
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
				Post New Job
			  </h2>
              <nav class="breadcrumb-area">
                <ul class="breadcrumb justify-content-center">
                  <li><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>Post Job</li>
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
  
	@if(session()->has('success'))
		<div class="alert alert-success">
			{{ session()->get('success') }}
		</div>
	@endif
	
    <form method="post" action="{{ route('create-job.create')}}" id="myForm" enctype="multipart/form-data">
        @csrf
  <!-- Modal -->
  <div class="" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="alert alert-danger" style="display:none"></div>
      <div class="modal-header">
      	
        <h5 class="modal-title">Job Details</h5>
               
      </div>
      <div class="modal-body">
		
		<h6 style="border-bottom:1px solid #ddd; border-top:1px solid #ddd; text-align:center; background-color:#ccc; line-height: 30px;">Basic Job Details</h6>

		<input type="hidden" name="employer_id" id="employer_id" value="{{$employer_id}}">
		
        <div class="row">
            <div class="form-group col-md-4">
              <label for="Name">Job Title: <span class="error-msg-star">*</span></label>
              <input type="text" class="form-control" name="job_title" id="job_title" maxlength="50" value="{{old('job_title')}}" placeholder="Job Title">
				@if ($errors->has('job_title'))
					<span class="text-danger">{{ $errors->first('job_title') }}</span>
				@endif
            </div>
			
			<div class="form-group col-md-4">
                <label for="Club">Salary: <span class="error-msg-star">*</span></label>
                <input type="text" class="form-control" name="salary" id="salary" value="{{old('salary')}}" maxlength="10" placeholder="Salary">
				@if ($errors->has('salary'))
					<span class="text-danger">{{ $errors->first('salary') }}</span>
				@endif
            </div> 
			
			<div class="form-group col-md-4">
                <label for="Country">No of Opening: <span class="error-msg-star">*</span></label>
                <input type="text" class="form-control" name="no_of_opening" id="no_of_opening" maxlength="5" value="{{old('no_of_opening')}}" placeholder="No of Opening">
				@if ($errors->has('no_of_opening'))
					<span class="text-danger">{{ $errors->first('no_of_opening') }}</span>
				@endif
            </div>
        </div>
		  
        <div class="row">
			<div class="form-group col-md-4">
                <label for="Goal Score">Job Location: <span class="error-msg-star">*</span></label>
                <select class="form-control" name="job_location_id" id="job_location_id">
					<option value="">-- Select Job Location --</option>
					@foreach($job_locations as $job_location)
					
					<option value="{{ $job_location['id']}}" @if(old('job_location_id')==$job_location['id']) selected @endif>{{ $job_location['name']}}</option>
					@endforeach
				</select>
				@if ($errors->has('job_location_id'))
					<span class="text-danger">{{ $errors->first('job_location_id') }}</span>
				@endif
            </div>
			
			<div class="form-group col-md-4">
				<label for="Goal Score">State: <span class="error-msg-star">*</span></label>
				<select class="form-control" name="state_id" id="state_id" >
					<option value="">-- Select State --</option>
					@foreach($states_names as $states_name)
					
					<option value="{{ $states_name['id']}}" @if(old('state_id')==$states_name['id']) selected @endif>{{ $states_name['name']}}</option>
					@endforeach
				</select>
				@if ($errors->has('state_id'))
					<span class="text-danger">{{ $errors->first('state_id') }}</span>
				@endif
            </div>
			
			<div class="form-group col-md-4">
				<label for="Goal Score">City: <span class="error-msg-star">*</span></label>
				<select class="form-control" name="city_id" id="city_id" >
					<option value="">-- Select City --</option>
					@if(!empty(old('city_id'))) 
						@foreach($job_locations as $job_location)
						<option value="{{ $job_location['id']}}" @if(old('city_id')==$job_location['id']) selected @endif>
							{{ $job_location['name']}} 
						</option>
						@endforeach
					@else 
						@foreach($cities_names as $cities_name)
						<option value="{{ $cities_name['id']}}">
							{{ $cities_name['name']}} 
						</option>
						@endforeach
					@endif
				</select>
				@if ($errors->has('city_id'))
					<span class="text-danger">{{ $errors->first('city_id') }}</span>
				@endif
            </div>
			
			<div class="form-group col-md-4">
              <label for="Goal Score">Job Description : <span class="error-msg-star">*</span></label>
			  <textarea class="form-control" name="job_description" id="job_description" maxlength="500" placeholder="Job Description">{{old('job_description')}}</textarea>
			  @if ($errors->has('job_description'))
				<span class="text-danger">{{ $errors->first('job_description') }}</span>
			@endif
			
			<script>
				CKEDITOR.replace( 'job_description' );
			</script>
			
            </div>
			
			<div class="form-group col-md-4">
              <label for="Goal Score">Job Responsibilities : <span class="error-msg-star">*</span></label>
			  <textarea class="form-control" name="job_responsibilities" id="job_responsibilities" maxlength="500" placeholder="Job Responsibilities">{{old('job_responsibilities')}}</textarea>
			  @if ($errors->has('job_responsibilities'))
				<span class="text-danger">{{ $errors->first('job_responsibilities') }}</span>
			@endif
			
			<script>
					CKEDITOR.replace( 'job_responsibilities' );
				</script>
				
            </div>
			
			<div class="form-group col-md-4">
              <label for="Goal Score">Job Requirements : <span class="error-msg-star">*</span></label>
			  <textarea class="form-control" name="job_requirements" id="job_requirements" maxlength="500" placeholder="Job Requirements ">{{old('job_requirements')}}</textarea>
			  @if ($errors->has('job_requirements'))
				<span class="text-danger">{{ $errors->first('job_requirements') }}</span>
			@endif
			
			<script>
				CKEDITOR.replace( 'job_requirements' );
			</script>
			
            </div>
			
        </div>
		
		<br>
		<h6 style="border-bottom:1px solid #ddd; border-top:1px solid #ddd; text-align:center; background-color:#ccc; line-height: 30px;">Additional Job Details</h6>
		
		<div class="row">
            <div class="form-group col-md-4">
				<label for="Goal Score">Job Category: <span class="error-msg-star">*</span></label>
				<select class="form-control" name="job_category_id" id="job_category_id" >
					<option value="">-- Select Job Category --</option>
					@foreach($main_job_categories as $main_job_categorie)
					<option value="{{ $main_job_categorie['id']}}" @if(old('job_category_id')==$main_job_categorie['id']) selected @endif>
						{{ $main_job_categorie['name']}}
					</option>
					@endforeach
				</select>
				@if ($errors->has('job_category_id'))
					<span class="text-danger">{{ $errors->first('job_category_id') }}</span>
				@endif
            </div>
			
			<div class="form-group col-md-4">
				<label for="Goal Score">Types Of Job: <span class="error-msg-star">*</span></label>
				<select class="form-control" name="types_of_job_id" id="types_of_job_id" >
					<option value="">-- Select Types Of Job --</option>
					@foreach($job_categories as $job_categorie)
					<option value="{{ $job_categorie['id']}}" @if(old('types_of_job_id')==$job_categorie['id']) selected @endif>
						{{ $job_categorie['name']}}
					</option>
					@endforeach
				</select>
				@if ($errors->has('types_of_job_id'))
					<span class="text-danger">{{ $errors->first('types_of_job_id') }}</span>
				@endif
            </div>
			
			<div class="form-group col-md-4">
				<label for="Goal Score">Working Days: <span class="error-msg-star">*</span></label>
				<select class="form-control" name="working_days" id="working_days">
					<option value="">-- Select Working Days --</option>
					@foreach($working_days as $working_day)
					<option value="{{ $working_day['id']}}" @if(old('working_days')==$working_day['id']) selected @endif>
						{{ $working_day['name']}} 
					</option>
					@endforeach
				</select>
				@if ($errors->has('working_days'))
				<span class="text-danger">{{ $errors->first('working_days') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
              <label for="Goal Score">Working Hours: <span class="error-msg-star">*</span></label>
			  <input type="text" class="form-control" id="working_hours" name="working_hours" class="form-control" value="{{old('working_hours')}}" placeholder="Working Hours" maxlength="15">
			  @if ($errors->has('working_hours'))
				<span class="text-danger">{{ $errors->first('working_hours') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
                <label for="Goal Score">Experience :</label>
			    <select class="form-control" name="experience_required" id="experience_required">
					<option value="Fresher" @if(old('experience_required')=='Fresher') selected @endif>Fresher</option>
					<option value="Experience" @if(old('experience_required')=='Experience') selected @endif>Experience</option>
				</select>
			    @if ($errors->has('experience_required'))
					<span class="text-danger">{{ $errors->first('experience_required') }}</span>
				@endif
				
				@if(!empty(old('experience_required')) && (old('experience_required')=='Experience'))
					<div style="float:left; width:100%; margin-top:10px;" id="min_max_experience_div">
				@else
					<div style="float:left; width:100%; display:none; margin-top:10px;" id="min_max_experience_div">
				@endif
					
					<div style="float:left; width:49%;">
						<label for="Goal Score">Min Experience <span class="error-msg-star">*</span></label>
						<input type="text" class="form-control" id="min_experience_required" name="min_experience_required" class="form-control" value="{{old('min_experience_required')}}" style="padding: 8px 6px;" placeholder="Min Experience">
						@if ($errors->has('min_experience_required'))
						<span class="text-danger">{{ $errors->first('min_experience_required') }}</span>
						@endif
					</div>
					
					<div style="float:right; width:49%;">
						<label for="Goal Score">Max Experience <span class="error-msg-star">*</span></label>
						<input type="text" class="form-control" id="max_experience_required" name="max_experience_required" class="form-control" value="{{old('max_experience_required')}}" style="padding: 8px 6px;" placeholder="Max Experience">
						@if ($errors->has('max_experience_required'))
						<span class="text-danger">{{ $errors->first('max_experience_required') }}</span>
						@endif
					</div>
				
				</div>
            </div>
			
			<div class="form-group col-md-4">
              <label for="Goal Score">CTC: <span class="error-msg-star">*</span></label>
              <input type="text" class="form-control" id="ctc" name="ctc" class="form-control" value="{{old('ctc')}}" maxlength="8" style="padding: 8px 6px;" placeholder="CTC">
			  @if ($errors->has('ctc'))
				<span class="text-danger">{{ $errors->first('ctc') }}</span>
				@endif
            </div>
			
			<div class="form-group col-md-4">
              <label for="Goal Score">Skills: <span class="error-msg-star">*</span></label>
              <input type="text" class="form-control" id="skills" data-role="tagsinput" name="skills" class="form-control" value="{{old('skills')}}" style="padding: 8px 4px;"  placeholder="Skills">
			  <div class="skills-msg"></div>
			  @if ($errors->has('skills'))
				<span class="text-danger">{{ $errors->first('skills') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
				<label for="Goal Score">Qualification : <span class="error-msg-star">*</span></label>
				<select class="form-control" name="qualification_ids[]" id="qualification_ids" multiple>
					<option value="">-- Select Qualification --</option>
					@foreach($qualifications as $qualification)
					<option value="{{ $qualification['id']}}" @if(!empty(old('qualification_ids')) && (in_array($qualification['id'], old('qualification_ids')))) selected @endif>
						{{ $qualification['name']}}
					</option>
					@endforeach
				</select>
				@if ($errors->has('qualification_ids'))
					<span class="text-danger">{{ $errors->first('qualification_ids') }}</span>
				@endif
            </div>
			
			<div class="form-group col-md-4">
              <label for="Goal Score">Gender: <span class="error-msg-star">*</span></label><br>
			  &nbsp; &nbsp; &nbsp;<input type="radio" name="gender" value="Male" class="form-check-input" @if(old('gender')=='Male') checked @endif> Male &nbsp; &nbsp; &nbsp;
			  <input type="radio" name="gender" value="Female" class="form-check-input" @if(old('gender')=='Female') checked @endif> Female  &nbsp; &nbsp; &nbsp;
			  <input type="radio" name="gender" value="Both" class="form-check-input" @if(old('gender')=='Both') checked @endif> Both
			  @if ($errors->has('gender'))
				<span class="text-danger">{{ $errors->first('gender') }}</span>
				@endif
            </div>
			
			<div class="form-group col-md-12">
                <label for="Goal Score">Candidate Requirements:</label>
			    &nbsp; &nbsp; &nbsp;
				<input type="checkbox" name="candidate_requirements" value="Smartphone" class="form-check-input"> Smartphone &nbsp; &nbsp; &nbsp;
				<input type="checkbox" name="candidate_requirements" value="Computer/Laptop" class="form-check-input"> Computer/Laptop  &nbsp; &nbsp; &nbsp;
				<input type="checkbox" name="candidate_requirements" value="Wi-Fi/Internet" class="form-check-input"> Wi-Fi/Internet  &nbsp; &nbsp; &nbsp;
				<input type="checkbox" name="candidate_requirements" value="PAN Card" class="form-check-input"> PAN Card  &nbsp; &nbsp; &nbsp;
				<input type="checkbox" name="candidate_requirements" value="Adhar Card" class="form-check-input"> Adhar Card  &nbsp; &nbsp; &nbsp;
				<input type="checkbox" name="candidate_requirements" value="DL" class="form-check-input"> DL  &nbsp; &nbsp; &nbsp;
				<input type="checkbox" name="candidate_requirements" value="Two Wheelers" class="form-check-input"> Two Wheelers
            </div>
			
        </div>
		
		
		<div class="row">
			
			
			
			<div class="form-group col-md-7">
              <label for="Goal Score">English : </label><br>
			  &nbsp; &nbsp; &nbsp;
				<input type="radio" name="english_required" value="No English" class="form-check-input" @if(old('english_required')=='No English') checked @endif> No English &nbsp; &nbsp; &nbsp;
				<input type="radio" name="english_required" value="Basic English" class="form-check-input" @if(old('english_required')=='Basic English') checked @endif> Basic English  &nbsp; &nbsp; &nbsp;
				<input type="radio" name="english_required" value="Good English" class="form-check-input" @if(old('english_required')=='Good English') checked @endif> Good English  &nbsp; &nbsp; &nbsp;
				<input type="radio" name="english_required" value="Excellent/Fluent English" class="form-check-input" @if(old('english_required')=='Excellent/Fluent English') checked @endif> Excellent/Fluent English
			  @if ($errors->has('english_required'))
				<span class="text-danger">{{ $errors->first('english_required') }}</span>
			@endif
            </div>
			
        </div>
		
		
		<br>
		<h6 style="border-bottom:1px solid #ddd; border-top:1px solid #ddd; text-align:center; background-color:#ccc; line-height: 30px;">
			Interview Information
		</h6>
		
		<div class="row">
			
			<div class="form-group col-md-4">
              <label for="Goal Score">Company Name: <span class="error-msg-star">*</span></label>
              <input type="text" class="form-control" id="interview_information_company_name" name="interview_information_company_name" class="form-control" value="{{old('interview_information_company_name')}}" style="padding: 8px 6px;" placeholder="Company Name">
			  @if ($errors->has('interview_information_company_name'))
				<span class="text-danger">{{ $errors->first('interview_information_company_name') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
              <label for="Goal Score">HR Name: <span class="error-msg-star">*</span></label>
              <input type="text" class="form-control" id="interview_information_hr_name" name="interview_information_hr_name" class="form-control" value="{{old('interview_information_hr_name')}}" style="padding: 8px 6px;" placeholder="HR Name">
			  @if ($errors->has('interview_information_hr_name'))
				<span class="text-danger">{{ $errors->first('interview_information_hr_name') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
              <label for="Goal Score">HR Contact No: <span class="error-msg-star">*</span></label>
              <input type="text" class="form-control" id="interview_information_hr_number" name="interview_information_hr_number" class="form-control" value="{{old('interview_information_hr_number')}}" style="padding: 8px 6px;" maxlength="10" placeholder="HR Contact No">
			  @if ($errors->has('interview_information_hr_number'))
				<span class="text-danger">{{ $errors->first('interview_information_hr_number') }}</span>
			@endif
            </div>
			
        </div>
		
		<div class="row">
			
			<div class="form-group col-md-4">
              <label for="Goal Score">HR Email: <span class="error-msg-star">*</span></label>
              <input type="text" class="form-control" id="interview_information_hr_email" name="interview_information_hr_email" class="form-control" value="{{old('interview_information_hr_email')}}" style="padding: 8px 6px;" placeholder="HR Email">
			  @if ($errors->has('interview_information_hr_email'))
				<span class="text-danger">{{ $errors->first('interview_information_hr_email') }}</span>
			@endif
            </div>
			
        </div>
		
		<br>
		<h6 style="border-bottom:1px solid #ddd; border-top:1px solid #ddd; text-align:center; background-color:#ccc; line-height: 30px;">
			Job Address
		</h6>
		
		<div class="row">
			
			<div class="form-group col-md-4">
              <label for="Goal Score">Full Address: <span class="error-msg-star">*</span></label>
			  <textarea class="form-control" name="job_address_flat_address" id="job_address_flat_address" maxlength="500" placeholder="Full Address">{{old('job_address_flat_address')}}</textarea>
			  @if ($errors->has('job_address_flat_address'))
				<span class="text-danger">{{ $errors->first('job_address_flat_address') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
				<label for="Goal Score">State: <span class="error-msg-star">*</span></label>
				<select class="form-control" name="job_address_state" id="job_address_state" >
					<option value="">-- Select State --</option>
					@foreach($states_names as $states_name)
					
					<option value="{{ $states_name['id']}}" @if(old('job_address_state')==$states_name['id']) selected @endif>{{ $states_name['name']}}</option>
					@endforeach
				</select>
				@if ($errors->has('job_address_state'))
				<span class="text-danger">{{ $errors->first('job_address_state') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
				<label for="Goal Score">City: <span class="error-msg-star">*</span></label>
				<select class="form-control" name="job_address_city" id="job_address_city" >
					<option value="">-- Select City --</option>
					
					@if(!empty(old('job_address_city'))) 
						@foreach($job_locations as $job_location)
						<option value="{{ $job_location['id']}}" @if(old('job_address_city')==$job_location['id']) selected @endif>
							{{ $job_location['name']}} 
						</option>
						@endforeach
					@else 
						@foreach($cities_names as $cities_name)
							<option value="{{ $cities_name['id']}}">{{ $cities_name['name']}} </option>
						@endforeach
					@endif
					
				</select>
				@if ($errors->has('job_address_city'))
				<span class="text-danger">{{ $errors->first('job_address_city') }}</span>
			@endif
            </div>
			
        </div>
		
		
		<br>
		<h6 style="border-bottom:1px solid #ddd; border-top:1px solid #ddd; text-align:center; background-color:#ccc; line-height: 30px;">
			Interview Address
		</h6>
		
		<div class="row">
			
			<div class="form-group col-md-4">
              <label for="Goal Score">Full Address: <span class="error-msg-star">*</span></label>
			  <textarea class="form-control" name="interview_address_full_address" id="interview_address_full_address" maxlength="500" placeholder="Full Address">{{old('interview_address_full_address')}}</textarea>
			  @if ($errors->has('interview_address_full_address'))
				<span class="text-danger">{{ $errors->first('interview_address_full_address') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
				<label for="Goal Score">State: <span class="error-msg-star">*</span></label>
				<select class="form-control" name="interview_address_state" id="interview_address_state" >
					<option value="">-- Select State --</option>
					@foreach($states_names as $states_name)
					
					<option value="{{ $states_name['id']}}" @if(old('interview_address_state')==$states_name['id']) selected @endif>{{ $states_name['name']}}</option>
					@endforeach
				</select>
				@if ($errors->has('interview_address_state'))
				<span class="text-danger">{{ $errors->first('interview_address_state') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
				<label for="Goal Score">City: <span class="error-msg-star">*</span></label>
				<select class="form-control" name="interview_address_city" id="interview_address_city" >
					<option value="">-- Select City --</option>
					
					@if(!empty(old('interview_address_city'))) 
						@foreach($job_locations as $job_location)
						<option value="{{ $job_location['id']}}" @if(old('interview_address_city')==$job_location['id']) selected @endif>
							{{ $job_location['name']}} 
						</option>
						@endforeach
					@else 
						@foreach($cities_names as $cities_name)
							<option value="{{ $cities_name['id']}}">{{ $cities_name['name']}} </option>
						@endforeach
					@endif
					
					
				</select>
				@if ($errors->has('interview_address_city'))
				<span class="text-danger">{{ $errors->first('interview_address_city') }}</span>
			@endif
            </div>
			
        </div>
		
		<br>
		<h6 style="border-bottom:1px solid #ddd; border-top:1px solid #ddd; text-align:center; background-color:#ccc; line-height: 30px;">
			Fee Charged
		</h6>
		
		<div class="row">
			
			<div class="form-group col-md-6">
				<label for="Goal Score">If there any fee charged to the candidate?:</label>
				<select class="form-control" name="candidate_fee_charged" id="candidate_fee_charged" >
					<option value="No" @if(old('candidate_fee_charged')=='No') checked @endif>NO</option>
					<option value="Yes" @if(old('candidate_fee_charged')=='Yes') checked @endif>Yes</option>
				</select>
				@if ($errors->has('candidate_fee_charged'))
				<span class="text-danger">{{ $errors->first('candidate_fee_charged') }}</span>
				@endif
								
            </div>
			
			@if(!empty(old('candidate_fee_charged')) && (old('candidate_fee_charged')=='Yes'))
				<div class="form-group col-md-6" id="candidate_fee_charged_div">
			@else
				<div class="form-group col-md-6" id="candidate_fee_charged_div" style=" display:none;">
			@endif
				<div style="float:left; width:100%;">
					
					<div style="float:left; width:49%;">
						<label for="Goal Score">Fee Amount: <span class="error-msg-star">*</span></label>
						<input type="text" class="form-control" id="candidate_fee_amount" name="candidate_fee_amount" class="form-control" value="{{old('candidate_fee_amount')}}" style="padding: 8px 6px;" placeholder="Fee Amount">
						@if ($errors->has('candidate_fee_amount'))
						<span class="text-danger">{{ $errors->first('candidate_fee_amount') }}</span>
						@endif
					</div>
					
					<div style="float:right; width:49%;">
						<label for="Goal Score">Choose Reasons: <span class="error-msg-star">*</span></label>
						<select class="form-control" name="candidate_fee_reasons" id="candidate_fee_reasons" >
							<option value="">-- Select Reasons --</option>
							@foreach($fee_charged_reasons as $fee_charged_reason)
							<option value="{{$fee_charged_reason['id']}}" @if(old('candidate_fee_reasons')==$fee_charged_reason['id']) selected @endif>{{$fee_charged_reason['name']}}</option>
							@endforeach
						</select>
						@if ($errors->has('candidate_fee_reasons'))
						<span class="text-danger">{{ $errors->first('candidate_fee_reasons') }}</span>
						@endif
						
						
						@if(!empty(old('candidate_fee_reasons')) && (old('candidate_fee_reasons')=='5'))
						<div style="float:left; width:100%; margin-top:10px;" id="candidate_fee_other_reasons_div">
						@else
						<div style="float:left; width:100%; display:none; margin-top:10px;" id="candidate_fee_other_reasons_div">
						@endif
							<div style="float:left; width:100%;">
								<label for="Goal Score">Other Reasons: <span class="error-msg-star">*</span></label>
								<textarea class="form-control" name="candidate_fee_other_reasons" id="candidate_fee_other_reasons" maxlength="500" placeholder="Specify Other Reason">{{old('candidate_fee_other_reasons')}}</textarea>
								@if ($errors->has('candidate_fee_other_reasons'))
								<span class="text-danger">{{ $errors->first('candidate_fee_amount') }}</span>
								@endif
							</div>
						
						</div>
				
					</div>
				
				</div>
				
            </div>
			
        </div>
		
		
      </div>
      <div class="modal-footer">
		<a href="">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		</a>
        <button  class="btn btn-success" id="submit-btn">Post New Job</button>
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
			
			
			/* call job address city ajax function, start here */
			$('#job_address_state').on('change', function(){
				
				var state_idsj = this.value;
				console.log(state_idsj);
				
				$.ajax({
					url: "{{url('get-cities-by-state')}}", 
					type: "POST",  
					data:{
						state_ids:state_idsj,
						_token: '{{csrf_token()}}'
					},  
					dataType : 'json',
					success:function(result){
						$('#job_address_city').html('<option value="">-- Select City --</option>');  
						
						$.each(result.cities,function(key,value){
							$("#job_address_city").append('<option value="'+value.id+'">'+value.name+'</option>');
						});
				   }  

			   });  
			   
			});
			/* call job address city ajax function, end here */
			
			
			/* call interview address city ajax function, start here */
			$('#interview_address_state').on('change', function(){
				
				var state_idsi = this.value;
				console.log(state_idsi);
				
				$.ajax({
					url: "{{url('get-cities-by-state')}}", 
					type: "POST",  
					data:{
						state_ids:state_idsi,
						_token: '{{csrf_token()}}'
					},  
					dataType : 'json',
					success:function(result){
						$('#interview_address_city').html('<option value="">-- Select City --</option>');  
						
						$.each(result.cities,function(key,value){
							$("#interview_address_city").append('<option value="'+value.id+'">'+value.name+'</option>');
						});
				   }  

			   });  
			   
			});
			/* call interview address city ajax function, end here */
			
			
			
			<!-- show and hide experience div, start here -->
			$('#experience_required').on('change', function(){
				
				var val=this.value;
				console.log(val);
				
				if(val=='Experience'){
					$('#min_max_experience_div').show();
				} else {
					$('#min_max_experience_div').hide();
				}
			});
			<!-- show and hide experience div, end here -->
			
			<!-- show and hide fee charged div, start here -->
			$('#candidate_fee_charged').on('change', function(){
				
				var val=this.value;
				console.log(val);
				
				if(val=='Yes'){
					$('#candidate_fee_charged_div').show();
				} else {
					$('#candidate_fee_charged_div').hide();
				}
			});
			<!-- show and hide fee charged div, end here -->
			
			
			<!-- show and hide other fee charged reasons div, start here -->
			$('#candidate_fee_reasons').on('change', function(){
				
				var vall=this.value;
				console.log(vall);
				
				if(vall=='5'){
					$('#candidate_fee_other_reasons_div').show();
				} else {
					$('#candidate_fee_other_reasons_div').hide();
				}
			});
			<!-- show and hide other fee charged reasons div, end here -->
			

            });
      </script>

@endsection
