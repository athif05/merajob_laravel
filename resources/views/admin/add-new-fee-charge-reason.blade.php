@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Add Fee Charge Reason | {{ env('MY_SITE_NAME') }}</title>
	
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
			
                  <h4 class="card-title">Add New Fee Charge Reason</h4>
                  <form method="post" action="{{ route('admin/add-new-fee-charge-reason.add')}}" class="forms-sample">
					@csrf
		
                    <div class="form-group">
                      <label for="name">Fee Charge Reason</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name')}}">
						@if ($errors->has('name'))
							<span class="text-danger">{{ $errors->first('name') }}</span>
						@endif
                    </div>
					
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
					
					<a href="{{ url('admin/manage-fee-charge-reasons')}}">
						<span class="btn btn-light">Cancel</span>
					</a>
                    
                  </form>
                </div>
              </div>
            </div>

        </div>
        <!-- content-wrapper ends -->
        
		@include('admin/partials.footer')
		
      </div>
	  
@endsection