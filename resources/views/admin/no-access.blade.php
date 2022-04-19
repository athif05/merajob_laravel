@extends("admin/admin-layouts.master")

@section("title")

  <!-- Required meta tags -->
  <title>Admin | {{ env('MY_SITE_NAME') }}</title>
  
@endsection


@section("content")
  
  <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
      
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <!-- @if(session()->has('error'))
                      <div class="alert alert-danger text-center">
                        {{ session()->get('error') }}
                      </div>
                    @endif -->

                    <div class="alert alert-danger text-center">
                        You don't have right to access this page.
                    </div>

                  <!--<canvas id="expense-chart" height="80"></canvas>-->
                </div>
              </div>
            </div>
            
          </div>

        </div>
        <!-- content-wrapper ends -->
        
    @include('admin/partials.footer')
    
      </div>
    
@endsection