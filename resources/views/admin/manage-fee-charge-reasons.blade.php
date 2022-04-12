@extends("admin/admin-layouts.master")

@section("title")

	<!-- Required meta tags -->
	<title>Manage Fee Charges | {{ env('MY_SITE_NAME') }}</title>
	
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
					  <h5 class="mb-2 text-titlecase mb-4">Manage Fee Charges</h5>
					</div>
					
					<div class="col-md-6 text-right">
						<button type="button" class="btn btn-primary" style="width:190px; height:35px; padding:2px !important;" onclick="location.href = '{{ url('admin/add-new-fee-charge-reason')}}';">
						  Add New Fee Charge
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
					  @foreach($feeCharges as $feeCharge)
					  <tr>
                        <td><?php echo $j;?>.</td>
                        <td>{{ $feeCharge['name']}}</td>
                        <td>
                          <div class="d-flex align-items-center">
                            <a href="{{ url('/admin/fee-charge-reason-edit/'.$feeCharge['id'])}}">
								<button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
								  Edit
								  <i class="typcn typcn-edit btn-icon-append"></i>                          
								</button>
							</a>
                          </div>
                        </td>
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="feeCharge_{{ $feeCharge['id']}}" @if($feeCharge['status']=='1') checked @endif onclick="feeCharge_status_fun({{ $feeCharge['id']}})">
								<span class="toggle-slider round"></span>
							</label> 
					  
						</td>
						<td>
														
							<label class="toggle-switch toggle-switch-success">
								<input type="checkbox" id="feeCharge_del_{{ $feeCharge['id']}}" @if($feeCharge['is_deleted']=='1') checked @endif onclick="feeCharge_delete_fun({{ $feeCharge['id']}})">
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
				
				{{$feeCharges->links()}}
				
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

		function feeCharge_delete_fun(feeCharge_id){
			
			var checkBox = document.getElementById('feeCharge_del_'+feeCharge_id);
			
			if (checkBox.checked == true){
				var feeCharge_del_status=1;
			} else {
				var feeCharge_del_status=0;
			}
  
			console.log(feeCharge_del_status);
			
			$.ajax({
				url: "{{url('admin/delete-fee-charge-reason')}}", 
				type: "POST",  
				data:{
					feeCharge_id:feeCharge_id,
					feeCharge_del_status:feeCharge_del_status,
					_token: '{{csrf_token()}}'
				},
				success:function(result){
					
					swal("Poof! Notice Period has been deleted!", {
						  icon: "success",
					});		
			   }  

			});
				
		}

		
		function feeCharge_status_fun(feeCharge_id){
			
			console.log(feeCharge_id);
			
			var checkBox = document.getElementById('feeCharge_'+feeCharge_id);
			
			if (checkBox.checked == true){
				var feeCharge_status=1;
			} else {
				var feeCharge_status=0;
			}
  
			console.log(feeCharge_status);
			
			$.ajax({
				url: "{{url('admin/update-fee-charge-reason-status')}}", 
				type: "POST",  
				data:{
					feeCharge_id:feeCharge_id,
					feeCharge_status:feeCharge_status,
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