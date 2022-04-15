@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Edit Blog Author | {{ env('MY_SITE_NAME') }}</title>
	
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
			
                  <h4 class="card-title">Edit Blog Author</h4>
                  <form method="post" action="{{ route('admin/update-blog-author.update')}}" class="forms-sample">
					@csrf

					<input type="hidden" name="edit_id" id="edit_id" value="{{$author_details['id']}}">
					
					<div class="form-group">
                      <label for="name">Blog Category Name</label>
                      <select name="blog_category_id" class="form-control" id="blog_category_id">
						<option value="">-- Blog Category Name --</option>
						  @foreach($blogCategories as $blogCategorie)
						  	<option value="{{ $blogCategorie['id']}}" @if($blogCategorie['id']==$author_details['blog_category_id']) selected @endif>
						  		{{ $blogCategorie['name']}}
						  	</option>
						  @endforeach
						</select>
						@if ($errors->has('blog_category_id'))
							<span class="text-danger">{{ $errors->first('blog_category_id') }}</span>
						@endif
                    </div>

                    <div class="form-group">
                      <label for="name">Author Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $author_details['name']}}">
						@if ($errors->has('name'))
							<span class="text-danger">{{ $errors->first('name') }}</span>
						@endif
                    </div>

                    <div class="form-group">
                      <label for="name">Email</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $author_details['email']}}">
						@if ($errors->has('email'))
							<span class="text-danger">{{ $errors->first('email') }}</span>
						@endif
                    </div>

                    <div class="form-group">
                      <label for="name">Mobile Number</label>
                      <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number" value="{{ $author_details['mobile_number']}}">
						@if ($errors->has('mobile_number'))
							<span class="text-danger">{{ $errors->first('mobile_number') }}</span>
						@endif
                    </div>

                    <div class="form-group">
                      <label for="name">Alternate Number</label>
                      <input type="text" class="form-control" id="alternate_number" name="alternate_number" placeholder="Alternate Number" value="{{ $author_details['alternate_number']}}">
                    </div>

                    <div class="form-group">
                      <label for="name">Address</label>
                      <textarea rows="5" class="form-control" id="address" name="address" placeholder="Address">{{ $author_details['address']}}</textarea>
						@if ($errors->has('address'))
							<span class="text-danger">{{ $errors->first('address') }}</span>
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