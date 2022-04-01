@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Manage Cities | {{ env('MY_SITE_NAME') }}</title>
	
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
					  <h5 class="mb-2 text-titlecase mb-4">Manage Cities</h5>
					</div>
					
					<div class="col-md-6 text-right">
						<button type="button" class="btn btn-primary" style="width:150px; height:35px; padding:2px !important;" onclick="location.href = '{{ url('admin/add-new-city')}}';">
						  Add New City
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
					  @foreach($cities as $city)
					  <tr>
                        <td><?php echo $j;?>.</td>
                        <td>{{ $city['name']}}</td>
                        <td>
                          <div class="d-flex align-items-center">
                            <a href="{{ url('/admin/city-edit/'.$city['id'])}}">
								<button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
								  Edit
								  <i class="typcn typcn-edit btn-icon-append"></i>                          
								</button>
							</a>
                          </div>
                        </td>
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="city_{{ $city['id']}}" @if($city['status']=='1') checked @endif onclick="city_status_fun({{ $city['id']}})">
								<span class="toggle-slider round"></span>
							</label> 
					  
						</td>
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="city_del_{{ $city['id']}}" @if($city['is_deleted']=='1') checked @endif onclick="city_delete_fun({{ $city['id']}})">
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
				
				{{$cities->links()}}
				
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

		function city_delete_fun(city_id){
			
			var checkBox = document.getElementById('city_del_'+city_id);
			
			if (checkBox.checked == true){
				var city_del_status=1;
			} else {
				var city_del_status=0;
			}
  
			console.log(city_del_status);
			
			$.ajax({
				url: "{{url('admin/delete-city')}}", 
				type: "POST",  
				data:{
					city_id:city_id,
					city_del_status:city_del_status,
					_token: '{{csrf_token()}}'
				},
				success:function(result){
					
					swal("Poof! City has been deleted!", {
						  icon: "success",
					});		
			   }  

			});
				
		}

		
		function city_status_fun(city_id){
			
			console.log(city_id);
			
			var checkBox = document.getElementById('city_'+city_id);
			
			if (checkBox.checked == true){
				var city_status=1;
			} else {
				var city_status=0;
			}
  
			console.log(city_status);
			
			$.ajax({
				url: "{{url('admin/update-city-status')}}", 
				type: "POST",  
				data:{
					city_id:city_id,
					city_status:city_status,
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