@extends("layouts.master")

@section("title")

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ env('MY_SITE_NAME') }}"/>
    <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive"/>
    <meta name="author" content="{{ env('MY_SITE_AUTHOR') }}"/>

    <title>Jobs | {{ env('MY_SITE_NAME') }}</title>

	<style>
		.recent-job-item {
    background-color: #fff;
    border-radius: 5px;
    margin-bottom: 30px;
    padding: 1px 15px 20px!important;
    transition: all 0.3s ease-out;
    -webkit-transition: all 0.3s ease-out;
    -moz-transition: all 0.3s ease-out;
    -ms-transition: all 0.3s ease-out;
    -o-transition: all 0.3s ease-out;
}
	</style>
	
@endsection


@section("content")

<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="{{ asset('public/img/photos/sl1.jpg')}}">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title">{{$employer_details[0]['company_name']}} Jobs List</h2>
              <nav class="breadcrumb-area">
                <ul class="breadcrumb justify-content-center">
                  <li><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>All Jobs</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Recent Job Area Wrapper ==-->
    <section class="recent-job-area recent-job-inner-area">
      <div class="container">
        <div class="row" id="main_all_div">
		
			@foreach($job_lists as $job_list)
          <div class="col-md-6 col-lg-4" id="div_{{$job_list['id']}}">
            <!--== Start Recent Job Item ==-->
            <div class="recent-job-item recent-job-style2-item">
              <!--<div class="company-info">
                <div class="logo">
                  <a href="{{ url('/company-details')}}"><img src="{{ asset('public/img/companies/w1.jpg')}}" width="75" height="75" alt="Image-HasTech"></a>
                </div>
                <div class="content">
                  <h4 class="name"><a href="{{ url('/company-details')}}">Darkento Ltd.</a></h4>
                  <p class="address">New York, USA</p>
                </div>
              </div>-->
              <div class="main-content">
                <h3 class="title"><a href="{{ url('/job-details/'.$job_list['employer_id'].'/'.$job_list['id'])}}">{{ $job_list['job_title'] }}</a></h3>
                <h5 class="work-type">{{ $job_list['job_category_name'] }}</h5>
                <p class="desc"><strong>Skills:</strong> {{ $job_list['skills'] }}</p>
              </div>
              <div class="recent-job-info">
                <div class="salary">
                  <h4>{{ $job_list['salary'] }}</h4>
                  <p>/monthly</p>
                </div>
				
				@if( (empty(session('login_user_data')[0]['id'])) || (!empty(session('login_user_data')[0]['id']) && (session('login_user_data')[0]['user_type']!='2')))
				<a href="{{ url('/edit-post-job/'.$job_list['employer_id'].'/'.$job_list['id'])}}" target="_blank">
					Edit
				</a>
				@endif
				
				<a class="btn-theme btn-sm" href="{{ url('/job-details/'.$job_list['employer_id'].'/'.$job_list['id'])}}">Show Details</a>
		
              </div>
			  
			  <div class="recent-job-info" style="margin-top:10px;">
			  
				<div class="form-check form-switch">					
					<label class="form-check-label" for="flexSwitchCheckChecked" id="status_html_{{ $job_list['id']}}">
						@if($job_list['status']=='1') Active @else InActive @endif
					</label>
					<input class="form-check-input status_class" type="checkbox" id="status_{{ $job_list['id']}}" @if($job_list['status']=='1') checked @endif onclick="job_status_fun({{ $job_list['id']}})">
					
					<!--`<input data-id="{{$job_list['id']}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" @if($job_list['status']=='1') checked @endif> -->
				</div>
				
				<div class="form-check form-switch">					
					<a  href="javascript:void(0)" onclick="delete_job({{ $job_list['id']}})">Delete &nbsp;</a>
				</div>
				
              </div>
			  
            </div>
            <!--== End Recent Job Item ==-->
			
          </div>
          @endforeach
     
        </div>
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
    </section>
    <!--== End Recent Job Area Wrapper ==-->
  </main>
	
	
	
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
					url: "{{url('delete-job-by-employer')}}", 
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
				
				
			  } /*else {
				swal("Your job is safe!");
			  }*/
			});

			/*if (confirm("Are you sure delete job?") == true) {
				
			}*/
			   
		}

		
		function job_status_fun(job_id){
			
			var checkBox = document.getElementById('status_'+job_id);
			
			if (checkBox.checked == true){
				var job_status=1;
			} else {
				var job_status=0;
			}
  
			console.log(job_status);
			
			$.ajax({
				url: "{{url('update-job-status-by-employer')}}", 
				type: "POST",  
				data:{
					job_id:job_id,
					job_status:job_status,
					_token: '{{csrf_token()}}'
				},
				success:function(result){
					if (result == 1) {
						$('#status_html_'+job_id).html('Active');
					} else {
						$('#status_html_'+job_id).html('InActive');
					}					
			   }  

			});
				
		}
		
	</script>
	
@endsection