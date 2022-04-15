@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Edit Blog | {{ env('MY_SITE_NAME') }}</title>

	<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
	
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
			
                  <h4 class="card-title">Edit Blog</h4>
                  <form method="post" action="{{ route('admin/update-blog.update')}}" class="forms-sample" enctype="multipart/form-data">
					@csrf

					<input type="hidden" name="edit_id" id="edit_id" value="{{$blog_details['id']}}">

                    <div class="form-group">
                      <label for="name">Title</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{$blog_details['title']}}">
						@if ($errors->has('title'))
							<span class="text-danger">{{ $errors->first('title') }}</span>
						@endif
                    </div>

                    <div class="form-group">
                      <label for="name">Description</label>
                      <textarea rows="10" class="form-control" id="description" name="description" placeholder="Description">{{$blog_details['description']}}</textarea>
						@if ($errors->has('description'))
							<span class="text-danger">{{ $errors->first('description') }}</span>
						@endif

						<script>
							CKEDITOR.replace( 'description' );
						</script>
                    </div>

                    <div class="form-group">
                      <label for="name">Blog Category Name</label>
                      <select name="blog_category_id" class="form-control" id="blog_category_id">
						<option value="">-- Blog Category Name --</option>
						  @foreach($blogCategories as $blogCategorie)
						  	<option value="{{ $blogCategorie['id']}}" @if($blogCategorie['id']==$blog_details['blog_category_id']) selected @endif>
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
                      <select name="author_id" class="form-control" id="author_id">
						<option value="">-- Author Name --</option>
						  @foreach($authors as $author)
						  	<option value="{{ $author['id']}}" @if($author['id']==$blog_details['author_id']) selected @endif>
						  		{{ $author['name']}}
						  	</option>
						  @endforeach
						</select>
						@if ($errors->has('author_id'))
							<span class="text-danger">{{ $errors->first('author_id') }}</span>
						@endif
                    </div>

                    <div class="form-group">
                      <label for="name">Image</label>
                      <input type="file" class="form-control" name="image" id="image" accept="image/png, image/jpeg, image/jpg" >

						@if($blog_details['image'])
								<img src="{{asset('').$blog_details['image']}}" width="100" height="100" alt="Image-HasTech" style="margin-top:10px">		
						@endif
						
                    </div>
					
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
					
					<a href="{{ url('admin/blog-lists')}}">
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