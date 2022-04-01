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
                  <span class="author">By <a href="{{ url('/blog')}}">Harold Leonard</a></span>
                  <span class="dots"></span>
                  <span class="post-date">03 April, 21 </span>
                  <span class="dots"></span>
                  <span class="post-time"> 10 min read</span>
                </div>
                <h4 class="title">Simple pricing structure you have the flexibility to be able to grow your business in an effective.</h4>
                <div class="widget-tags">
                  <ul>
                    <li><a href="{{ url('/blog')}}">Agency</a></li>
                    <li><a class="active" href="{{ url('/blog')}}">Circular</a></li>
                    <li><a href="{{ url('/blog')}}">Business</a></li>
                    <li><a href="{{ url('/blog')}}">Corporate</a></li>
                  </ul>
                </div>
              </div>
              <div class="post-details-thumb">
                <img class="w-100" src="{{ asset('public/img/blog/details1.jpg')}}" alt="Image" width="1170" height="550">
              </div>
            </div>
            <div class="col-lg-10">
              <div class="post-details-content">
                <h4 class="desc-title">The job board technology solution for those looking to setup and operate their own job board, through to those who have an established job.</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been industry standard dummy text ever since the a galley type and scrambe make type specimen book has survived not only five centuries text of the printing and typesetin indus standard dummy text everem since the 1500s, when an unknown printer.</p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been industry standard dummy text ever since the a galley type and scrambe make type specimen book has survived not only five centuries text of the printing and typesetin indus standard dummy text everem since the 1500s, when an unknown printer Lorem Ipsum is simply dummy text of the printing and typesetting industry has been industry standar and scrambe make type specimen book has survived not only five centuries text of the printing and typesetin indus standard dummy text everem since the 1500s, when an unknown printer.</p>
                <div class="post-details-content-list">
                  <h4 class="title">Table of Content:</h4>
                  <ul class="list-style">
                    <li>
                      <a href="{{ url('/blog-details') }}"><i class="icofont-double-right"></i>It was popularised in the 1960s with the release of Letraset sheets containing</a>
                    </li>
                    <li>
                      <a href="{{ url('/blog-details') }}"><i class="icofont-double-right"></i> Many desktop publishing packages and web page editors now use</a>
                    </li>
                    <li>
                      <a href="{{ url('/blog-details') }}"><i class="icofont-double-right"></i> It was popularised in the 1960s with the release of Letraset sheets containing</a>
                    </li>
                    <li>
                      <a href="{{ url('/blog-details') }}"><i class="icofont-double-right"></i> Many desktop publishing packages and web page editors now use</a>
                    </li>
                    <li>
                      <a href="{{ url('/blog-details') }}"><i class="icofont-double-right"></i> It was popularised in the 1960s with the release of Letraset sheets containing</a>
                    </li>
                  </ul>
                </div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been industry standard dummy text ever since the a galley type and scrambe make type specimen book has survived not only five centuries text of the printing and typesetin indus standard dummy text everem since the 1500s, when an unknown printer Lorem Ipsum is simply dummy text of the printing and typesetting industry has been industry standar and scrambe make type specimen book has survived not only five centuries text of the printing and typesetin indus standard dummy text everem since the 1500s, when an unknown printer.</p>
                <h4 class="desc-title2">Our company fails the real world test in all kinds of ways.</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been industry standard dummy text ever since the a galley type and scrambe make type specimen book has survived not only five centuries text of the printing and typesetin indus standard dummy text everem since the 1500s, when an unknown printer.</p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been industry standard dummy text ever since the a galley type and scrambe make type specimen book has survived not only five centuries text of the printing and typesetin indus standard dummy text everem since the 1500s, when an unknown printer Lorem Ipsum is simply dummy text of the printing and typesetting industry has been industry standar and scrambe make type specimen book has survived not only five centuries text of the printing and typesetin indus standard dummy text everem since the 1500s, when an unknown printer.</p>
                <div class="content-thumb">
                  <img class="w-100" src="{{ asset('public/img/blog/details2.jpg')}}" alt="Image" width="970" height="450">
                </div>
                <h4 class="desc-title3">Well, that wasn’t the only unconventional thing 37Signals did on their way up.</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been industry standard dummy text ever since the a galley type and scrambe make type specimen book has survived not only five centuries text of the printing and typesetin indus standard dummy text everem since the 1500s, when an unknown printer Lorem Ipsum is simply dummy text of the printing and typesetting industry has been industry standar and scrambe make type specimen book has survived not only five centuries text of the printing and typesetin indus standard dummy text everem since the 1500s, when an unknown printer.</p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been industry standard dummy text ever since the a galley type and scrambe make type specimen book has survived not only five centuries text of the printing and typesetin indus standard dummy text everem since the 1500s, when an unknown printer Lorem Ipsum is simply dummy text of the printing and typesetting industry has been industry standar and scrambe make type specimen book has survived not only five centuries text of the printing and typesetin indus standard dummy text everem since the 1500s, when an unknown printer.</p>
                <blockquote class="blockquote-item">
                  <div class="content">
                    <p>2,83k People Receive Our Weekly WordPress Related Newsletter.</p>
                  </div>
                </blockquote>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy ever since the 1500s, when an unknown printer took a galley of type and scirambled it to make a type specimen book. It has survive only five centuries, but also the leap into electronic typesetting, remaining the essentially unchanged. It was popularised in the 1960 the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing crambled it to make specimen book. It has survived nots only five centuries, but also the leap into.</p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy ever since the 1500s, when an unknown printer took a galley of type and scirambled it to make a type specimen book. It has survive only five centuries, but also the leap into electronic typesetting, remaining the essentially unchanged. It was popularised in the 1960 the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing crambled it to make specimen book. It has survived nots only five centuries, but also the leap into.</p>
                <div class="post-details-footer">
                  <div class="widget-social-icons">
                    <span>Share this article:</span>
                    <div class="social-icons">
                      <a href="https://www.facebook.com/" target="_blank" rel="noopener"><i class="icofont-facebook"></i></a>
                      <a href="https://www.skype.com/" target="_blank" rel="noopener"><i class="icofont-skype"></i></a>
                      <a href="https://twitter.com/" target="_blank" rel="noopener"><i class="icofont-twitter"></i></a>
                      <a href="https://www.linkedin.com/signup" target="_blank" rel="noopener"><i class="icofont-linkedin"></i></a>
                    </div>
                  </div>
                </div>
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
                    <div class="swiper-slide">
                      <!--== Start Blog Post Item ==-->
                      <div class="post-item2">
                        <div class="thumb">
                          <a href="{{ url('/blog-details') }}">
                            <img src="{{ asset('public/img/blog/10.jpg')}}" alt="Image" width="350" height="270">
                          </a>
                        </div>
                        <div class="content">
                          <h5 class="author">By <a href="{{ url('/blog')}}">Walter Houston</a></h5>
                          <h4 class="title"><a href="{{ url('/blog-details') }}">Why wild animal welfare in addition to farmed animal...</a></h4>
                          <div class="meta">
                            <span class="post-date">03 April, 2021</span>
                            <span class="dots"></span>
                            <span class="post-time">10 min read</span>
                          </div>
                        </div>
                      </div>
                      <!--== End Blog Post Item ==-->
                    </div>
                    <div class="swiper-slide">
                      <!--== Start Blog Post Item ==-->
                      <div class="post-item2">
                        <div class="thumb">
                          <a href="{{ url('/blog-details') }}">
                            <img src="{{ asset('public/img/blog/11.jpg')}}" alt="Image" width="350" height="270">
                          </a>
                        </div>
                        <div class="content">
                          <h5 class="author">By <a href="{{ url('/blog')}}">Walter Houston</a></h5>
                          <h4 class="title"><a href="{{ url('/blog-details') }}">Organizations and individual advocates around the world...</a></h4>
                          <div class="meta">
                            <span class="post-date">03 April, 2021</span>
                            <span class="dots"></span>
                            <span class="post-time">10 min read</span>
                          </div>
                        </div>
                      </div>
                      <!--== End Blog Post Item ==-->
                    </div>
                    <div class="swiper-slide">
                      <!--== Start Blog Post Item ==-->
                      <div class="post-item2">
                        <div class="thumb">
                          <a href="{{ url('/blog-details') }}">
                            <img src="{{ asset('public/img/blog/12.jpg')}}" alt="Image" width="350" height="270">
                          </a>
                        </div>
                        <div class="content">
                          <h5 class="author">By <a href="{{ url('/blog')}}">Walter Houston</a></h5>
                          <h4 class="title"><a href="{{ url('/blog-details') }}">It is not currently possible for us to have a good sense.</a></h4>
                          <div class="meta">
                            <span class="post-date">03 April, 2021</span>
                            <span class="dots"></span>
                            <span class="post-time">10 min read</span>
                          </div>
                        </div>
                      </div>
                      <!--== End Blog Post Item ==-->
                    </div>
                    <div class="swiper-slide">
                      <!--== Start Blog Post Item ==-->
                      <div class="post-item2">
                        <div class="thumb">
                          <a href="{{ url('/blog-details') }}">
                            <img src="{{ asset('public/img/blog/3.jpg')}}" alt="Image" width="350" height="270">
                          </a>
                        </div>
                        <div class="content">
                          <h5 class="author">By <a href="{{ url('/blog')}}">Walter Houston</a></h5>
                          <h4 class="title"><a href="{{ url('/blog-details') }}">Why wild animal welfare in addition to farmed animal...</a></h4>
                          <div class="meta">
                            <span class="post-date">03 April, 2021</span>
                            <span class="dots"></span>
                            <span class="post-time">10 min read</span>
                          </div>
                        </div>
                      </div>
                      <!--== End Blog Post Item ==-->
                    </div>
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
