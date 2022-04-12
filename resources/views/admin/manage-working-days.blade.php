@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Manage Working Days | {{ env('MY_SITE_NAME') }}</title>
	
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
					  <h5 class="mb-2 text-titlecase mb-4">Manage Working Days</h5>
					</div>
					
					<div class="col-md-6 text-right">
						<button type="button" class="btn btn-primary" style="width:190px; height:35px; padding:2px !important;" onclick="location.href = '{{ url('admin/add-new-working-day')}}';">
						  Add New Working Day
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
					  @foreach($workingDays as $workingDay)
					  <tr>
                        <td><?php echo $j;?>.</td>
                        <td>{{ $workingDay['name']}}</td>
                        <td>
                          <div class="d-flex align-items-center">
                            <a href="{{ url('/admin/working-day-edit/'.$workingDay['id'])}}">
								<button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
								  Edit
								  <i class="typcn typcn-edit btn-icon-append"></i>                          
								</button>
							</a>
                          </div>
                        </td>
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="workingDay_{{ $workingDay['id']}}" @if($workingDay['status']=='1') checked @endif onclick="workingDay_status_fun({{ $workingDay['id']}})">
								<span class="toggle-slider round"></span>
							</label> 
					  
						</td>
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="workingDay_del_{{ $workingDay['id']}}" @if($workingDay['is_deleted']=='1') checked @endif onclick="workingDay_delete_fun({{ $workingDay['id']}})">
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
				
				{{$workingDays->links()}}
				
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

		function workingDay_delete_fun(workingDay_id){
			
			var checkBox = document.getElementById('workingDay_del_'+workingDay_id);
			
			if (checkBox.checked == true){
				var workingDay_del_status=1;
			} else {
				var workingDay_del_status=0;
			}
  
			console.log(workingDay_del_status);
			
			$.ajax({
				url: "{{url('admin/delete-working-day')}}", 
				type: "POST",  
				data:{
					workingDay_id:workingDay_id,
					workingDay_del_status:workingDay_del_status,
					_token: '{{csrf_token()}}'
				},
				success:function(result){
					
					swal("Poof! Notice Period has been deleted!", {
						  icon: "success",
					});		
			   }  

			});
				
		}

		
		function workingDay_status_fun(workingDay_id){
			
			console.log(workingDay_id);
			
			var checkBox = document.getElementById('workingDay_'+workingDay_id);
			
			if (checkBox.checked == true){
				var workingDay_status=1;
			} else {
				var workingDay_status=0;
			}
  
			console.log(workingDay_status);
			
			$.ajax({
				url: "{{url('admin/update-working-day-status')}}", 
				type: "POST",  
				data:{
					workingDay_id:workingDay_id,
					workingDay_status:workingDay_status,
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