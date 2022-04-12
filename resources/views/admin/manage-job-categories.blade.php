@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Manage Job Categories | {{ env('MY_SITE_NAME') }}</title>
	
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
					  <h5 class="mb-2 text-titlecase mb-4">Manage Job Categories</h5>
					</div>
					
					<div class="col-md-6 text-right">
						<button type="button" class="btn btn-primary" style="width:190px; height:35px; padding:2px !important;" onclick="location.href = '{{ url('admin/add-new-job-categories')}}';">
						  Add New Job Categories
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
                        <th>Name</th>
                        <th>Actions</th>
						<th>Status</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $j=1;?>
					  @foreach($categories as $categorie)
					  <tr>
                        <td><?php echo $j;?>.</td>
                        <td>{{ $categorie['name']}}</td>
                        <td>
                          <div class="d-flex align-items-center">
                            <a href="{{ url('/admin/job-category-edit/'.$categorie['id'])}}">
								<button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
								  Edit
								  <i class="typcn typcn-edit btn-icon-append"></i>                          
								</button>
							</a>
                          </div>
                        </td>
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="categorie_{{ $categorie['id']}}" @if($categorie['status']=='1') checked @endif onclick="categorie_status_fun({{ $categorie['id']}})">
								<span class="toggle-slider round"></span>
							</label> 
					  
						</td>
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="categorie_del_{{ $categorie['id']}}" @if($categorie['is_deleted']=='1') checked @endif onclick="categorie_delete_fun({{ $categorie['id']}})">
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
				
				{{$categories->links()}}
				
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

		function categorie_delete_fun(categorie_id){
			
			var checkBox = document.getElementById('categorie_del_'+categorie_id);
			
			if (checkBox.checked == true){
				var categorie_del_status=1;
			} else {
				var categorie_del_status=0;
			}
  
			console.log(categorie_del_status);
			
			$.ajax({
				url: "{{url('admin/delete-job-category')}}", 
				type: "POST",  
				data:{
					categorie_id:categorie_id,
					categorie_del_status:categorie_del_status,
					_token: '{{csrf_token()}}'
				},
				success:function(result){
					
					swal("Poof! Job Categorie has been deleted!", {
						  icon: "success",
					});		
			   }  

			});
				
		}

		
		function categorie_status_fun(categorie_id){
			
			console.log(categorie_id);
			
			var checkBox = document.getElementById('categorie_'+categorie_id);
			
			if (checkBox.checked == true){
				var categorie_status=1;
			} else {
				var categorie_status=0;
			}
  
			console.log(categorie_status);
			
			$.ajax({
				url: "{{url('admin/update-job-categorie-status')}}", 
				type: "POST",  
				data:{
					categorie_id:categorie_id,
					categorie_status:categorie_status,
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