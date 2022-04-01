<!DOCTYPE html>
<html lang="en">

	<head>

		@yield('title')
		
		<!--== Favicon ==-->
		<link rel="shortcut icon" href="{{ asset('public/img/favicon.ico')}}" type="image/x-icon" />

		<!--== Google Fonts ==-->
		<link rel="preconnect" href="https://fonts.googleapis.com/">
		<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&amp;display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&amp;display=swap" rel="stylesheet">


		<!--== Bootstrap CSS ==-->
		<link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet" />
		<!--== Icofont Icon CSS ==-->
		<link href="{{ asset('public/css/icofont.css') }}" rel="stylesheet" />
		<!--== Swiper CSS ==-->
		<link href="{{ asset('public/css/swiper.min.css') }}" rel="stylesheet" />
		<!--== Fancybox Min CSS ==-->
		<link href="{{ asset('public/css/fancybox.min.css') }}" rel="stylesheet" />
		<!--== Aos Min CSS ==-->
		<link href="{{ asset('public/css/aos.min.css') }}" rel="stylesheet" />

		<!--== Main Style CSS ==-->
		<link href="{{ asset('public/css/style.css') }}" rel="stylesheet" />
		
		<!--== jQuery file ==-->
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
	</head>

	<body>

		<!--wrapper start-->
		<div class="wrapper">
		  
		  @include('partials.navbar-form')
		  
		  @yield('content')
		  
		  @include('partials.footer')
		   
		</div>

		<!--=======================Javascript============================-->
		
		<!--=== Sweet Alert Js ===-->
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		
		<!--=== jQuery Modernizr Min Js ===-->
		<script src="{{ asset('public/js/modernizr.js') }}"></script>
		<!--=== jQuery Min Js ===-->
		<script src="{{ asset('public/js/jquery-main.js') }}"></script>
		<!--=== jQuery Migration Min Js ===-->
		<script src="{{ asset('public/js/jquery-migrate.js') }}"></script>
		<!--=== jQuery Popper Min Js ===-->
		<script src="{{ asset('public/js/popper.min.js') }}"></script>
		<!--=== jQuery Bootstrap Min Js ===-->
		<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
		<!--=== jQuery Swiper Min Js ===-->
		<script src="{{ asset('public/js/swiper.min.js') }}"></script>
		<!--=== jQuery Fancybox Min Js ===-->
		<script src="{{ asset('public/js/fancybox.min.js') }}"></script>
		<!--=== jQuery Aos Min Js ===-->
		<script src="{{ asset('public/js/aos.min.js') }}"></script>
		<!--=== jQuery Counterup Min Js ===-->
		<script src="{{ asset('public/js/counterup.js') }}"></script>
		<!--=== jQuery Waypoint Js ===-->
		<script src="{{ asset('public/js/waypoint.js') }}"></script>

		<!--=== jQuery Custom Js ===-->
		<script src="{{ asset('public/js/custom.js') }}"></script>

	</body>

</html>