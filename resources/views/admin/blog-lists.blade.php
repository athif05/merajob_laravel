@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Manage Blogs | {{ env('MY_SITE_NAME') }}</title>
	
@endsection


@section("content")
  
  <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-md-12">
			
			@if(session()->has('success'))
				<div class="alert alert-success">
					{{ session()->get('success') }}
				</div>
			@endif
			
			<div class="">
				<div class="row">
					<div class="col-md-6">
					  <h5 class="mb-2 text-titlecase mb-4">Manage Blogs</h5>
					</div>
					
					<div class="col-md-6 text-right">
						<button type="button" class="btn btn-primary" style="width:190px; height:35px; padding:2px !important;" onclick="location.href = '{{ url('admin/add-new-blog')}}';">
						  Add New Blog
						</button>
					</div>
				
				
				</div>
			</div>
			
			
              <div class="card">
                <div class="table-responsive pt-3">
                  <table class="table table-striped project-orders-table" id="my_datatable">
                    <thead>
                      <tr>
                        <th class="ml-5">#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Actions</th>
						<th>Status</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $j=1;?>
					  @foreach($blogs as $blog)
					  <tr>
                        <td><?php echo $j;?>.</td>
                        <td>{{ $blog['title']}}</td>
                        <td>
                        	<div id="read_less_span_{{ $blog['id']}}">
                        		<?php echo substr($blog['description'],0,40);?>
                        		<span style="color: red; cursor: pointer;" onclick="read_more('1',{{$blog['id']}})">Read More...</span>
                        	</div>

                        	<div id="read_more_span_{{ $blog['id']}}" style="display: none;">
                        		<?php echo $blog['description'];?>
                        		<span style="color: green; cursor: pointer;" onclick="read_more('2',{{$blog['id']}})">Read Less...</span>
                        	</div>
                        </td>
                        <td>
                        	@if($blog['image'])
								<img src="{{asset('').$blog['image']}}" style="width: 100px; height: 120px; border-radius: 0px;">		
							@endif
                        </td>
                        <td>{{ $blog['author_name']}}</td>
                        <td>{{ $blog['blog_category_name']}}</td>
                        <td>
                          <div class="d-flex align-items-center">
                            <a href="{{ url('/admin/blog-edit/'.$blog['id'])}}">
								<button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
								  Edit
								  <i class="typcn typcn-edit btn-icon-append"></i>                          
								</button>
							</a>
                          </div>
                        </td>
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="blog_{{ $blog['id']}}" @if($blog['status']=='1') checked @endif onclick="blog_status_fun({{ $blog['id']}})">
								<span class="toggle-slider round"></span>
							</label> 
					  
						</td>
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="blog_del_{{ $blog['id']}}" @if($blog['is_deleted']=='1') checked @endif onclick="blog_delete_fun({{ $blog['id']}})">
								<span class="toggle-slider round"></span>
							</label> 
					  
						</td>
                      </tr>
					  <?php $j++;?>
                      @endforeach
                    </tbody>
                  </table>
				  
				  <div class="row">
          <div class="col-lg-12 text-center">
            <div class="pagination-area">
              <nav>
                <ul class="page-numbers d-inline-flex">
				
				{{$blogs->links()}}
				
                </ul>
              </nav>
            </div>
          </div>
        </div>
		
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- content-wrapper ends -->
        
		@include('admin/partials.footer')
		
      </div>
	  
	  
	  <script type="text/javascript">
	  
	  /*show/hide description*/
	  function read_more(val, id){
	  	console.log(val+'/'+id);

	  	document.getElementById('read_less_span_'+id).style.display='none';
	  	document.getElementById('read_more_span_'+id).style.display='none';

	  	if(val=='1'){
	  		document.getElementById('read_more_span_'+id).style.display='block';
	  	} else if(val=='2'){
	  		document.getElementById('read_less_span_'+id).style.display='block';
	  	}

	  }


	  $(document).ready(function() {
  $('#my_datatable').DataTable({
    pageLength: 10,
    filter: true,
    deferRender: true,
    scrollY: 200,
    scrollCollapse: true,
    scroller: true,
    "searching": true,
  });
});

		function blog_delete_fun(blog_id){
			
			var checkBox = document.getElementById('blog_del_'+blog_id);
			
			if (checkBox.checked == true){
				var blog_del_status=1;
			} else {
				var blog_del_status=0;
			}
  
			console.log(blog_del_status);
			
			$.ajax({
				url: "{{url('admin/delete-blog')}}", 
				type: "POST",  
				data:{
					blog_id:blog_id,
					blog_del_status:blog_del_status,
					_token: '{{csrf_token()}}'
				},
				success:function(result){
					
					swal("Poof! blog has been deleted!", {
						  icon: "success",
					});		
			   }  

			});
				
		}

		
		function blog_status_fun(blog_id){
			
			console.log(blog_id);
			
			var checkBox = document.getElementById('blog_'+blog_id);
			
			if (checkBox.checked == true){
				var blog_status=1;
			} else {
				var blog_status=0;
			}
  
			console.log(blog_status);
			
			$.ajax({
				url: "{{url('admin/update-blog-status')}}", 
				type: "POST",  
				data:{
					blog_id:blog_id,
					blog_status:blog_status,
					_token: '{{csrf_token()}}'
				},
				success:function(result){
					
					swal("Poof! Status has been updated!", {
						icon: "success",
					});				
			   }  

			});
				
		}
		
	</script>
	  
@endsection