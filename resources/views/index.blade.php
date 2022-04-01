@extends("layouts.master-one")

@section("title")

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <title>{{ env('MY_SITE_NAME') }} - Home</title>
    
@endsection    

    
@section("content")

    <!-- Start Hero Section -->
    <div class="hero-section section overlay" style="background-image: url('{{ asset("public/main-home-page/img/slider-landing.jpg")}}')">
        <div class="container">
            <div class="row">
                <div class="hero-content text-center col-12">
                    <h1><strong>Finate</strong> Job Portal Website Template</h1>
                    <p>Finate Template for Job Portal websites. Nice and clean design.</p>
                    <a class="buy-btn" href="#section-demo">View Demo</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- Start Demo Section -->
    <div id="section-demo" class="demo-section section bg-gray">
        <div class="bg-white">
            <div class="container pt-120 pb-70">
                <div class="row justify-content-center">
				
                    <div class="col-lg-4 col-md-6 col-12 mb-50">
                        <div class="demo-item">
                            <a href="{{ url('/choose-one')}}" class="image">
                                <img src="{{ asset('public/main-home-page/img/demo/page-index1.jpg')}}" alt="Finate Job Board HTML Template">
                                <i class="icon-magnifying-glass"></i>
                            </a>
                            <h4 class="title"><a href="{{ url('/choose-one')}}">Home</a></h4>
                        </div>
                    </div>
					
                    <div class="col-lg-4 col-md-6 col-12 mb-50">
                        <div class="demo-item">
                            <a href="{{ url('/about-us')}}" class="image">
                                <img src="{{ asset('public/main-home-page/img/demo/page-about-us.jpg')}}" alt="Finate Job Board HTML Template">
                                <i class="icon-magnifying-glass"></i>
                            </a>
                            <h4 class="title"><a href="{{ url('/about-us')}}">About Us</a></h4>
                        </div>
                    </div>
					
                    <div class="col-lg-4 col-md-6 col-12 mb-50">
                        <div class="demo-item">
                            <a href="{{ url('/contact-us')}}" class="image">
                                <img src="{{ asset('public/main-home-page/img/demo/page-contact.jpg')}}" alt="Finate Job Board HTML Template">
                                <i class="icon-magnifying-glass"></i>
                            </a>
                            <h4 class="title"><a href="{{ url('/contact-us')}}">Contact Us</a></h4>
                        </div>
                    </div>
					
					<div class="col-lg-4 col-md-6 col-12 mb-50">
                        <div class="demo-item">
                            <a href="{{ url('/blog')}}" class="image">
                                <img src="{{ asset('public/main-home-page/img/demo/page-blog.jpg')}}" alt="Finate Job Board HTML Template">
                                <i class="icon-magnifying-glass"></i>
                            </a>
                            <h4 class="title"><a href="{{ url('/blog')}}">Blog</a></h4>
                        </div>
                    </div>
					
                </div>
            </div>
        </div>
        
    </div>
    <!-- End Demo Section -->

@endsection
