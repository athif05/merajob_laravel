@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Manage Contact-Us | {{ env('MY_SITE_NAME') }}</title>
	
@endsection


@section("content")
  
  <div class="main-panel">
        <div class="content-wrapper">

          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

            	@if(session()->has('success'))
				<div class="alert alert-success">
					{{ session()->get('success') }}
				</div>
				@endif

                  <h4 class="card-title">Manage Contact-Us</h4>
                  <form method="post" action="{{ route('admin/update-contact-us.update')}}" class="forms-sample" enctype="multipart/form-data">
					@csrf
		
					<input type="hidden" name="edit_id" id="edit_id" value="{{$contactus_details['id']}}">
		
                    <div class="form-group">
                      <label for="name">Email 1</label>
                      <input type="text" class="form-control" id="email1" name="email1" placeholder="Email 1" value="{{ $contactus_details['email1']}}">
						@if ($errors->has('email1'))
							<span class="text-danger">{{ $errors->first('email1') }}</span>
						@endif
                    </div>

                    <div class="form-group">
                      <label for="name">Email 2</label>
                      <input type="text" class="form-control" id="email2" name="email2" placeholder="Email 2" value="{{ $contactus_details['email2']}}">
                    </div>

                    <div class="form-group">
                      <label for="name">Contact Number 1</label>
                      <input type="text" class="form-control" id="contact_number1" name="contact_number1" placeholder="Contact Number 1" value="{{ $contactus_details['contact_number1']}}">
						@if ($errors->has('contact_number1'))
							<span class="text-danger">{{ $errors->first('contact_number1') }}</span>
						@endif
                    </div>

                    <div class="form-group">
                      <label for="name">Contact Number 2</label>
                      <input type="text" class="form-control" id="contact_number2" name="contact_number2" placeholder="Contact Number 2" value="{{ $contactus_details['contact_number2']}}">
                    </div>


                    <div class="form-group">
                      <label for="name">Address Line 1</label>
                      <textarea rows="3" class="form-control" id="address_line1" name="address_line1" placeholder="Address Line 1">{{ $contactus_details['address_line1']}}</textarea>
						@if ($errors->has('address_line1'))
							<span class="text-danger">{{ $errors->first('address_line1') }}</span>
						@endif
                    </div>

                    <div class="form-group">
                      <label for="name">Address Line 2</label>
                      <textarea rows="3" class="form-control" id="address_line2" name="address_line2" placeholder="Address Line 2">{{ $contactus_details['address_line2']}}</textarea>
                    </div>


                    <div class="form-group">
                      <label for="name">Google Map</label>
                      <input type="text" class="form-control" name="google_map" id="google_map" value="{{ $contactus_details['google_map']}}">
					
						@if ($errors->has('google_map'))
							<span class="text-danger">{{ $errors->first('google_map') }}</span>
						@endif
                    </div>

					
                    <button type="submit" class="btn btn-primary mr-2">Update Cotact-Us</button>
				
                    
                  </form>
                </div>
              </div>
            </div>

        </div>
        <!-- content-wrapper ends -->
        
		@include('admin/partials.footer')
		
      </div>
	  
@endsection