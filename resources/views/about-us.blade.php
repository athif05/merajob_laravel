@extends("layouts.master")

@section("title")

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ env('MY_SITE_NAME') }}"/>
    <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive"/>
    <meta name="author" content="{{ env('MY_SITE_AUTHOR') }}"/>

    <title>About Us | {{ env('MY_SITE_NAME') }}</title>
	
@endsection


@section("content")

<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="{{ asset('public/img/photos/sl1.jpg')}}">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title">About Us</h2>
              <nav class="breadcrumb-area">
                <ul class="breadcrumb justify-content-center">
                  <li><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>About Us</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start About Area Wrapper ==-->
    <section class="about-area about-default-wrapper">
      <div class="container">
        <div class="about-item">
          <div class="row">

            <div class="col-md-12 col-lg-12">
              <div class="about-thumb" data-aos="fade-down" data-aos-duration="1000">
               @if($aboutus_details['image'])
               <img src="{{asset('').$aboutus_details['image']}}" alt="Image-HasTech" style="width: 100%; max-height: 400px;">
               @endif
              </div>
            </div>
            
            <div class="col-lg-12">
              <div class="text-justify" data-aos="fade-down" data-aos-duration="1000">
                <h4 class="sub-title">&nbsp;</h4>
                <h3 class="title">{{ $aboutus_details['title']}}</h3>
                <p class="desc"><?php echo $aboutus_details['description'];?></p>
                <div class="member-join-content" data-aos="fade-right" data-aos-duration="1200">
                  <div class="member-join-thumb">
                    <ul>
                      <li>
                        <a href="{{url('/candidate-details')}}">
                          <img src="{{ asset('public/img/about/member1.png')}}" width="50" height="50" alt="Image-HasTech">
                        </a>
                      </li>
                      <li>
                        <a href="{{url('/candidate-details')}}">
                          <img src="{{ asset('public/img/about/member2.png')}}" width="50" height="50" alt="Image-HasTech">
                        </a>
                      </li>
                      <li>
                        <a href="{{url('/candidate-details')}}">
                          <img src="{{ asset('public/img/about/member3.png')}}" width="50" height="50" alt="Image-HasTech">
                        </a>
                      </li>
                      <li>
                        <a href="{{url('/candidate-details')}}">
                          <img src="{{ asset('public/img/about/member4.png')}}" width="50" height="50" alt="Image-HasTech">
                        </a>
                      </li>
                      <li>
                        <a href="{{url('/candidate-details')}}">
                          <img src="{{ asset('public/img/about/member4.png')}}" width="50" height="50" alt="Image-HasTech">
                          <span>+</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="member-join-btn">
                    <a class="join-now-btn" href="{{url('/job-details')}}"><span>+</span> Join Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End About Area Wrapper ==-->

    <!--== Start Funfact Area Wrapper ==-->
    <section class="funfact-area bg-color-gray">
      <div class="container">
        <div class="row no-gutter">
          <div class="col-12">
            <div class="funfact-content-wrap">
              <div class="funfact-col">
                <!--== Start Funfact Item ==-->
                <div class="funfact-item" data-aos="fade-down">
                  <h2 class="counter-number"><span class="counter" data-counterup-delay="50">5689</span></h2>
                  <h6 class="counter-title">Total Jobs</h6>
                </div>
                <!--== End Funfact Item ==-->
              </div>
              <div class="funfact-col">
                <!--== Start Funfact Item ==-->
                <div class="funfact-item" data-aos="fade-down" data-aos-duration="1500">
                  <h2 class="counter-number"><span class="counter" data-counterup-delay="50">8567</span></h2>
                  <h6 class="counter-title">Candidates</h6>
                </div>
                <!--== End Funfact Item ==-->
              </div>
              <div class="funfact-col">
                <!--== Start Funfact Item ==-->
                <div class="funfact-item" data-aos="fade-down" data-aos-duration="1700">
                  <h2 class="counter-number"><span class="counter" data-counterup-delay="50">7457</span></h2>
                  <h6 class="counter-title">Resume</h6>
                </div>
                <!--== End Funfact Item ==-->
              </div>
              <div class="funfact-col">
                <!--== Start Funfact Item ==-->
                <div class="funfact-item" data-aos="fade-down" data-aos-duration="1900">
                  <h2 class="counter-number"><span class="counter" data-counterup-delay="50">6483</span></h2>
                  <h6 class="counter-title">Compnay’s</h6>
                </div>
                <!--== End Funfact Item ==-->
              </div>
              <div class="funfact-col">
                <!--== Start Funfact Item ==-->
                <div class="funfact-item" data-aos="fade-down" data-aos-duration="2200">
                  <h2 class="counter-number"><span class="counter" data-counterup-delay="50">358</span></h2>
                  <h6 class="counter-title">Country’s</h6>
                </div>
                <!--== End Funfact Item ==-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Funfact Area Wrapper ==-->

    <!--== Start Team Area Wrapper ==-->
    <section class="team-area team-inner-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title text-center" data-aos="fade-down">
              <h3 class="title">Best Candidate</h3>
              <div class="desc">
                <p>Many desktop publishing packages and web page editors</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row" data-aos="fade-down">
          <div class="col-sm-6 col-lg-4 col-xl-3">
            <!--== Start Team Item ==-->
            <div class="team-item">
              <div class="thumb">
                <a href="{{url('/candidate-details')}}">
                  <img src="{{ asset('public/img/team/1.jpg')}}" width="160" height="160" alt="Image-HasTech">
                </a>
              </div>
              <div class="content">
                <h4 class="title"><a href="{{url('/candidate-details')}}">Lauran Benitez</a></h4>
                <h5 class="sub-title">Web Designer</h5>
                <div class="rating-box">
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                </div>
                <p class="desc">CSS3, HTML5, Javascript Bootstrap, Jquery</p>
                <a class="btn-theme btn-white btn-sm" href="{{url('/candidate-details')}}">View Profile</a>
              </div>
              <div class="bookmark-icon"><img src="{{ asset('public/img/icons/bookmark1.png')}}" alt="Image-HasTech"></div>
              <div class="bookmark-icon-hover"><img src="{{ asset('public/img/icons/bookmark2.png')}}" alt="Image-HasTech"></div>
            </div>
            <!--== End Team Item ==-->
          </div>
          <div class="col-sm-6 col-lg-4 col-xl-3">
            <!--== Start Team Item ==-->
            <div class="team-item">
              <div class="thumb">
                <a href="{{url('/candidate-details')}}">
                  <img src="{{ asset('public/img/team/2.jpg')}}" width="160" height="160" alt="Image-HasTech">
                </a>
              </div>
              <div class="content">
                <h4 class="title"><a href="{{url('/candidate-details')}}">Valentine Anders</a></h4>
                <h5 class="sub-title">UI/UX Designer</h5>
                <div class="rating-box">
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                </div>
                <p class="desc">CSS3, HTML5, Javascript Bootstrap, Jquery</p>
                <a class="btn-theme btn-white btn-sm" href="{{url('/candidate-details')}}">View Profile</a>
              </div>
              <div class="bookmark-icon"><img src="{{ asset('public/img/icons/bookmark1.png')}}" alt="Image-HasTech"></div>
              <div class="bookmark-icon-hover"><img src="{{ asset('public/img/icons/bookmark2.png')}}" alt="Image-HasTech"></div>
            </div>
            <!--== End Team Item ==-->
          </div>
          <div class="col-sm-6 col-lg-4 col-xl-3">
            <!--== Start Team Item ==-->
            <div class="team-item">
              <div class="thumb">
                <a href="{{url('/candidate-details')}}">
                  <img src="{{ asset('public/img/team/3.jpg')}}" width="160" height="160" alt="Image-HasTech">
                </a>
              </div>
              <div class="content">
                <h4 class="title"><a href="{{url('/candidate-details')}}">Shakia Aguilera</a></h4>
                <h5 class="sub-title">Web Designer</h5>
                <div class="rating-box">
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                </div>
                <p class="desc">CSS3, HTML5, Javascript Bootstrap, Jquery</p>
                <a class="btn-theme btn-white btn-sm" href="{{url('/candidate-details')}}">View Profile</a>
              </div>
              <div class="bookmark-icon"><img src="{{ asset('public/img/icons/bookmark1.png')}}" alt="Image-HasTech"></div>
              <div class="bookmark-icon-hover"><img src="{{ asset('public/img/icons/bookmark2.png')}}" alt="Image-HasTech"></div>
            </div>
            <!--== End Team Item ==-->
          </div>
          <div class="col-sm-6 col-lg-4 col-xl-3">
            <!--== Start Team Item ==-->
            <div class="team-item">
              <div class="thumb">
                <a href="{{url('/candidate-details')}}">
                  <img src="{{ asset('public/img/team/4.jpg')}}" width="160" height="160" alt="Image-HasTech">
                </a>
              </div>
              <div class="content">
                <h4 class="title"><a href="{{url('/candidate-details')}}">Assunta Manson</a></h4>
                <h5 class="sub-title">App. Developer</h5>
                <div class="rating-box">
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                </div>
                <p class="desc">CSS3, HTML5, Javascript Bootstrap, Jquery</p>
                <a class="btn-theme btn-white btn-sm" href="{{url('/candidate-details')}}">View Profile</a>
              </div>
              <div class="bookmark-icon"><img src="{{ asset('public/img/icons/bookmark1.png')}}" alt="Image-HasTech"></div>
              <div class="bookmark-icon-hover"><img src="{{ asset('public/img/icons/bookmark2.png')}}" alt="Image-HasTech"></div>
            </div>
            <!--== End Team Item ==-->
          </div>
        </div>
      </div>
    </section>
    <!--== End Team Area Wrapper ==-->

    <!--== Start Divider Area Wrapper ==--
    <section class="sec-overlay sec-overlay-theme bg-img" data-bg-img="{{ asset('public/img/photos/bg1.webp')}}">
      <div class="container pt--0 pb--0">
        <div class="row justify-content-center divider-style1">
          <div class="col-lg-7">
            <div class="divider-content text-center">
              <h4 class="sub-title" data-aos="fade-down">Trial Version Available</h4>
              <h2 class="title" data-aos="fade-down">Download Our Mobile App. <br>You Can Ready Resume & Apply Job.</h2>
              <div class="divider-btn-group">
                <a class="btn-divider" data-aos="fade-down" href="page-not-found.html">
                  <img src="{{ asset('public/img/photos/google-play.png')}}" width="201" height="63" class="icon" alt="Image-HasTech">
                </a>
                <a class="btn-divider btn-divider-app-store" data-aos="fade-down" href="page-not-found.html">
                  <img src="{{ asset('public/img/photos/mac-os.png')}}" width="201" height="63" class="icon" alt="Image-HasTech">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-layer-style1"></div>
      <div class="bg-layer-style2"></div>
    </section>
    !--== End Divider Area Wrapper ==-->

    <!--== Start Testimonial Area Wrapper ==-->
    <section class="testimonial-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title text-center" data-aos="fade-down">
              <h3 class="title">Our Happy Clients</h3>
              <div class="desc">
                <p>Many desktop publishing packages and web page editors</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12" data-aos="fade-down">
            <div class="swiper testi-slider-container">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <!--== Start Testimonial Item ==-->
                  <div class="testimonial-item testimonial-style2-item">
                    <div class="testi-inner-content">
                      <div class="testi-author">
                        <div class="testi-thumb">
                          <img src="{{ asset('public/img/testimonial/1.jpg')}}" width="75" height="75" alt="Image-HasTech">
                        </div>
                        <div class="testi-info">
                          <h4 class="name">Roselia Hamets</h4>
                          <span class="designation">Hiring Manager</span>
                        </div>
                      </div>
                      <div class="testi-content">
                        <p class="desc">It is a long established fact that reader will distracted the readable content page looking at its layout point using that has more-or-less normal distribution of letters opposed using content making.</p>
                        <div class="rating-box">
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                        </div>
                        <div class="testi-quote"><img src="{{ asset('public/img/icons/quote1.png')}}" alt="Image-HasTech"></div>
                      </div>
                    </div>
                  </div>
                  <!--== End Testimonial Item ==-->
                </div>
                <div class="swiper-slide">
                  <!--== Start Testimonial Item ==-->
                  <div class="testimonial-item testimonial-style2-item">
                    <div class="testi-inner-content">
                      <div class="testi-author">
                        <div class="testi-thumb">
                          <img src="{{ asset('public/img/testimonial/2.jpg')}}" width="75" height="75" alt="Image-HasTech">
                        </div>
                        <div class="testi-info">
                          <h4 class="name">Assunta Manson</h4>
                          <span class="designation">Hiring Manager</span>
                        </div>
                      </div>
                      <div class="testi-content">
                        <p class="desc">It is a long established fact that reader will distracted the readable content page looking at its layout point using that has more-or-less normal distribution of letters opposed using content making.</p>
                        <div class="rating-box">
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                        </div>
                        <div class="testi-quote"><img src="{{ asset('public/img/icons/quote1.png')}}" alt="Image-HasTech"></div>
                      </div>
                    </div>
                  </div>
                  <!--== End Testimonial Item ==-->
                </div>
                <div class="swiper-slide">
                  <!--== Start Testimonial Item ==-->
                  <div class="testimonial-item testimonial-style2-item">
                    <div class="testi-inner-content">
                      <div class="testi-author">
                        <div class="testi-thumb">
                          <img src="{{ asset('public/img/testimonial/3.jpg')}}" width="75" height="75" alt="Image-HasTech">
                        </div>
                        <div class="testi-info">
                          <h4 class="name">Amira Shepard</h4>
                          <span class="designation">Hiring Manager</span>
                        </div>
                      </div>
                      <div class="testi-content">
                        <p class="desc">It is a long established fact that reader will distracted the readable content page looking at its layout point using that has more-or-less normal distribution of letters opposed using content making.</p>
                        <div class="rating-box">
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                        </div>
                        <div class="testi-quote"><img src="{{ asset('public/img/icons/quote1.png')}}" alt="Image-HasTech"></div>
                      </div>
                    </div>
                  </div>
                  <!--== End Testimonial Item ==-->
                </div>
                <div class="swiper-slide">
                  <!--== Start Testimonial Item ==-->
                  <div class="testimonial-item testimonial-style2-item">
                    <div class="testi-inner-content">
                      <div class="testi-author">
                        <div class="testi-thumb">
                          <img src="{{ asset('public/img/testimonial/4.jpg')}}" width="75" height="75" alt="Image-HasTech">
                        </div>
                        <div class="testi-info">
                          <h4 class="name">Joshua George</h4>
                          <span class="designation">Hiring Manager</span>
                        </div>
                      </div>
                      <div class="testi-content">
                        <p class="desc">It is a long established fact that reader will distracted the readable content page looking at its layout point using that has more-or-less normal distribution of letters opposed using content making.</p>
                        <div class="rating-box">
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                        </div>
                        <div class="testi-quote"><img src="{{ asset('public/img/icons/quote1.png')}}" alt="Image-HasTech"></div>
                      </div>
                    </div>
                  </div>
                  <!--== End Testimonial Item ==-->
                </div>
                <div class="swiper-slide">
                  <!--== Start Testimonial Item ==-->
                  <div class="testimonial-item testimonial-style2-item">
                    <div class="testi-inner-content">
                      <div class="testi-author">
                        <div class="testi-thumb">
                          <img src="{{ asset('public/img/testimonial/5.jpg')}}" width="75" height="75" alt="Image-HasTech">
                        </div>
                        <div class="testi-info">
                          <h4 class="name">Rosie Patton</h4>
                          <span class="designation">Hiring Manager</span>
                        </div>
                      </div>
                      <div class="testi-content">
                        <p class="desc">It is a long established fact that reader will distracted the readable content page looking at its layout point using that has more-or-less normal distribution of letters opposed using content making.</p>
                        <div class="rating-box">
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                        </div>
                        <div class="testi-quote"><img src="{{ asset('public/img/icons/quote1.png')}}" alt="Image-HasTech"></div>
                      </div>
                    </div>
                  </div>
                  <!--== End Testimonial Item ==-->
                </div>
              </div>

              <!--== Add Swiper Pagination ==-->
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Testimonial Area Wrapper ==-->

    <!--== Start Brand Logo Area Wrapper ==-->
    <div class="brand-logo-area">
      <div class="container pt--0 pb--0" data-aos="fade-down">
        <div class="row">
          <div class="col-12">
            <div class="brand-logo-content" >
              <div class="swiper brand-logo-slider-container">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <!--== Start Brand Logo Item ==-->
                    <div class="brand-logo-item">
                      <img src="{{ asset('public/img/brand-logo/1.png')}}" alt="Image-HasTech">
                    </div>
                    <!--== End Brand Logo Item ==-->
                  </div>
                  <div class="swiper-slide">
                    <!--== Start Brand Logo Item ==-->
                    <div class="brand-logo-item">
                      <img src="{{ asset('public/img/brand-logo/2.png')}}" alt="Image-HasTech">
                    </div>
                    <!--== End Brand Logo Item ==-->
                  </div>
                  <div class="swiper-slide">
                    <!--== Start Brand Logo Item ==-->
                    <div class="brand-logo-item">
                      <img src="{{ asset('public/img/brand-logo/3.png')}}" alt="Image-HasTech">
                    </div>
                    <!--== End Brand Logo Item ==-->
                  </div>
                  <div class="swiper-slide">
                    <!--== Start Brand Logo Item ==-->
                    <div class="brand-logo-item">
                      <img src="{{ asset('public/img/brand-logo/4.png')}}" alt="Image-HasTech">
                    </div>
                    <!--== End Brand Logo Item ==-->
                  </div>
                  <div class="swiper-slide">
                    <!--== Start Brand Logo Item ==-->
                    <div class="brand-logo-item">
                      <img src="{{ asset('public/img/brand-logo/5.png')}}" alt="Image-HasTech">
                    </div>
                    <!--== End Brand Logo Item ==-->
                  </div>
                  <div class="swiper-slide">
                    <!--== Start Brand Logo Item ==-->
                    <div class="brand-logo-item">
                      <img src="{{ asset('public/img/brand-logo/6.png')}}" alt="Image-HasTech">
                    </div>
                    <!--== End Brand Logo Item ==-->
                  </div>
                  <div class="swiper-slide">
                    <!--== Start Brand Logo Item ==-->
                    <div class="brand-logo-item">
                      <img src="{{ asset('public/img/brand-logo/1.png')}}" alt="Image-HasTech">
                    </div>
                    <!--== End Brand Logo Item ==-->
                  </div>
                </div>
              </div>
              <!--== Add Swiper Arrows ==-->
              <div class="swiper-btn-wrap">
                <div class="brand-swiper-btn-prev">
                  <i class="icofont-long-arrow-left"></i>
                </div>
                <div class="brand-swiper-btn-next">
                  <i class="icofont-long-arrow-right"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Brand Logo Area Wrapper ==-->
  </main>
	
@endsection
