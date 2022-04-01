@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Manage States | {{ env('MY_SITE_NAME') }}</title>
	
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
					  <h5 class="mb-2 text-titlecase mb-4">Manage States</h5>
					</div>
					
					<div class="col-md-6 text-right">
						<button type="button" class="btn btn-primary" style="width:150px; height:35px; padding:2px !important;" onclick="location.href = '{{ url('admin/add-new-state')}}';">
						  Add New State
						</button>
					</div>
				
				
				</div>
			</div>
			
			
              <div class="card">
                <div class="table-responsive pt-3">
                  <table class="table table-striped project-orders-table">
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
					  @foreach($states as $state)
					  <tr>
                        <td><?php echo $j;?>.</td>
                        <td>{{ $state['name']}}</td>
                        <td>
                          <div class="d-flex align-items-center">
                            <a href="{{ url('/admin/state-edit/'.$state['id'])}}">
								<button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
								  Edit
								  <i class="typcn typcn-edit btn-icon-append"></i>                          
								</button>
							</a>
                            <!--<button type="button" class="btn btn-danger btn-sm btn-icon-text" onclick="delete_state({{ $state['id']}})">
                              Delete
                              <i class="typcn typcn-delete-outline btn-icon-append"></i>                          
                            </button>-->
                          </div>
                        </td>
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="state_{{ $state['id']}}" @if($state['status']=='1') checked @endif onclick="state_status_fun({{ $state['id']}})">
								<span class="toggle-slider round"></span>
							</label> 
					  
						</td>
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="state_del_{{ $state['id']}}" @if($state['is_deleted']=='1') checked @endif onclick="state_delete_fun({{ $state['id']}})">
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
				
				{{$states->links()}}
				
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
		function state_delete_fun(state_id){
			
			var checkBox = document.getElementById('state_del_'+state_id);
			
			if (checkBox.checked == true){
				var state_del_status=1;
			} else {
				var state_del_status=0;
			}
  
			console.log(state_del_status);
			
			$.ajax({
				url: "{{url('admin/delete-state')}}", 
				type: "POST",  
				data:{
					state_id:state_id,
					state_del_status:state_del_status,
					_token: '{{csrf_token()}}'
				},
				success:function(result){
					
					swal("Poof! State has been deleted!", {
						  icon: "success",
						});
						
					/*if (result == 1) {
						$('#status_html_'+job_id).html('Active');
					} else {
						$('#status_html_'+job_id).html('InActive');
					}*/					
			   }  

			});
				
		}

		
		function state_status_fun(state_id){
			
			var checkBox = document.getElementById('state_'+state_id);
			
			if (checkBox.checked == true){
				var state_status=1;
			} else {
				var state_status=0;
			}
  
			console.log(state_status);
			
			$.ajax({
				url: "{{url('admin/update-state-status')}}", 
				type: "POST",  
				data:{
					state_id:state_id,
					state_status:state_status,
					_token: '{{csrf_token()}}'
				},
				success:function(result){
					
					swal("Poof! Status has been updated!", {
						  icon: "success",
						});
						
					/*if (result == 1) {
						$('#status_html_'+job_id).html('Active');
					} else {
						$('#status_html_'+job_id).html('InActive');
					}*/					
			   }  

			});
				
		}
		
	</script>
	  
@endsection