@extends("layouts.master-form")

@section("title")

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ env('MY_SITE_NAME') }}"/>
    <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive"/>
    <meta name="author" content="{{ env('MY_SITE_AUTHOR') }}"/>

    <title>Post A New Job | {{ env('MY_SITE_NAME') }}</title>
	
	<style>
		.home_btn2{
			width: 200px!important;
		}
		
		.btn-theme.btn-sm {
    height: 38px;
    padding: 3px 5px 3px!important;
    width: 70px!important;
	height:30px!important;
	font-size:14px;
}
	</style>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script> 	
	
 <!-- Datatable plugin CSS file --
    <link rel="stylesheet" href=
"https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
  

  
      !-- Datatable plugin JS library file --
     <script type="text/javascript" src=
"https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
     </script>
-- Datatable plugin JS library file, end  -->

@endsection


@section("content")

  <main class="main-content">
				
    <!--== Start main content Area Wrapper ==-->
    <section class="blog-area blog-grid-area">
      <div class="container">
        <div class="row justify-content-between flex-xl-row-reverse">
          <div class="col-xl-12">
            <div class="row row-gutter-70">
			
              <div class="col-sm-12 col-lg-12 col-xl-12">
                <!--== Start Blog Post Item ==-->
                <div class="post-item">
                  
                  <div class="content">
                    <h4 class="title">List of Applied Jobs ({{ $total_jobs }})</h4>
                    <div class="meta table table-responsive">
                      
					  <table id="tableID" class="table table-striped" width="100%">
					  
					  <!--<table cellpadding="0" cellspacing="0" width="100%">-->
						<thead>
							<tr>
								<th class="th-sm">#</th>
								<th class="th-sm">Job Title</th>
								<th class="th-sm">Job Location</th>
								<th class="th-sm">CTC</th>
								<th class="th-sm">Qualificaion</th>
								<th class="th-sm">Working Days</th>
								<th class="th-sm">Company Name</th>
								<th class="th-sm">Company Location</th>
								<th class="th-sm">Action</th>
							</tr>
						</thead>
						
						<tbody>
						<?php $j=1;?>
						@if($total_jobs>0)
							@foreach($job_lists as $job_list)
								<tr>
									<td><?php echo $j;?>.</td>
									<td>
										<a href="{{ url('/job-details/'.$job_list['employer_id'].'/'.$job_list['id'])}}" target="_blank()">{{ $job_list['job_title'] }}</a>
									</td>
									<td>{{ $job_list['job_location_name'] }}</td>
									<td>{{ $job_list['ctc'] }}</td>
									<td>
									<?php $qualification_ids=explode(',',$job_list['qualification_ids']);?>
										@foreach($qualifications as $qualification)
											@if(in_array($qualification['id'],$qualification_ids))
												{{ $qualification['name'] }}, 
											@endif
										@endforeach
									</td>
									<td>{{ $job_list['working_day_name'] }}</td>
									<td>
										@foreach($employer_details as $employer_detail)
											@if($employer_detail['employer_id']==$job_list['employer_id'])
												{{ $employer_detail['company_name'] }}
											<?php $city_id=$employer_detail['city_id'];?>
											@endif
										@endforeach
									</td>
									<td>
										@foreach($cities as $city)
											@if($city['id']==$city_id)
												{{ $city['name'] }}
											@endif
										@endforeach
									</td>
									<td>
										<a class="btn-theme btn-sm" href="javascript:void(0)" onclick="delete_job({{ $job_list['id']}})">
											Delete
										</a>
									</td>
								</tr>
								<?php $j++;?>
							@endforeach
						@else
							<tr>
								<td colspan="9">No job in list...</td>								
							</tr>
						@endif
						</tbody>
						
					  </table>
					  
                    </div>
                  </div>
                </div>
                <!--== End Blog Post Item ==-->
              </div>
              
              
            </div>
          </div>
          
        </div>
      </div>
    </section>
    <!--== End main content Area Wrapper ==-->
	
  </main>
  
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
      </script>
      <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>



    <script>
  
        /* Initialization of datatable */
        $(document).ready(function() {
            $('#tableID').DataTable({ });
        });
    </script>
	
	
	<script type="text/javascript">

		function delete_job(job_id){
			//alert(job_id);
			
			swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover this job!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
				  
				$.ajax({
					url: "{{url('delete-job-by-candiate-list')}}", 
					type: "POST",  
					data:{
						job_id:job_id,
						_token: '{{csrf_token()}}'
					},
					success:function(result){
						
						swal("Poof! Your job has been deleted!", {
						  icon: "success",
						});
				
						//console.log("it Work");
						location.reload();					
				   }  

				});
				
				
			  } 
			  
			});
			   
		}
	</script>
	
	
@endsection
