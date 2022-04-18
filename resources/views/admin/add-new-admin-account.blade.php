@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Create Account | {{ env('MY_SITE_NAME') }}</title>
	
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
			
                  <h4 class="card-title">Create Account</h4>
                  <form method="post" action="{{ route('admin/add-new-admin-account.add')}}" class="forms-sample">
					@csrf

                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name')}}">
						@if ($errors->has('name'))
							<span class="text-danger">{{ $errors->first('name') }}</span>
						@endif
                    </div>

                    <div class="form-group">
                      <label for="name">Email</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email')}}">
						@if ($errors->has('email'))
							<span class="text-danger">{{ $errors->first('email') }}</span>
						@endif
                    </div>

                    <div class="form-group">
                      <label for="name">Mobile Number</label>
                      <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number" value="{{ old('mobile_number')}}">
						@if ($errors->has('mobile_number'))
							<span class="text-danger">{{ $errors->first('mobile_number') }}</span>
						@endif
                    </div>

                    <div class="form-group">
                      <label for="name">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('password')}}">
						@if ($errors->has('password'))
							<span class="text-danger">{{ $errors->first('password') }}</span>
						@endif
                    </div>

                    <div class="form-group">
                      <label for="name">Role</label>
                      <select name="role_id" class="form-control" id="role_id">
						<option value="">-- Blog Category Name --</option>
						  @foreach($roles as $role)
						  	<option value="{{ $role['id']}}" @if(old('role_id')==$role['id']) selected @endif>
						  		{{ $role['name']}}
						  	</option>
						  @endforeach
						</select>
						@if ($errors->has('role_id'))
							<span class="text-danger">{{ $errors->first('role_id') }}</span>
						@endif
                    </div>
					
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
					
					<a href="{{ url('admin/manage-blog-authors')}}">
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