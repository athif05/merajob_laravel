@extends("layouts.master")

@section("title")

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ env('MY_SITE_NAME') }}"/>
    <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive"/>
    <meta name="author" content="{{ env('MY_SITE_AUTHOR') }}"/>

    <title>Blog Details | {{ env('MY_SITE_NAME') }}</title>
	
@endsection


@section("content")
  
  <main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="{{ asset('public/img/photos/sl1.jpg')}}">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title">Blog Details</h2>
              <nav class="breadcrumb-area">
                <ul class="breadcrumb justify-content-center">
                  <li><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>Blog Details</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->
    
    <!--== Start Blog Area Wrapper ==-->
    <section class="blog-details-area">
      <div class="post-details-item">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="post-details-info text-center">
                <div class="meta">
                  <span class="author">By <a href="{{ url('/blog')}}">{{ $blogDetails['author_name']}}</a></span>
                  <span class="dots"></span>
                  <span class="post-date">{{ date('d-M, Y',strtotime($blogDetails['created_at'])) }}</span>
                  <!-- <span class="dots"></span>
                  <span class="post-time"> 10 min read</span> -->
                </div>
                <h4 class="title">{{ $blogDetails['title']}}</h4>
                <!-- <div class="widget-tags">
                  <ul>
                    <li><a href="{{ url('/blog')}}">Agency</a></li>
                    <li><a class="active" href="{{ url('/blog')}}">Circular</a></li>
                    <li><a href="{{ url('/blog')}}">Business</a></li>
                    <li><a href="{{ url('/blog')}}">Corporate</a></li>
                  </ul>
                </div> -->
              </div>
              <div class="post-details-thumb">
                <img class="w-100" src="{{asset('').$blogDetails['image']}}" alt="Image" style="width: 100%; max-height: 450px;">
              </div>
            </div>
            <div class="col-lg-10">
              <div class="post-details-content">
                {!! $blogDetails['description'] !!}                
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="related-posts-area related-post-area bg-color-gray">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="post-title-wrap">
                <h4 class="title">You may also like</h4>
                <!--== Add Swiper Arrows ==-->
                <div class="swiper-btn-wrap">
                  <div class="related-post-swiper-btn-prev">
                    <i class="icofont-long-arrow-left"></i>
                  </div>
                  <div class="related-post-swiper-btn-next">
                    <i class="icofont-long-arrow-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="related-posts">
                <div class="swiper related-post-slider-container">
                  <div class="swiper-wrapper related-post-slider">
                    
                    @foreach($latestBlogs as $latestBlog)
                    <div class="swiper-slide">
                      <!--== Start Blog Post Item ==-->
                      <div class="post-item2">
                        <div class="thumb">
                          <a href="{{ url('/blog-details/'.$latestBlog['id']) }}">
                            <img src="{{asset('').$latestBlog['image']}}" alt="Image" width="350" height="270">
                          </a>
                        </div>
                        <div class="content">
                          <h5 class="author">
                            By <a href="#">
                              {{$latestBlog['author_name']}}
                            </a>
                          </h5>
                          <h4 class="title"><a href="{{ url('/blog-details/'.$latestBlog['id']) }}">{!! Str::limit($latestBlog['title'], 70, ' ...') !!}</a></h4>
                          <div class="meta">
                            <span class="post-date">{{ date('d-M, Y',strtotime($latestBlog['created_at'])) }}</span>
                           <!--  <span class="dots"></span>
                            <span class="post-time">10 min read</span> -->
                          </div>
                        </div>
                      </div>
                      <!--== End Blog Post Item ==-->
                    </div>
                    @endforeach

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="comment-area">
        <div class="container pt--0 pb--0">
          <div class="row justify-content-center">
            <div class="col-lg-10">
              <div class="comment-view-area">
                <h2 class="main-title">Comments (03)</h2>
                <div class="comment-content">
                  <div class="single-comment">
                    <div class="author-info">
                      <div class="thumb">
                        <img src="{{ asset('public/img/blog/a1.png')}}" alt="Image" width="72" height="72">
                      </div>
                      <div class="author-details">
                        <h4 class="title">Sara Alexander</h4>
                        <ul>
                          <li>Product Designer, USA || <span>35 minutes ago</span></li>
                        </ul>
                      </div>
                    </div>
                    <p class="desc">Lorem Ipsum is simply dummy text of printing and typesetting industry has been industry standard dummy text ever since the galley and scrambe make type specimen book has surived not only five centuries text of the printing and typesetin indus standard dummy since the 1500s, when an unknown printer.</p>
                    <a class="btn-reply" href="#/"><i class="icofont-reply"></i>Reply</a>
                  </div>
                  <div class="single-comment comment-reply">
                    <div class="author-info">
                      <div class="thumb">
                        <img src="{{ asset('public/img/blog/a2.png')}}" alt="Image" width="72" height="72">
                      </div>
                      <div class="author-details">
                        <h4 class="title">Robert Morgan</h4>
                        <ul>
                          <li>Product Designer, USA || <span>35 minutes ago</span></li>
                        </ul>
                      </div>
                    </div>
                    <p class="desc">Lorem Ipsum is simply dummy text printing and typesetting industry has been industry standard dummy text ever since and scrambe make type specimen book has surived note only five centuries text of the printing and typesetin standard since the 1500s, when an unknown printer.</p>
                    <a class="btn-reply" href="#/"><i class="icofont-reply"></i>Reply</a>
                  </div>
                  <div class="single-comment comment-reply mb--0">
                    <div class="author-info">
                      <div class="thumb">
                        <img src="{{ asset('public/img/blog/a3.png')}}" alt="Image" width="72" height="72">
                      </div>
                      <div class="author-details">
                        <h4 class="title">Rochelle Hunt</h4>
                        <ul>
                          <li>Product Designer, USA || <span>35 minutes ago</span></li>
                        </ul>
                      </div>
                    </div>
                    <p class="desc">Lorem Ipsum is simply dummy text printing and typesetting industry has been industry standard dummy text ever since and scrambe make type specimen book has surived note only five centuries text of the printing and typesetin standard since the 1500s, when an unknown printer.</p>
                    <a class="btn-reply" href="#/"><i class="icofont-reply"></i>Reply</a>
                  </div>
                </div>
              </div>
              <div class="comment-form-wrap">
                <h2 class="main-title">Leave a Comment</h2>
                <form class="comment-form" action="#">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input class="form-control" type="text" placeholder="Name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input class="form-control" type="email" placeholder="Email">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea class="form-control" placeholder="Massage"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group text-center mb--0">
                        <button class="btn btn-theme" type="submit">Submit Now <i class="icofont-long-arrow-right"></i></button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Blog Area Wrapper ==-->
  </main>

@endsection
