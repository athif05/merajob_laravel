@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Candidates List | {{ env('MY_SITE_NAME') }}</title>
	
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
					  <h5 class="mb-2 text-titlecase mb-4">Manage Candidates</h5>
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
						<th>Job Keywords</th>
                        <th>City</th>
						<th>Work Wxperience</th>
						<th>Skills</th>
						<th>Notice Period</th>
						<th>Resume File</th>
						<th>Status</th>
						<th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $j=1;?>
					  @foreach($candidates as $candidate)
					  <tr>
                        <td><?php echo $j;?>.</td>
                        <td>
							<a href="{{ url('/admin/single-candidate-details/'.$candidate['id'])}}" target="_blank" title="Click here for show candidate details.">
								{{ ucfirst($candidate['name'])}}
							</a>
						</td>
						<td>{{ $candidate['email']}}</td>
                        <td>{{ $candidate['mobile_number']}}</td>
						<td>{{ $candidate['job_title']}}</td>
                        <td>{{ $candidate['job_keywords']}}</td>
                        <td>{{ $candidate['city_name']}}</td>
						<td>{{ $candidate['work_experience']}}</td>
						<td>{{ $candidate['skills']}}</td>
						<td>{{ $candidate['notice_period']}}</td>
						<td>
							@if(!empty($candidate['resume_file'])) 
								<a href="{{ url($candidate['resume_file'])}}" download>Download</a>
							@endif
						</td>
						
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="candidate_{{ $candidate['id']}}" @if($candidate['candidate_status']=='1') checked @endif onclick="candidate_status_fun({{ $candidate['id']}})">
								<span class="toggle-slider round"></span>												  
							</label>
					  
						</td>
						
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="candidate_del_{{ $candidate['id']}}" @if($candidate['is_deleted']=='1') checked @endif onclick="candidate_delete_fun({{ $candidate['id']}})">
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
				
				{{$candidates->links()}}
				
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
		
		function candidate_delete_fun(candidate_id){
			
			var checkBox = document.getElementById('candidate_del_'+candidate_id);
			
			if (checkBox.checked == true){
				var candidate_del_status=1;
			} else {
				var candidate_del_status=0;
			}
  
			console.log(candidate_del_status);
			
			$.ajax({
				url: "{{url('admin/delete-candidate')}}", 
				type: "POST",  
				data:{
					candidate_id:candidate_id,
					candidate_del_status:candidate_del_status,
					_token: '{{csrf_token()}}'
				},
				success:function(result){
					
					swal("Poof! Candidate has been deleted!", {
						  icon: "success",
					});		
			   }  

			});
				
		}
		
		
		function candidate_status_fun(candidate_id){
			
			console.log(candidate_id);
			
			var checkBox = document.getElementById('candidate_'+candidate_id);
			
			if (checkBox.checked == true){
				var candidate_status=1;
			} else {
				var candidate_status=0;
			}
  
			console.log(candidate_status);
			
			$.ajax({
				url: "{{url('admin/update-candidate-status')}}", 
				type: "POST",  
				data:{
					candidate_id:candidate_id,
					candidate_status:candidate_status,
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