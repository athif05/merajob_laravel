@extends("layouts.master")

@section("title")

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ env('MY_SITE_NAME') }}"/>
    <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive"/>
    <meta name="author" content="{{ env('MY_SITE_AUTHOR') }}"/>

    <title>Employee Profile | {{ env('MY_SITE_NAME') }}</title>
	
@endsection


@section("content")
	
	<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="{{ asset('public/img/photos/sl1.jpg')}}">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title">@if(!empty(session('login_user_data')[0]['name']) ) {{ session('login_user_data')[0]['name'] }} @endif</h2>
              <nav class="breadcrumb-area">
                <ul class="breadcrumb justify-content-center">
                  <li><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-sep">//Employee Profile</li>
                  <li></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Blog Area Wrapper ==-->
    <section class="blog-area blog-grid-area">
      <div class="container">
        <div class="row justify-content-between flex-xl-row-reverse">
          <div class="col-xl-8">
            <div class="row row-gutter-70">
              <div class="col-sm-6 col-lg-4 col-xl-6">
                <!--== Start Blog Post Item ==-->
                <div class="post-item">
                  <div class="thumb">
                    <a href="{{ url('/blog-details') }}"><img src="{{ asset('public/img/blog/2.jpg')}}" alt="Image" width="370" height="270"></a>
                  </div>
                  <div class="content">
                    <div class="author">By <a href="{{ url('/blog')}}">Walter Houston</a></div>
                    <h4 class="title"><a href="{{ url('/blog-details') }}">All of these amazing features <br>come at an affordable price!</a></h4>
                    <p>Lorem Ipsum is simpely dummy & text themes print industry orem psumen has been them industry spa also the loep into type setting.</p>
                    <div class="meta">
                      <span class="post-date">03 April, 2022</span>
                      <span class="dots"></span>
                      <span class="post-time">10 min read</span>
                    </div>
                  </div>
                </div>
                <!--== End Blog Post Item ==-->
              </div>
              <div class="col-sm-6 col-lg-4 col-xl-6">
                <!--== Start Blog Post Item ==-->
                <div class="post-item">
                  <div class="thumb">
                    <a href="{{ url('/blog-details') }}"><img src="{{ asset('public/img/blog/3.jpg')}}" alt="Image" width="370" height="270"></a>
                  </div>
                  <div class="content">
                    <div class="author">By <a href="{{ url('/blog')}}">Walter Houston</a></div>
                    <h4 class="title"><a href="{{ url('/blog-details') }}">With WooLentor's drag-and <br>drop interface for creating...</a></h4>
                    <p>Lorem Ipsum is simpely dummy & text themes print industry orem psumen has been them industry spa also the loep into type setting.</p>
                    <div class="meta">
                      <span class="post-date">03 April, 2022</span>
                      <span class="dots"></span>
                      <span class="post-time">10 min read</span>
                    </div>
                  </div>
                </div>
                <!--== End Blog Post Item ==-->
              </div>
              <div class="col-sm-6 col-lg-4 col-xl-6">
                <!--== Start Blog Post Item ==-->
                <div class="post-item">
                  <div class="thumb">
                    <a href="{{ url('/blog-details') }}"><img src="{{ asset('public/img/blog/4.jpg')}}" alt="Image" width="370" height="270"></a>
                  </div>
                  <div class="content">
                    <div class="author">By <a href="{{ url('/blog')}}">Walter Houston</a></div>
                    <h4 class="title"><a href="{{ url('/blog-details') }}">With WooLentor's drag-and <br>drop interface for creating...</a></h4>
                    <p>Lorem Ipsum is simpely dummy & text themes print industry orem psumen has been them industry spa also the loep into type setting.</p>
                    <div class="meta">
                      <span class="post-date">03 April, 2022</span>
                      <span class="dots"></span>
                      <span class="post-time">10 min read</span>
                    </div>
                  </div>
                </div>
                <!--== End Blog Post Item ==-->
              </div>
              <div class="col-sm-6 col-lg-4 col-xl-6">
                <!--== Start Blog Post Item ==-->
                <div class="post-item">
                  <div class="thumb">
                    <a href="{{ url('/blog-details') }}"><img src="{{ asset('public/img/blog/5.jpg')}}" alt="Image" width="370" height="270"></a>
                  </div>
                  <div class="content">
                    <div class="author">By <a href="{{ url('/blog')}}">Walter Houston</a></div>
                    <h4 class="title"><a href="{{ url('/blog-details') }}">Make your store stand out <br>from the others by converting</a></h4>
                    <p>Lorem Ipsum is simpely dummy & text themes print industry orem psumen has been them industry spa also the loep into type setting.</p>
                    <div class="meta">
                      <span class="post-date">03 April, 2021</span>
                      <span class="dots"></span>
                      <span class="post-time">10 min read</span>
                    </div>
                  </div>
                </div>
                <!--== End Blog Post Item ==-->
              </div>
              <div class="col-sm-6 col-lg-4 col-xl-6">
                <!--== Start Blog Post Item ==-->
                <div class="post-item">
                  <div class="thumb">
                    <a href="{{ url('/blog-details') }}"><img src="{{ asset('public/img/blog/6.jpg')}}" alt="Image" width="370" height="270"></a>
                  </div>
                  <div class="content">
                    <div class="author">By <a href="{{ url('/blog')}}">Walter Houston</a></div>
                    <h4 class="title"><a href="{{ url('/blog-details') }}">All of these amazing features <br>come at an affordable price!</a></h4>
                    <p>Lorem Ipsum is simpely dummy & text themes print industry orem psumen has been them industry spa also the loep into type setting.</p>
                    <div class="meta">
                      <span class="post-date">03 April, 2022</span>
                      <span class="dots"></span>
                      <span class="post-time">10 min read</span>
                    </div>
                  </div>
                </div>
                <!--== End Blog Post Item ==-->
              </div>
              <div class="col-sm-6 col-lg-4 col-xl-6">
                <!--== Start Blog Post Item ==-->
                <div class="post-item">
                  <div class="thumb">
                    <a href="{{ url('/blog-details') }}"><img src="{{ asset('public/img/blog/7.jpg')}}" alt="Image" width="370" height="270"></a>
                  </div>
                  <div class="content">
                    <div class="author">By <a href="{{ url('/blog')}}">Walter Houston</a></div>
                    <h4 class="title"><a href="{{ url('/blog-details') }}">With WooLentor's drag-and <br>drop interface for creating...</a></h4>
                    <p>Lorem Ipsum is simpely dummy & text themes print industry orem psumen has been them industry spa also the loep into type setting.</p>
                    <div class="meta">
                      <span class="post-date">03 April, 2022</span>
                      <span class="dots"></span>
                      <span class="post-time">10 min read</span>
                    </div>
                  </div>
                </div>
                <!--== End Blog Post Item ==-->
              </div>
              <div class="col-sm-6 col-lg-4 col-xl-6">
                <!--== Start Blog Post Item ==-->
                <div class="post-item">
                  <div class="thumb">
                    <a href="{{ url('/blog-details') }}"><img src="{{ asset('public/img/blog/8.jpg')}}" alt="Image" width="370" height="270"></a>
                  </div>
                  <div class="content">
                    <div class="author">By <a href="{{ url('/blog')}}">Walter Houston</a></div>
                    <h4 class="title"><a href="{{ url('/blog-details') }}">With WooLentor's drag-and <br>drop interface for creating...</a></h4>
                    <p>Lorem Ipsum is simpely dummy & text themes print industry orem psumen has been them industry spa also the loep into type setting.</p>
                    <div class="meta">
                      <span class="post-date">03 April, 2022</span>
                      <span class="dots"></span>
                      <span class="post-time">10 min read</span>
                    </div>
                  </div>
                </div>
                <!--== End Blog Post Item ==-->
              </div>
              <div class="col-sm-6 col-lg-4 col-xl-6">
                <!--== Start Blog Post Item ==-->
                <div class="post-item">
                  <div class="thumb">
                    <a href="{{ url('/blog-details') }}"><img src="{{ asset('public/img/blog/9.jpg')}}" alt="Image" width="370" height="270"></a>
                  </div>
                  <div class="content">
                    <div class="author">By <a href="{{ url('/blog')}}">Walter Houston</a></div>
                    <h4 class="title"><a href="{{ url('/blog-details') }}">Make your store stand out <br>from the others by converting</a></h4>
                    <p>Lorem Ipsum is simpely dummy & text themes print industry orem psumen has been them industry spa also the loep into type setting.</p>
                    <div class="meta">
                      <span class="post-date">03 April, 2021</span>
                      <span class="dots"></span>
                      <span class="post-time">10 min read</span>
                    </div>
                  </div>
                </div>
                <!--== End Blog Post Item ==-->
              </div>
              <div class="col-12 text-left">
                <div class="pagination-area">
                  <nav>
                    <ul class="page-numbers d-inline-flex">
                      <li>
                        <a class="page-number active" href="{{ url('/blog')}}">1</a>
                      </li>
                      <li>
                        <a class="page-number" href="{{ url('/blog')}}">2</a>
                      </li>
                      <li>
                        <a class="page-number" href="{{ url('/blog')}}">3</a>
                      </li>
                      <li>
                        <a class="page-number" href="{{ url('/blog')}}">4</a>
                      </li>
                      <li>
                        <a class="page-number next" href="{{ url('/blog')}}">
                          <i class="icofont-long-arrow-right"></i>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="blog-sidebar blog-sidebar-left">
              
              <div class="widget-item">
                <div class="widget-title">
                  <h3 class="title">Post Category</h3>
                </div>
                <div class="widget-body">
                  <div class="widget-categories">
                    <ul>
                      <li><a href="job.html">Commercial Movers<span>(16)</span></a></li>
                      <li><a href="job.html">Air Freight Services<span>(03)</span></a></li>
                      <li><a href="job.html">Drone Services<span>(08)</span></a></li>
                      <li><a href="job.html">Road Freight<span>(18)</span></a></li>
                      <li><a href="job.html">Warehousing<span>(02)</span></a></li>
                      <li><a href="job.html">Consulting Storage<span>(14)</span></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="widget-item">
                <div class="widget-title">
                  <h3 class="title">Recent Post</h3>
                </div>
                <div class="widget-body">
                  <div class="widget-post">
                    <div class="widget-blog-post">
                      <div class="thumb">
                        <a href="{{ url('/blog-details') }}"><img src="{{ asset('public/img/blog/s1.jpg')}}" alt="Image" width="71" height="70"></a>
                      </div>
                      <div class="content">
                        <h4><a href="{{ url('/blog-details') }}">This includes shipment <br>of raw materials.</a></h4>
                        <div class="meta">
                          <span class="post-date"><i class="icofont-ui-calendar"></i> 10 August, 2021</span>
                        </div>
                      </div>
                    </div>
                    <div class="widget-blog-post">
                      <div class="thumb">
                        <a href="{{ url('/blog-details') }}"><img src="{{ asset('public/img/blog/s2.jpg')}}" alt="Image" width="71" height="70"></a>
                      </div>
                      <div class="content">
                        <h4><a href="{{ url('/blog-details') }}">All of these amazing <br>features come price.</a></h4>
                        <div class="meta">
                          <span class="post-date"><i class="icofont-ui-calendar"></i> 18 August, 2021</span>
                        </div>
                      </div>
                    </div>
                    <div class="widget-blog-post">
                      <div class="thumb">
                        <a href="{{ url('/blog-details') }}"><img src="{{ asset('public/img/blog/s3.jpg')}}" alt="Image" width="71" height="70"></a>
                      </div>
                      <div class="content">
                        <h4><a href="{{ url('/blog-details') }}">This includes shipment <br>of raw materials.</a></h4>
                        <div class="meta">
                          <span class="post-date"><i class="icofont-ui-calendar"></i> 19 August, 2021</span>
                        </div>
                      </div>
                    </div>
                    <div class="widget-blog-post">
                      <div class="thumb">
                        <a href="{{ url('/blog-details') }}"><img src="{{ asset('public/img/blog/s4.jpg')}}" alt="Image" width="71" height="70"></a>
                      </div>
                      <div class="content">
                        <h4><a href="{{ url('/blog-details') }}">All of these amazing <br>features come price.</a></h4>
                        <div class="meta">
                          <span class="post-date"><i class="icofont-ui-calendar"></i> 10 August, 2021</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="widget-item mb-md-0">
                <div class="widget-title">
                  <h3 class="title">Popular Tags</h3>
                </div>
                <div class="widget-body">
                  <div class="widget-tags">
                    <ul>
                      <li><a href="job.html">Animal</a></li>
                      <li><a class="tags-padding mr-0" href="job.html">Bird’s</a></li>
                      <li><a class="tags-padding" href="job.html">Charity</a></li>
                      <li><a class="mr-0" href="job.html">Forest</a></li>
                      <li><a href="job.html">Water</a></li>
                      <li><a class="tags-padding mr-0" href="job.html">Children</a></li>
                      <li><a class="tags-padding" href="job.html">Human</a></li>
                      <li><a href="job.html">Jungle</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Blog Area Wrapper ==-->
  </main>
  
@endsection
