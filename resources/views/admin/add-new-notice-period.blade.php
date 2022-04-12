@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Add Notice Period | {{ env('MY_SITE_NAME') }}</title>
	
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
			
                  <h4 class="card-title">Add New Notice Period</h4>
                  <form method="post" action="{{ route('admin/add-new-notice-period.add')}}" class="forms-sample">
					@csrf
		
                    <div class="form-group">
                      <label for="name">Notice Period Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name')}}">
						@if ($errors->has('name'))
							<span class="text-danger">{{ $errors->first('name') }}</span>
						@endif
                    </div>
					
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
					
					<a href="{{ url('admin/manage-notice-periods')}}">
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