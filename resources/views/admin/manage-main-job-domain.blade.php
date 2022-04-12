@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Manage Job Domain | {{ env('MY_SITE_NAME') }}</title>
	
	<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>-->
	
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
					  <h5 class="mb-2 text-titlecase mb-4">Manage Job Domain</h5>
					</div>
					
					<div class="col-md-6 text-right">
						<button type="button" class="btn btn-primary" style="width:auto; padding: 2px 8px 2px 8px; height:35px;" onclick="location.href = '{{ url("admin/add-new-main-job-domain")}}';">
						  Add New Main Job Domain
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
					  @foreach($main_job_categories as $main_job_categorie)
					  <tr>
                        <td><?php echo $j;?>.</td>
                        <td>{{ $main_job_categorie['name']}}</td>
                        <td>
                          <div class="d-flex align-items-center">
                            <a href="{{ url('/admin/main-job-domain-edit/'.$main_job_categorie['id'])}}">
								<button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
								  Edit
								  <i class="typcn typcn-edit btn-icon-append"></i>                          
								</button>
							</a>
                          </div>
                        </td>
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="category_{{ $main_job_categorie['id']}}" @if($main_job_categorie['status']=='1') checked @endif onclick="category_status_fun({{ $main_job_categorie['id']}})">
								<span class="toggle-slider round"></span>
							</label> 
					  
						</td>
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="category_del_{{ $main_job_categorie['id']}}" @if($main_job_categorie['is_deleted']=='1') checked @endif onclick="category_delete_fun({{ $main_job_categorie['id']}})">
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
				
				{{$main_job_categories->links()}}
				
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

		function category_delete_fun(category_id){
			
			var checkBox = document.getElementById('category_del_'+category_id);
			
			if (checkBox.checked == true){
				var category_del_status=1;
			} else {
				var category_del_status=0;
			}
  
			console.log(category_del_status);
			
			$.ajax({
				url: "{{url('admin/delete-main-job-domain')}}", 
				type: "POST",  
				data:{
					category_id:category_id,
					category_del_status:category_del_status,
					_token: '{{csrf_token()}}'
				},
				success:function(result){
					
					swal("Poof! Main Job Domain has been deleted!", {
						  icon: "success",
					});		
			   }  

			});
				
		}

		
		function category_status_fun(category_id){
			
			console.log(category_id);
			
			var checkBox = document.getElementById('category_'+category_id);
			
			if (checkBox.checked == true){
				var category_status=1;
			} else {
				var category_status=0;
			}
  
			console.log(category_status);
			
			$.ajax({
				url: "{{url('admin/update-main-job-domain-status')}}", 
				type: "POST",  
				data:{
					category_id:category_id,
					category_status:category_status,
					_token: '{{csrf_token()}}'
				},
				success:function(result){
					
					swal("Poof! Main Job Category Status has been updated!", {
						icon: "success",
					});				
			   }  

			});
				
		}
		
	</script>
	  
@endsection