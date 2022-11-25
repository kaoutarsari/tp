<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Seaplace Hotel - Blog</title>
	<link rel="icon" href="{{asset('img/favicon.png" type="image/png')}}">
  <link rel="stylesheet" href="{{asset('vendors/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('vendors/themify-icons/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('vendors/linericon/style.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/magnefic-popup/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/nice-select/nice-select.css')}}">	

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css" />
<header class="header_area">
    <div class="header-top">
        <div class="container">
            <div class="d-flex align-items-center">
                <div id="logo">
                    <a href="index.html"><img src="img/Logo.png" alt="" title="" /></a>
                </div>
                <div class="d-none d-md-block d-md-flex ml-auto">
                    <div class="media header-top-info">
                        <span class="header-top-info__icon"><i class="fas fa-phone-volume"></i></span>
                        <div class="media-body">
                            <p>{{ __('messages.Have any question') }}?</p>
                            <p>{{ __('messages.Free') }}: <a href="tel:+12 365 5233">+12 365 5233</a></p>
                        </div>
                    </div>
                    <div class="media header-top-info">
                        <span class="header-top-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <p>{{ __('messages.Have any question') }}?</p>
                            <p>{{ __('messages.Free') }}: <a href="tel:+12 365 5233">+12 365 5233</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <!-- <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav">
                        <li class="nav-item active"><a class="nav-link"
                                href="{{ url('/') }}">{{ __('messages.Home') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>

                        <li class="nav-item"><a class="nav-link" href="/blogs">BLOG</a></li>

                        <li class="nav-item"><a class="nav-link" href="/contact">{{ __('messages.Contact') }}</a></li>
                    </ul>
                </div>



                <ul style="list-style: none;">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span
                                class="flag-icon flag-icon-{{ Config::get('languages')[App::getLocale()]['flag-icon'] }}"></span>
                            {{ Config::get('languages')[App::getLocale()]['display'] }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                                        <span class="flag-icon flag-icon-{{ $language['flag-icon'] }}">
                                        </span> {{ $language['display'] }}</a>
                                @endif
                            @endforeach

                        </div>
                    </li>
                </ul>


                <ul class="social-icons ml-auto">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a href="#"><i class="fas fa-rss"></i></a></li>
                </ul>
            </div>
        </nav>


    </div>
</header>

  
  <!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="blog">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Our Blog</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->


  <!--================Blog Categorie Area =================-->
 
	  
  <section class="blog_categorie_area">

      <div class="container">

          <div class="row">
			@foreach ($blogs as $blog)

              <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
                  <div class="categories_post">
                      <img class="card-img rounded-0" src="{{asset('img/'.$blog->image)}}" alt="post">
                      <div class="categories_details">
                          <div class="categories_text">
                              <a href="blog-single.html">
                                  <h5>{{$blog->name}}</h5>
                              </a>
                              <div class="border_line"></div>
                              <p>{{ $blog->created_at->diffForHumans( ) }}</p>
							  <a class="card-news__link" href="{{url('detailBlog/' .$blog->slug)}}">Read More <i class="ti-arrow-right"></i></a>

                          </div>
                      </div>
                      <a href="{{action('pdf',$blog->id)}}" class="btn btn-warning">
                        <i class="fas fa-file-pdf"></i>
                        telecharger pdf
                        </a>

                  </div>
              </div>
			  @endforeach

          </div>

      </div>
 

  </section>
  <nav class="blog-pagination justify-content-center d-flex">
    <ul class="pagination">
        <li class="page-item">
            <a href="#" class="page-link" aria-label="Previous">
                <span aria-hidden="true">
                    <span class="lnr lnr-chevron-left"></span>
                </span>
            </a>
        </li>

        <li class="page-item active">
            <a href="#" class="page-link">02</a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link">03</a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link">04</a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link">09</a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link" aria-label="Next">
                <span aria-hidden="true">
                    <span class="lnr lnr-chevron-right"></span>
                </span>
            </a>
        </li>
    </ul>
</nav>

  <!--================Blog Area =================-->
 
  <!--================Blog Area =================-->


  <!-- ================ start footer Area ================= -->
  <footer class="footer-area section-gap">
		<div class="container">
			<div class="row">
				<div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
					<h4>Top Products</h4>
					<ul>
						<li><a href="#">Managed Website</a></li>
						<li><a href="#">Manage Reputation</a></li>
						<li><a href="#">Power Tools</a></li>
						<li><a href="#">Marketing Service</a></li>
					</ul>
				</div>
				<div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
					<h4>Quick Links</h4>
					<ul>
						<li><a href="#">Jobs</a></li>
						<li><a href="#">Brand Assets</a></li>
						<li><a href="#">Investor Relations</a></li>
						<li><a href="#">Terms of Service</a></li>
					</ul>
				</div>
				<div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
					<h4>Features</h4>
					<ul>
						<li><a href="#">Jobs</a></li>
						<li><a href="#">Brand Assets</a></li>
						<li><a href="#">Investor Relations</a></li>
						<li><a href="#">Terms of Service</a></li>
					</ul>
				</div>
				<div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
					<h4>Resources</h4>
					<ul>
						<li><a href="#">Guides</a></li>
						<li><a href="#">Research</a></li>
						<li><a href="#">Experts</a></li>
						<li><a href="#">Agencies</a></li>
					</ul>
				</div>
				<div class="col-xl-4 col-md-8 mb-4 mb-xl-0 single-footer-widget">
					<h4>Newsletter</h4>
					<p>You can trust us. we only send promo offers,</p>
					<div class="form-wrap" id="mc_embed_signup">
						<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
						 method="get" class="form-inline">
							<input class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
							 required="" type="email">
							<button class="click-btn btn btn-default text-uppercase">subscribe</button>
							<div style="position: absolute; left: -5000px;">
								<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
							</div>

							<div class="info"></div>
						</form>
					</div>
				</div>
			</div>
			<div class="footer-bottom row align-items-center text-center text-lg-left">
				<p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				<div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
					<a href="#"><i class="fab fa-facebook-f"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
					<a href="#"><i class="fab fa-dribbble"></i></a>
					<a href="#"><i class="fab fa-behance"></i></a>
				</div>
			</div>
		</div>
	</footer>
  <!-- ================ End footer Area ================= -->



  <script src="{{asset('vendors/jquery/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendors/magnefic-popup/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('vendors/easing.min.js')}}"></script>
  <script src="{{asset('vendors/superfish.min.js')}}"></script>
  <script src="{{asset('vendors/nice-select/jquery.nice-select.min.js')}}"></script>
  <script src="{{asset('vendors/jquery.ajaxchimp.min.js')}}"></script>
  <script src="{{asset('vendors/mail-script.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
</body>
</html>