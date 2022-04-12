@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Edit Main Job Category | {{ env('MY_SITE_NAME') }}</title>
	
@endsection


@section("content")
  
  <div class="main-panel">
        <div class="content-wrapper">

          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Main Job Category</h4>
                  <form method="post" action="{{ route('admin/update-main-job-domain.update')}}" class="forms-sample">
					@csrf
		
					<input type="hidden" name="edit_id" id="edit_id" value="{{$main_job_category_details['id']}}">
		
                    <div class="form-group">
                      <label for="name">Category Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $main_job_category_details['name']}}">
						@if ($errors->has('name'))
							<span class="text-danger">{{ $errors->first('name') }}</span>
						@endif
                    </div>
					
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
					
					<a href="{{URL::previous()}}">
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