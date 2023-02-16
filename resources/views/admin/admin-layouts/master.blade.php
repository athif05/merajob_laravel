<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		@yield('title')

		<!--== Favicon ==-->
		<link rel="shortcut icon" href="{{ asset('../resources/views/admin/images/favicon.png')}}" />

		<!-- base:css -->
		<link rel="stylesheet" href="{{ asset('../resources/views/admin/vendors/typicons/typicons.css')}}">
		<link rel="stylesheet" href="{{ asset('../resources/views/admin/vendors/css/vendor.bundle.base.css')}}">
		<!-- endinject -->
		<!-- plugin css for this page -->
		<!-- End plugin css for this page -->
		<!-- inject:css -->
		<link rel="stylesheet" href="{{ asset('../resources/views/admin/css/vertical-layout-light/style.css')}}">
		<!-- endinject -->

	</head>

	<body>

		<!--<div class="row" id="proBanner">
			<div class="col-12">
			<span class="d-flex align-items-center purchase-popup">
			<p>Get tons of UI components, Plugins, multiple layouts, 20+ sample pages, and more!</p>
			<a href="https://bootstrapdash.com/demo/polluxui/template/index.html?utm_source=organic&utm_medium=banner&utm_campaign=free-preview" target="_blank" class="btn download-button purchase-button ml-auto">Upgrade To Pro</a>
			<i class="typcn typcn-delete-outline" id="bannerClose"></i>
			</span>
			</div>
		</div>-->

		<!--wrapper start-->
		<div class="container-scroller">

			@include('admin/partials.navbar')

			<div class="container-fluid page-body-wrapper">

				@include('admin/partials.sidebar')

				@yield('content')	  

			</div>

		</div>
		<!-- main-panel ends -->

		<!--=======================Javascript============================-->
		
		<!--=== Sweet Alert Js ===-->
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

		<!-- base:js -->
		<script src="{{ asset('../resources/views/admin/vendors/js/vendor.bundle.base.js')}}"></script>
		<!-- endinject -->
		<!-- Plugin js for this page-->
		<script src="{{ asset('../resources/views/admin/vendors/chart.js/Chart.min.js')}}"></script>
		<!-- End plugin js for this page-->
		<!-- inject:js -->
		<script src="{{ asset('../resources/views/admin/js/off-canvas.js')}}"></script>
		<script src="{{ asset('../resources/views/admin/js/hoverable-collapse.js')}}"></script>
		<script src="{{ asset('../resources/views/admin/js/template.js')}}"></script>
		<script src="{{ asset('../resources/views/admin/js/settings.js')}}"></script>
		<script src="{{ asset('../resources/views/admin/js/todolist.js')}}"></script>
		<!-- endinject -->
		<!-- Custom js for this page-->
		<script src="{{ asset('../resources/views/admin/js/dashboard.js')}}"></script>
		<!-- End custom js for this page-->  

	</body>

</html>