<?php
Use App\Blog;
?>
@extends("layouts.master")

@section("title")

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ env('MY_SITE_NAME') }}"/>
    <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive"/>
    <meta name="author" content="hastech"/>

    <title>Blog | {{ env('MY_SITE_NAME') }}</title>
	
@endsection


@section("content")
	
	<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="{{ asset('public/img/photos/sl1.jpg')}}">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title">Blog Post</h2>
              <nav class="breadcrumb-area">
                <ul class="breadcrumb justify-content-center">
                  <li><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>Blog Post</li>
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

              @foreach($blogs as $blog)
              <div class="col-sm-6 col-lg-4 col-xl-6">
                <!--== Start Blog Post Item ==-->
                <div class="post-item">
                  <div class="thumb">
                    <a href="{{ url('/blog-details/'.$blog['id']) }}" target="_blank"><img src="{{asset('').$blog['image']}}" alt="Image" width="370" height="270"></a>
                  </div>
                  <div class="content">
                    <div class="author">
                      By <a href="{{ url('/blog')}}">{{ $blog['author_name'] }}</a>
                    </div>
                    <h4 class="title">
                      <a href="{{ url('/blog-details/'.$blog['id']) }}" target="_blank">{{ $blog['title'] }}</a>
                    </h4>
                    <p>{!! Str::limit($blog['description'], 250, ' ...') !!}</p>
                    <div class="meta">
                      <span class="post-date">{{ date('d-M, Y',strtotime($blog['created_at'])) }}</span>
                      <!-- <span class="dots"></span>
                       <span class="post-time">10 min read</span> -->
                    </div>
                  </div>
                </div>
                <!--== End Blog Post Item ==-->
              </div>
              @endforeach

              <div class="col-12 text-left">
                <div class="pagination-area">
                  <nav>
                    <ul class="page-numbers d-inline-flex">
                      
                      {{$blogs->links()}}

                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="blog-sidebar blog-sidebar-left">
              <div class="widget-item">
                <div class="widget-body">
                  <div class="widget-search-box">
                    <form action="{{ route('blogs.search') }}" method="get">
                      <div class="form-input-item">
                        <input type="search" name="searching_keyword" id="search2" placeholder="Search here" value="{{request()->get('searching_keyword')}}">
                        <button type="submit" class="btn-src">
                          <i class="icofont-search"></i>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="widget-item">
                <div class="widget-title">
                  <h3 class="title">Post Category</h3>
                </div>
                <div class="widget-body">
                  <div class="widget-categories">
                    <ul>
                      @foreach($blogCategories as $blogCategory)
                      @php $blogsCount= Blog::blogsCount($blogCategory['id']) @endphp
                      <li>
                        <a href="{{ url('/blogs/category/'.$blogCategory['id']) }}">{{ $blogCategory['name'] }}<span>({{$blogsCount}})</span></a>
                      </li>
                      @endforeach
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

                    @foreach($latestBlogs as $latestBlog)
                    <div class="widget-blog-post">
                      <div class="thumb">
                        <a href="{{ url('/blog-details/'.$latestBlog['id']) }}"><img src="{{asset('').$latestBlog['image']}}" alt="Image" style="width: 71px; height: 71px;" target="_blank"></a>
                      </div>
                      <div class="content">
                        <h4>
                          <a href="{{ url('/blog-details/'.$latestBlog['id']) }}" target="_blank">{!! Str::limit($latestBlog['title'], 40, ' ...') !!}</a>
                        </h4>
                        <div class="meta">
                          <span class="post-date"><i class="icofont-ui-calendar"></i> {{ date('d-M, Y',strtotime($latestBlog['created_at'])) }}</span>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    
                  </div>
                </div>
              </div>
              <!-- <div class="widget-item mb-md-0">
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
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Blog Area Wrapper ==-->
  </main>
  
@endsection
