@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Applied Jobs | {{ env('MY_SITE_NAME') }}</title>
	
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
					  <h5 class="mb-2 text-titlecase mb-4">Manage Applied Jobs</h5>
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
                        <th>Job Title</th>
						<th>CTC</th>
                        <th>Job Location</th>
						<th>Company Name</th>
                        <th>Applied Date</th>
						<th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $j=1;?>
					  @foreach($all_applied_jobs as $all_applied_job)
					  <tr>
                        <td><?php echo $j;?>.</td>
                        <td>{{ $all_applied_job['candidate_name']}}</td>
						<td>{{ $all_applied_job['candidate_email']}}</td>
                        <td>{{ $all_applied_job['candidate_mobile_number']}}</td>
						<td>
							<a href="{{ url('/admin/job-details/'.$all_applied_job['employer_id'].'/'.$all_applied_job['job_id'])}}" target="_blank" title="Click here for show job details.">
								{{ $all_applied_job['job_title']}}
							</a>
						</td>
                        <td>{{ $all_applied_job['ctc']}}</td>
						<td>{{ $all_applied_job['job_location_name']}}</td>
                        <td>{{ $all_applied_job['company_name']}}</td>
						<td>{{ date('d-M-Y', strtotime($all_applied_job['applied_date']))}}</td>
						<td>
														
							<!--<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="city_{{ $all_applied_job['id']}}" @if($all_applied_job['status']=='1') checked @endif onclick="city_status_fun({{ $all_applied_job['id']}})">
								<span class="toggle-slider round"></span>												  
							</label>-->
							
							<div class="btn-group-vertical" role="group" aria-label="Basic example">

								<div class="btn-group">
									<button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" id="job_status_id_{{$all_applied_job['id']}}">
										@if($all_applied_job['status']=='0') 
											Rejected 
										@elseif($all_applied_job['status']=='1')
											New
										@elseif($all_applied_job['status']=='2')
											Progress
										@elseif($all_applied_job['status']=='3')
											Selected
										@endif
									</button>
									<div class="dropdown-menu" style="font-size:13px;">
										<a class="dropdown-item" onclick="job_status('1','{{$all_applied_job['id']}}')">New</a>
										<a class="dropdown-item" onclick="job_status('2','{{$all_applied_job['id']}}')">Progress</a>
										<a class="dropdown-item" onclick="job_status('3','{{$all_applied_job['id']}}')">Selected</a>
										<a class="dropdown-item" onclick="job_status('0','{{$all_applied_job['id']}}')">Rejected</a>
									</div>                          
								</div>
							</div>
					  
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
				
				{{$all_applied_jobs->links()}}
				
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
		
		function job_status(status_id, id){
			
			console.log(status_id+' / job_status_id_ '+id);

			$.ajax({
				url: "{{url('admin/update-applied-job-status-admin')}}", 
				type: "POST",  
				data:{
					status_id:status_id,
					id:id,
					_token: '{{csrf_token()}}'
				},
				success:function(result){
					
					/*swal("Poof! Status has been updated!", {
						icon: "success",
					});*/	
					
					console.log(result);
					
					$("#job_status_id_"+id).html(result);
						
			   }  

			});
				
		}
		
	</script>
	  
@endsection