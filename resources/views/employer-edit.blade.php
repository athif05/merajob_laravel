@extends("layouts.master")

@section("title")

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ env('MY_SITE_NAME') }}"/>
    <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive"/>
    <meta name="author" content="{{ env('MY_SITE_AUTHOR') }}"/>

    <title>Employer Profile | {{ env('MY_SITE_NAME') }}</title>
	
	<style>
		.home_btn2{
			width: 200px!important;
		}
		
		.error-msg-star { color:red;}
	</style>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script> 

<style>
.team-details-area .container {
    padding-top: 15px;
    padding-bottom: 111px;
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
				@if(empty($employer_details[0]['employer_id']))
					<?php $employer_id=session('login_user_data')[0]['id'];?>
					@if(!empty(session('login_user_data')[0]['name']) ) {{ session('login_user_data')[0]['name'] }} @endif
				@else
					<?php $employer_id=$employer_details[0]['employer_id'];?>
					{{$employer_details[0]['company_name']}}
				@endif
			  </h2>
              <nav class="breadcrumb-area">
                <ul class="breadcrumb justify-content-center">
                  <li><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>Employer Details</li>
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
      <div class="container" style="padding-top: 15px;">
		<!-- Trigger the modal with a button -->
  
    <form method="post" action="{{ route('employer-details.update')}}" id="myForm" enctype="multipart/form-data">
        @csrf
  <!-- Modal -->
  <div class="" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	
		<div class="modal-header">
      	
        <h5 class="modal-title">Company Information</h5>
               
      </div>
	  
      <div class="modal-body">
		
		<input type="hidden" name="edit_id" id="edit_id" value="{{$employer_id}}">
		
        <div class="row">
            <div class="form-group col-md-4">
              <label for="Name">Company Name: <span class="error-msg-star">*</span></label>
              <input type="text" class="form-control" name="company_name" id="company_name" maxlength="50" value="{{$employer_details[0]['company_name']}}" >
			  <div class="name-msg"></div>
				@if ($errors->has('company_name'))
				<span class="text-danger">{{ $errors->first('company_name') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
                <label for="Club">Email: <span class="error-msg-star">*</span></label>
                <input type="text" class="form-control" name="email" id="email" value="{{$employer_details[0]['email']}}" maxlength="50">
				<div class="email-msg"></div> 
				@if ($errors->has('email'))
				<span class="text-danger">{{ $errors->first('email') }}</span>
			@endif
            </div> 
			
			<div class="form-group col-md-4">
                <label for="Country">Mobile Number: <span class="error-msg-star">*</span></label>
                <input type="text" class="form-control" name="mobile_number" id="mobile_number" maxlength="10" value="{{$employer_details[0]['mobile_number']}}" >
				<div class="mobile_number-msg"></div>
				@if ($errors->has('mobile_number'))
				<span class="text-danger">{{ $errors->first('mobile_number') }}</span>
			@endif
            </div>
        </div>
		  
        <div class="row">
			<div class="form-group col-md-4">
              <label for="Goal Score">Company Phone: <span class="error-msg-star">*</span></label>
              <input type="text" class="form-control" name="company_phone" id="company_phone" maxlength="20" value="{{$employer_details[0]['company_phone']}}" >
			  <div class="company_phone-msg"></div>
			  @if ($errors->has('company_phone'))
				<span class="text-danger">{{ $errors->first('company_phone') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
              <label for="Goal Score">Company Address: <span class="error-msg-star">*</span></label>
			  <textarea class="form-control" name="company_address" id="company_address" maxlength="500" >{{$employer_details[0]['company_address']}}</textarea>
			  <div class="company_address-msg"></div>
			  @if ($errors->has('company_address'))
				<span class="text-danger">{{ $errors->first('company_address') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
              <label for="Goal Score">About Company: <span class="error-msg-star">*</span></label>
			  <textarea class="form-control" name="about_company" id="about_company" maxlength="500" >{{$employer_details[0]['about_company']}}</textarea>
			  <div class="about_company-msg"></div>
			  @if ($errors->has('about_company'))
				<span class="text-danger">{{ $errors->first('about_company') }}</span>
			@endif
            </div>
        </div>
		
		<div class="row">
            <div class="form-group col-md-4">
				<label for="Goal Score">Company Domain: <span class="error-msg-star">*</span></label>
				<select class="form-control" name="company_domain_id" id="company_domain_id" >
					<option value="">-- Select State --</option>
					@foreach($company_domains as $company_domain)
					
					<option value="{{ $company_domain['id']}}" @if($employer_details[0]['company_domain_id']==$company_domain['id']) selected @endif>{{ $company_domain['name']}}</option>
					@endforeach
				</select>
				<div class="company_domain_id-msg"></div>
				@if ($errors->has('company_domain_id'))
				<span class="text-danger">{{ $errors->first('company_domain_id') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
				<label for="Goal Score">Company Established Year: <span class="error-msg-star">*</span></label>
				<input type="text" class="form-control" name="company_established_year" id="company_established_year" maxlength="10" value="{{$employer_details[0]['company_established_year']}}" >
				<div class="company_established_year-msg"></div>
				@if ($errors->has('company_established_year'))
					<span class="text-danger">{{ $errors->first('company_established_year') }}</span>
				@endif
            </div>
			
			<div class="form-group col-md-4">
				<label for="Goal Score">Team Member: <span class="error-msg-star">*</span></label>
				<input type="text" class="form-control" name="team_member" id="team_member" maxlength="10" value="{{$employer_details[0]['team_member']}}" >
				<div class="team_member-msg"></div>
				@if ($errors->has('team_member'))
					<span class="text-danger">{{ $errors->first('team_member') }}</span>
				@endif
            </div>
			
        </div>
		
		<div class="row">
			<div class="form-group col-md-4">
				<label for="Goal Score">Company Website: <span class="error-msg-star">*</span></label>
				<input type="text" class="form-control" name="company_website" id="company_website" maxlength="50" value="{{$employer_details[0]['company_website']}}" >
				<div class="company_website-msg"></div>
				@if ($errors->has('company_website'))
					<span class="text-danger">{{ $errors->first('company_website') }}</span>
				@endif
            </div>
			
            <div class="form-group col-md-4">
				<label for="Goal Score">State: <span class="error-msg-star">*</span></label>
				<select class="form-control" name="state_id" id="state_id" >
					<option value="">-- Select State --</option>
					@foreach($states_names as $states_name)
					
					<option value="{{ $states_name['id']}}" @if($employer_details[0]['state_id']==$states_name['id']) selected @endif>{{ $states_name['name']}}</option>
					@endforeach
				</select>
				<div class="state_id-msg"></div>
				@if ($errors->has('state_id'))
				<span class="text-danger">{{ $errors->first('state_id') }}</span>
			@endif
            </div>
			
			<div class="form-group col-md-4">
				<label for="Goal Score">City: <span class="error-msg-star">*</span></label>
				<select class="form-control" name="city_id" id="city_id" >
					<option value="">-- Select City --</option>
					@foreach($cities_names as $cities_name)
					<option value="{{ $cities_name['id']}}" @if($employer_details[0]['city_id']==$cities_name['id']) selected @endif>{{ $cities_name['name']}} </option>
					@endforeach
				</select>
				<div class="city_id-msg"></div>
				@if ($errors->has('city_id'))
				<span class="text-danger">{{ $errors->first('city_id') }}</span>
			@endif
            </div>
			
        </div>
		
		<div class="row">
			
			<div class="form-group col-md-4">
				<label for="Goal Score">Facebook Link:</label>
				<input type="text" class="form-control" name="facebook_links" id="facebook_links" value="{{$employer_details[0]['facebook_links']}}" >
            </div>
			
			<div class="form-group col-md-4">
				<label for="Goal Score">Twitter Link:</label>
				<input type="text" class="form-control" name="twitter_links" id="twitter_links" value="{{$employer_details[0]['twitter_links']}}" >
            </div>
			
			<div class="form-group col-md-4">
				<label for="Goal Score">Skype Link:</label>
				<input type="text" class="form-control" name="skype_links" id="skype_links" value="{{$employer_details[0]['skype_links']}}" >
            </div>
			
        </div>
		
		<div class="row">
			
			<div class="form-group col-md-4">
				<label for="Goal Score">Pinterest Link:</label>
				<input type="text" class="form-control" name="pinterest_links" id="pinterest_links" value="{{$employer_details[0]['pinterest_links']}}" >
            </div>
			
			<div class="form-group col-md-4">
              <label for="Goal Score">Upload Logo <span class="error-msg-star">*</span></label>
              <input type="file" class="form-control" name="company_logo" id="company_logo" accept="image/png, image/jpeg, image/jpg" >
			  <div class="company_logo-msg"></div>
			  @if ($errors->has('company_logo'))
				<span class="text-danger">{{ $errors->first('company_logo') }}</span>
			@endif
			
			@if($employer_details[0]['company_logo'])
					<img src="{{asset('').$employer_details[0]['company_logo']}}" width="100" height="100" alt="Image-HasTech" style="margin-top:10px">		
			@endif
				
            </div>
			
        </div>
			  
      </div>
      <div class="modal-footer">
		<a href="{{ url('/employers-details/'.$employer_id)}}">
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
			   

            });
      </script>

@endsection
