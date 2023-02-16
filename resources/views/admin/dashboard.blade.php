@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Admin | {{ env('MY_SITE_NAME') }}</title>
	
@endsection


@section("content")
  
  <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
		  
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                    <div>
                      <p class="mb-2 text-md-center text-lg-left">Total Blogs</p>
                      <h1 class="mb-0">{{ $total_blogs }}</h1>
                    </div>
                    <i class="typcn typcn-clipboard icon-xl text-secondary"></i>
                    
                  </div>
                  <!--<canvas id="expense-chart" height="80"></canvas>-->
                </div>
              </div>
            </div>
			
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                    <div>
                      <p class="mb-2 text-md-center text-lg-left">Total Category</p>
                      <h1 class="mb-0">{{ $total_blog_Categories }}</h1>
                    </div>
                    <i class="typcn typcn-chart-pie icon-xl text-secondary"></i>
                  </div>
                  <!--<canvas id="budget-chart" height="80"></canvas>-->
                </div>
              </div>
            </div>
			
          </div>

          <div class="row">
            <div class="col-md-12">
			
			        <h5 class="mb-2 text-titlecase mb-4">Latest Blogs List</h5>
			
              <div class="card">
                <div class="table-responsive pt-3">
                  <table class="table table-striped project-orders-table" id="my_datatable">
                    <thead>
                      <tr>
                        <th class="ml-5">#</th>
                        <th>Title</th>
                        <th>Course</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $j=1;?>
                      @if(count($latestBlogs))
                        @foreach($latestBlogs as $latestBlog)
                        <tr>
                          <td><?php echo $j;?>.</td>
                          <td>{{ $latestBlog['title']}}</td>
                          <td>{{ $latestBlog['category_name']}}</td>
                          <td>{{ date('d-M-Y', strtotime($latestBlog['created_at']))}}</td>     
                        </tr>
                        <?php $j++;?>
                        @endforeach 

                      @else 
                      <tr>
                        <td colspan="4">No blog record...</td>
                      </tr>
                      @endif
                    </tbody>
                  </table>
          
                    
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