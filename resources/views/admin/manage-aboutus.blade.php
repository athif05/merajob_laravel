@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Manage About-Us | {{ env('MY_SITE_NAME') }}</title>

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
				
                  <h4 class="card-title">Manage About-Us</h4>
                  <form method="post" action="{{ route('admin/update-about-us.update')}}" class="forms-sample" enctype="multipart/form-data">
					@csrf
		
					<input type="hidden" name="edit_id" id="edit_id" value="{{$aboutus_details['id']}}">
		
                    <div class="form-group">
                      <label for="name">Title</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ $aboutus_details['title']}}">
						@if ($errors->has('title'))
							<span class="text-danger">{{ $errors->first('title') }}</span>
						@endif
                    </div>


                    <div class="form-group">
                      <label for="name">Description</label>
                      <textarea rows="10" class="form-control" id="description" name="description" placeholder="Description">{{ $aboutus_details['description']}}</textarea>
						@if ($errors->has('description'))
							<span class="text-danger">{{ $errors->first('description') }}</span>
						@endif

						<script>
							CKEDITOR.replace( 'description' );
						</script>
                    </div>


                    <div class="form-group">
                      <label for="name">Image</label>
                      <input type="file" class="form-control" name="image" id="image" accept="image/png, image/jpeg, image/jpg" >
					
						@if ($errors->has('image'))
							<span class="text-danger">{{ $errors->first('image') }}</span>
						@endif
						
						@if($aboutus_details['image'])
								<img src="{{asset('').$aboutus_details['image']}}" width="100" height="100" alt="Image-HasTech" style="margin-top:10px">		
						@endif
                    </div>

					
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
				
                    
                  </form>
                </div>
              </div>
            </div>

        </div>
        <!-- content-wrapper ends -->
        
		@include('admin/partials.footer')
		
		<script type="text/javascript">
$(function() {
    $('#description').ckeditor({
        toolbar: 'Full',
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
    });
});
</script>

      </div>
	  
@endsection