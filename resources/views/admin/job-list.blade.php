@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Manage Qualification | {{ env('MY_SITE_NAME') }}</title>
	
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
					  <h5 class="mb-2 text-titlecase mb-4">Job Lists</h5>
					</div>
					
					<!-- <div class="col-md-6 text-right">
						<button type="button" class="btn btn-primary" style="width:190px; height:35px; padding:2px !important;" onclick="location.href = '{{ url('admin/add-new-qualification')}}';">
						  Add New Qualification
						</button>
					</div> -->
				
				
				</div>
			</div>
			
			
              <div class="card">
                <div class="table-responsive pt-3">
                  <table class="table table-striped project-orders-table" id="my_datatable">
                    <thead>
                      <tr>
                        <th class="ml-5">#</th>

						<th style="line-height:15px; width:30%; border-bottom:1px solid #c9c8c8!important;">Company Name</th>
                        <th style="line-height:15px; width:20%; border-bottom:1px solid #c9c8c8!important;">Job Title</th>
						<th style="line-height:15px; width:30%; border-bottom:1px solid #c9c8c8!important;">Salary</th>
						<th style="line-height:15px; width:10%; border-bottom:1px solid #c9c8c8!important;">Opening</th>
						<th style="line-height:15px; width:10%; border-bottom:1px solid #c9c8c8!important;">Job Location</th>
						<th style="line-height:15px; width:30%; border-bottom:1px solid #c9c8c8!important;">City</th>
						<th style="line-height:15px; width:30%; border-bottom:1px solid #c9c8c8!important;">Job Types</th>
						<th style="line-height:15px; width:30%; border-bottom:1px solid #c9c8c8!important;">Working Days</th>
						<th style="line-height:15px; width:30%; border-bottom:1px solid #c9c8c8!important;">Experience</th>
						<th style="line-height:15px; width:30%; border-bottom:1px solid #c9c8c8!important;">Skills</th>
                      </tr>
                    </thead>
                    <tbody>
                    	<?php $sr_no=1;?>
                     	@foreach($job_lists as $job_list)
							<tr>
								<td>{{ $sr_no}}.</td>
								<td>
									<a href="{{ url('/admin/single-employers-details/'.$job_list['employer_details_id'])}}" target="_blank">{{ $job_list['company_name']}}</a>
									
								</td>
								<td>
									<a href="{{ url('/admin/job-details/'.$job_list['employer_id'].'/'.$job_list['id'])}}" target="_blank">{{ $job_list['job_title']}}</a>
								</td>  
								<td>{{ $job_list['salary']}}</td>  
								<td>{{ $job_list['no_of_opening']}}</td> 
								<td>
									@foreach($job_locations as $job_location)
										@if($job_location['id']==$job_list['job_location_id'])
											{{ $job_location['name'] }}
										@endif
									@endforeach
								</td> 
								<td>{{ $job_list['city_name']}}</td>
								<td>{{ $job_list['job_category_name']}}</td>
								<td>{{ $job_list['working_day_name']}}</td>
								<td>{{ $job_list['max_experiencerequired']}}</td>
								<td>{{ $job_list['skills']}}</td>
							</tr>
							<?php $sr_no++;?>
						@endforeach
                    </tbody>
                  </table>
				  
				  <div class="row">
          <div class="col-lg-12 text-center">
            <div class="pagination-area">
              <nav>
                <ul class="page-numbers d-inline-flex">
				
				{{$job_lists->links()}}
				
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

		function qualification_delete_fun(qualification_id){
			
			var checkBox = document.getElementById('qualification_del_'+qualification_id);
			
			if (checkBox.checked == true){
				var qualification_del_status=1;
			} else {
				var qualification_del_status=0;
			}
  
			console.log(qualification_del_status);
			
			$.ajax({
				url: "{{url('admin/delete-qualification')}}", 
				type: "POST",  
				data:{
					qualification_id:qualification_id,
					qualification_del_status:qualification_del_status,
					_token: '{{csrf_token()}}'
				},
				success:function(result){
					
					swal("Poof! Qualification has been deleted!", {
						  icon: "success",
					});		
			   }  

			});
				
		}

		
		function qualification_status_fun(qualification_id){
			
			console.log(qualification_id);
			
			var checkBox = document.getElementById('qualification_'+qualification_id);
			
			if (checkBox.checked == true){
				var qualification_status=1;
			} else {
				var qualification_status=0;
			}
  
			console.log(qualification_status);
			
			$.ajax({
				url: "{{url('admin/update-qualification-status')}}", 
				type: "POST",  
				data:{
					qualification_id:qualification_id,
					qualification_status:qualification_status,
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