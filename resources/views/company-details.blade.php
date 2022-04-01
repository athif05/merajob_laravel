@extends("layouts.master")

@section("title")

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ env('MY_SITE_NAME') }}"/>
    <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive"/>
    <meta name="author" content="{{ env('MY_SITE_AUTHOR') }}"/>

    <title>Company Details | {{ env('MY_SITE_NAME') }}</title>
	
@endsection


@section("content")
  
  <main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="{{ asset('public/img/photos/sl1.jpg')}}">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title">Company Details</h2>
              <nav class="breadcrumb-area">
                <ul class="breadcrumb justify-content-center">
                  <li><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>Company Details</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Job Details Area Wrapper ==-->
    <section class="job-details-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="job-details-wrap">
              <div class="job-details-info">
                <div class="thumb">
                  <img src="{{ asset('public/img/companies/10.jpg')}}" width="130" height="130" alt="Image-HasTech">
                </div>
                <div class="content">
                  <h4 class="title">BVC eService Pvt Ltd</h4>
                  <h5 class="sub-title">Ecomm Special</h5>
                  <ul class="info-list">
                    <li><i class="icofont-location-pin"></i> New York, USA</li>
                    <li><i class="icofont-phone"></i> +88 456 796 457</li>
                  </ul>
                </div>
              </div>
              <!--<div class="job-details-price">
                <h4 class="title">$5000 <span>/monthly</span></h4>
                <button type="button" class="btn-theme">Apply Now</button>
              </div>-->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-7 col-xl-8">
            <div class="job-details-item">
              <div class="content">
                <h4 class="title">Description</h4>
                <p class="desc">It is a long established fact that a reader will be distracted the readable content of page when looking atits layout. The point of using is that has more-or-less normal a distribution of letters, as opposed to usin content publishing packages web page editors. It is a long established fact that a reader will be distracts by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that has look like readable publishing packages and web page editors.</p>
                <p class="desc">It is a long established fact that a reader will be distracted the readable content of a page when looking atits layout. The point of using is that has more-or-less normal a distribution of letters, as opposed to usin content publishing packages web page editors.</p>
              </div>
              <div class="content">
                <h4 class="title">Responsibilities</h4>
                <ul class="job-details-list">
                  <li><i class="icofont-check"></i> Developing custom themes (WordPress.org & ThemeForest Standards)</li>
                  <li><i class="icofont-check"></i> Creating reactive website designs</li>
                  <li><i class="icofont-check"></i> Working under strict deadlines</li>
                  <li><i class="icofont-check"></i> Develop page speed optimized themes</li>
                </ul>
              </div>
              
              <div class="content">
                <h4 class="title">Working Hours</h4>
                <ul class="job-details-list">
                  <li><i class="icofont-check"></i> 8:00 AM - 5:00 PM</li>
                  <li><i class="icofont-check"></i> Weekly: 5 days.</li>
                  <li><i class="icofont-check"></i> Weekend: Saturday, Sunday.</li>
                </ul>
              </div>
              <div class="content">
                <h4 class="title">Benefits</h4>
                <ul class="job-details-list">
                  <li><i class="icofont-check"></i> Work in a flat organization where your voice is always heard.</li>
                  <li><i class="icofont-check"></i> Provident fund.</li>
                  <li><i class="icofont-check"></i> Gratuity.</li>
                  <li><i class="icofont-check"></i> Medical Fund.</li>
                  <li><i class="icofont-check"></i> Having Corporate deals with multiple Hospitals.</li>
                  <li><i class="icofont-check"></i> Performance bonus.</li>
                  <li><i class="icofont-check"></i> Increment: Yearly.</li>
                  <li><i class="icofont-check"></i> Festival Bonus: 2 (Yearly)</li>
                  <li><i class="icofont-check"></i> Lunch Facilities: Full Subsidize.</li>
                  <li><i class="icofont-check"></i> Unlimited Tea, Coffee & Snacks.</li>
                  <li><i class="icofont-check"></i> Annual tour.</li>
                  <li><i class="icofont-check"></i> Team Outing.</li>
                  <li><i class="icofont-check"></i> Marriage Bonus and Marriage Leave.</li>
                  <li><i class="icofont-check"></i> Paternity and Maternity Leave.</li>
                  <li><i class="icofont-check"></i> Yearly Family Tour.</li>
                  <li><i class="icofont-check"></i> Knowledge Sharing Session.</li>
                  <li><i class="icofont-check"></i> Leave Encashment Facilities.</li>
                  <li><i class="icofont-check"></i> Work with a vibrant team and amazing products.</li>
                  <li><i class="icofont-check"></i> Table Tennis(Ping Pong) :table_tennis_paddle_and_ball:</li>
                  <li><i class="icofont-check"></i> Training and learning materials to improve skills.</li>
                  <li><i class="icofont-check"></i> Last but not the least, WorldClass Work Environment.</li>
                </ul>
              </div>
              
            </div>
          </div>
          <div class="col-lg-5 col-xl-4">
            <div class="job-sidebar">
              <div class="widget-item">
                <div class="widget-title">
                  <h3 class="title">Summery</h3>
                </div>
                <div class="summery-info">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="table-name">Company Type</td>
                        <td class="dotted">:</td>
                        <td data-text-color="#03a84e">Full-time</td>
                      </tr>
                      <tr>
                        <td class="table-name">Category</td>
                        <td class="dotted">:</td>
                        <td>Development</td>
                      </tr>
                      <tr>
                        <td class="table-name">Posted</td>
                        <td class="dotted">:</td>
                        <td>20 June, 2021</td>
                      </tr>
                      <tr>
                        <td class="table-name">Category</td>
                        <td class="dotted">:</td>
                        <td>Development</td>
                      </tr>
                      <tr>
                        <td class="table-name">Salary</td>
                        <td class="dotted">:</td>
                        <td>$5000 / Monthly</td>
                      </tr>
                      <tr>
                        <td class="table-name">Experience</td>
                        <td class="dotted">:</td>
                        <td>05 Years</td>
                      </tr>
                      <tr>
                        <td class="table-name">Gender</td>
                        <td class="dotted">:</td>
                        <td>Male or Female</td>
                      </tr>
                      <tr>
                        <td class="table-name">Qualification</td>
                        <td class="dotted">:</td>
                        <td>BSC, MSC</td>
                      </tr>
                      <tr>
                        <td class="table-name">Level</td>
                        <td class="dotted">:</td>
                        <td>Senior</td>
                      </tr>
                      <tr>
                        <td class="table-name">Applied</td>
                        <td class="dotted">:</td>
                        <td>26 Applicant</td>
                      </tr>
                      <tr>
                        <td class="table-name">Application End</td>
                        <td class="dotted">:</td>
                        <td data-text-color="#ff6000">20 November, 2021</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="widget-item">
                <div class="widget-title">
                  <h3 class="title">Share With</h3>
                </div>
                <div class="social-icons">
                  <a href="https://www.facebook.com/" target="_blank" rel="noopener"><i class="icofont-facebook"></i></a>
                  <a href="https://twitter.com/" target="_blank" rel="noopener"><i class="icofont-twitter"></i></a>
                  <a href="https://www.skype.com/" target="_blank" rel="noopener"><i class="icofont-skype"></i></a>
                  <a href="https://www.pinterest.com/" target="_blank" rel="noopener"><i class="icofont-pinterest"></i></a>
                  <a href="https://dribbble.com/" target="_blank" rel="noopener"><i class="icofont-dribbble"></i></a>
                </div>
              </div>
              <div class="widget-item widget-tag">
                <div class="widget-title">
                  <h3 class="title">Tags:</h3>
                </div>
                <div class="widget-tag-list">
                  <a href="{{ url('/job')}}">Cleaning</a>
                  <a href="{{ url('/job')}}">Cleaning Agency</a><br>
                  <a href="{{ url('/job')}}">Business</a>
                  <a href="{{ url('/job')}}">Cleaning</a>
                  <a href="{{ url('/job')}}">Business</a>
                  <a href="{{ url('/job')}}">Cleaning</a>
                  <a href="{{ url('/job')}}">Cleaning Agency</a>
                  <a href="{{ url('/job')}}">Business</a>
                  <a href="{{ url('/job')}}">Cleaning Agency</a>
                  <a href="{{ url('/job')}}">Cleaning</a>
                  <a href="{{ url('/job')}}">Business</a>
                  <a href="{{ url('/job')}}">Business</a>
                  <a href="{{ url('/job')}}">Cleaning Agency</a>
                  <a href="{{ url('/job')}}">Business</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Job Details Area Wrapper ==-->
  </main>

@endsection
