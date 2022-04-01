@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Employers List | {{ env('MY_SITE_NAME') }}</title>
	
	<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>-->
	<style>
		.dropdown-item {
		display: block;
		width: 100%;
		padding: 5px!important;
		}
		
		.btn, .ajax-upload-dragdrop .ajax-file-upload {
    display: inline-block;
    font-weight: 400;
    color: #001737;
    text-align: center;
    vertical-align: middle;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: 10px 5px !important;
    font-size: 0.875rem;
    line-height: 1;
    border-radius: 0.1875rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

	</style>
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
					  <h5 class="mb-2 text-titlecase mb-4">Manage Employers</h5>
					</div>				
				</div>
			</div>
			
			
              <div class="card">
                <div class="table-responsive pt-3">
                  <table class="table table-striped project-orders-table" id="my_datatable">
                    <thead>
                      <tr>
                        <th class="ml-5">#</th>
                        <th>Logo</th>
                        <th>Company Name</th>
						<th>City</th>
                        <th>Email</th>
						<th>Mobile No.</th>
                        <th>Phone</th>
						<th>Address</th>
						<th>Domain</th>
						<th>Website</th>
						<th>Established Year</th>
						<th>Status</th>
						<th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $j=1;?>
					  @foreach($employer_details as $employer_detail)
					  <tr>
                        <td><?php echo $j;?>.</td>
                        <td>
							@if($employer_detail['company_logo'])
								<img src="{{ url($employer_detail['company_logo'])}}" style="width:80px; height:80px;">
							@endif
						</td>
						<td>
							<a href="{{ url('/admin/single-employers-details/'.$employer_detail['id'])}}" target="_blank" title="Click here for show candidate details.">
								{{ ucfirst($employer_detail['company_name'])}}
							</a>
						</td>
                        <td>{{ $employer_detail['city_name']}}</td>
						<td>{{ $employer_detail['email']}}</td>
                        <td>{{ $employer_detail['mobile_number']}}</td>
                        <td>{{ $employer_detail['company_phone']}}</td>
						<td>{{ $employer_detail['company_address']}}</td>
						<td>{{ $employer_detail['company_domains_name']}}</td>
						<td>{{ $employer_detail['company_website']}}</td>
						<td>{{ $employer_detail['company_established_year']}}</td>
						
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="employer_detail_{{ $employer_detail['id']}}" @if($employer_detail['status']=='1') checked @endif onclick="employer_detail_status_fun({{ $employer_detail['id']}})">
								<span class="toggle-slider round"></span>												  
							</label>
					  
						</td>
						
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="employer_detail_del_{{ $employer_detail['id']}}" @if($employer_detail['is_deleted']=='1') checked @endif onclick="employer_detail_delete_fun({{ $employer_detail['id']}})">
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
				
				{{$employer_details->links()}}
				
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
		
		function employer_detail_delete_fun(employer_detail_id){
			
			var checkBox = document.getElementById('employer_detail_del_'+employer_detail_id);
			
			if (checkBox.checked == true){
				var employer_detail_del_status=1;
			} else {
				var employer_detail_del_status=0;
			}
  
			console.log(employer_detail_del_status);
			
			$.ajax({
				url: "{{url('admin/delete-employers-admin')}}", 
				type: "POST",  
				data:{
					employer_detail_id:employer_detail_id,
					employer_detail_del_status:employer_detail_del_status,
					_token: '{{csrf_token()}}'
				},
				success:function(result){
					
					swal("Poof! Employers has been deleted!", {
						  icon: "success",
					});		
			   }  

			});
				
		}
		
		
		function employer_detail_status_fun(employer_detail_id){
			
			console.log(employer_detail_id);
			
			var checkBox = document.getElementById('employer_detail_'+employer_detail_id);
			
			if (checkBox.checked == true){
				var employer_detail_status=1;
			} else {
				var employer_detail_status=0;
			}
  
			console.log(employer_detail_status);
			
			$.ajax({
				url: "{{url('admin/update-employers-status-admin')}}", 
				type: "POST",  
				data:{
					employer_detail_id:employer_detail_id,
					employer_detail_status:employer_detail_status,
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