@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Manage Admin Account | {{ env('MY_SITE_NAME') }}</title>
	
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
					  <h5 class="mb-2 text-titlecase mb-4">Manage Admin Account</h5>
					</div>
					
					<div class="col-md-6 text-right">
						<button type="button" class="btn btn-primary" style="width:190px; height:35px; padding:2px !important;" onclick="location.href = '{{ url("admin/add-new-admin-account")}}'">
						  Add New Admin Account
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
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Role</th>
                        <th>Actions</th>
						<th>Status</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $j=1;?>
					  @foreach($admin_accounts as $admin_account)
					  <tr>
                        <td><?php echo $j;?>.</td>
                        <td>{{ $admin_account['name']}}</td>
                        <td>{{ $admin_account['email']}}</td>
                        <td>{{ $admin_account['mobile_number']}}</td>
                        <td>{{ $admin_account['role_name']}}</td>
                        <td>
                          <div class="d-flex align-items-center">
                            <a href="{{ url('/admin/admin-account-edit/'.$admin_account['id'])}}">
								<button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
								  Edit
								  <i class="typcn typcn-edit btn-icon-append"></i>                          
								</button>
							</a>
                          </div>
                        </td>
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="admin_account_{{ $admin_account['id']}}" @if($admin_account['status']=='1') checked @endif onclick="admin_account_status_fun({{ $admin_account['id']}})">
								<span class="toggle-slider round"></span>
							</label> 
					  
						</td>
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="admin_account_del_{{ $admin_account['id']}}" @if($admin_account['is_deleted']=='1') checked @endif onclick="admin_account_delete_fun({{ $admin_account['id']}})">
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
				
				{{$admin_accounts->links()}}
				
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

		function admin_account_delete_fun(admin_account_id){
			
			var checkBox = document.getElementById('admin_account_del_'+admin_account_id);
			
			if (checkBox.checked == true){
				var admin_account_del_status=1;
			} else {
				var admin_account_del_status=0;
			}
  
			console.log(admin_account_del_status);
			
			$.ajax({
				url: "{{url('admin/delete-admin-account')}}", 
				type: "POST",  
				data:{
					admin_account_id:admin_account_id,
					admin_account_del_status:admin_account_del_status,
					_token: '{{csrf_token()}}'
				},
				success:function(result){
					
					swal("Poof! admin_account has been deleted!", {
						  icon: "success",
					});		
			   }  

			});
				
		}

		
		function admin_account_status_fun(admin_account_id){
			
			console.log(admin_account_id);
			
			var checkBox = document.getElementById('admin_account_'+admin_account_id);
			
			if (checkBox.checked == true){
				var admin_account_status=1;
			} else {
				var admin_account_status=0;
			}
  
			console.log(admin_account_status);
			
			$.ajax({
				url: "{{url('admin/update-admin-account-status')}}", 
				type: "POST",  
				data:{
					admin_account_id:admin_account_id,
					admin_account_status:admin_account_status,
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