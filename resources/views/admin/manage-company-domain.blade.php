@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Manage Company Domain | {{ env('MY_SITE_NAME') }}</title>
	
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
					  <h5 class="mb-2 text-titlecase mb-4">Manage Company Domain</h5>
					</div>
					
					<div class="col-md-6 text-right">
						<button type="button" class="btn btn-primary" style="width:auto; height:35px; padding:2px 10px !important;" onclick="location.href = '{{ url('admin/add-new-company-domain')}}';">
						  Add New Company Domain
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
					  @foreach($company_domains as $company_domain)
					  <tr>
                        <td><?php echo $j;?>.</td>
                        <td>{{ $company_domain['name']}}</td>
                        <td>
                          <div class="d-flex align-items-center">
                            <a href="{{ url('/admin/company-domain-edit/'.$company_domain['id'])}}">
								<button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
								  Edit
								  <i class="typcn typcn-edit btn-icon-append"></i>                          
								</button>
							</a>
                          </div>
                        </td>
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="company_domain_{{ $company_domain['id']}}" @if($company_domain['status']=='1') checked @endif onclick="company_domain_status_fun({{ $company_domain['id']}})">
								<span class="toggle-slider round"></span>
							</label> 
					  
						</td>
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="company_domain_del_{{ $company_domain['id']}}" @if($company_domain['is_deleted']=='1') checked @endif onclick="company_domain_delete_fun({{ $company_domain['id']}})">
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
				
				{{$company_domains->links()}}
				
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

		function company_domain_delete_fun(company_domain_id){
			
			var checkBox = document.getElementById('company_domain_del_'+company_domain_id);
			
			if (checkBox.checked == true){
				var company_domain_del_status=1;
			} else {
				var company_domain_del_status=0;
			}
  
			console.log(company_domain_del_status);
			
			$.ajax({
				url: "{{url('admin/delete-company-domain')}}", 
				type: "POST",  
				data:{
					company_domain_id:company_domain_id,
					company_domain_del_status:company_domain_del_status,
					_token: '{{csrf_token()}}'
				},
				success:function(result){
					
					swal("Poof! Company Domain has been deleted!", {
						  icon: "success",
					});		
			   }  

			});
				
		}

		
		function company_domain_status_fun(company_domain_id){
			
			console.log(company_domain_id);
			
			var checkBox = document.getElementById('company_domain_'+company_domain_id);
			
			if (checkBox.checked == true){
				var company_domain_status=1;
			} else {
				var company_domain_status=0;
			}
  
			console.log(company_domain_status);
			
			$.ajax({
				url: "{{url('admin/update-company-domain-status')}}", 
				type: "POST",  
				data:{
					company_domain_id:company_domain_id,
					company_domain_status:company_domain_status,
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