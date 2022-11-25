

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Seaplace Hotel - Contact</title>
	<link rel="icon" href="img/favicon.png" type="image/png">
  <link rel="stylesheet" href="{{asset('vendors/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('vendors/themify-icons/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('vendors/linericon/style.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/magnefic-popup/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
  alpha/css/bootstrap.css" rel="stylesheet">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" 
  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body>
	<!-- ================ header section start ================= -->	
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
  
	<!-- ================ header section end ================= -->	
  
  <!-- ================ start banner area ================= -->	
	<section class="contact-banner-area" id="contact">
		<div class="container h-100">
			<div class="contact-banner">
				<div class="text-center">
					<h1>Contact Us</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->


	<section class="section-margin">
    <div class="container">
      <!-- google map start -->
      <div class="d-none d-sm-block mb-5 pb-4">
        <div id="map" style="height: 420px;"></div>
        <script>
          function initMap() {
            var uluru = {lat: -25.363, lng: 131.044};
            var grayStyles = [
              {
                featureType: "all",
                stylers: [
                  { saturation: -90 },
                  { lightness: 50 }
                ]
              },
              {elementType: 'labels.text.fill', stylers: [{color: '#A3A3A3'}]}
            ];
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: -31.197, lng: 150.744},
              zoom: 9,
              styles: grayStyles,
              scrollwheel:  false
            });
          }
          
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>
        
      </div>
      <!-- google map end -->


      <div class="row">
        <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>California United States</h3>
              <p>Santa monica bullevard</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-headphone"></i></span>
            <div class="media-body">
              <h3><a href="tel:454545654">00 (440) 9865 562</a></h3>
              <p>Mon to Fri 9am to 6pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3><a href="mailto:support@colorlib.com">support@colorlib.com</a></h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
      <div>

      
   </div>
   {{--
   @if (Session::has('message'))
   <p class="alert alert-info">{{ Session::get('message') }}</p>
   @endif
 </div>
  @if(\Session::get('status') == 200)
   <span class="alert alert-success">
     Success!
   </span>
  @endif
@if(\Session::get('status') == 500)
<span class="alert alert-warning">
   {{\Session::get('message')}}
</span>
 @endif
 --}}
        <div class="col-md-8 col-lg-9">
          
          <form method="POST" class="row contact_form" action="{{route('contact')}}"  novalidate="novalidate">
              @csrf

              <div class="col-md-6">
                  <div class="form-group">
                 
          
                      <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{old('name')}}" id="name" name="name" placeholder="Enter your name">
                      {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}

                  </div>
                  <div class="form-group">
                      <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{old('email')}}" id="email" name="email" placeholder="Enter email address">
                      {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}

                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" value="{{old('subject')}}" id="subject" name="subject" placeholder="Enter Subject">
                      {!! $errors->first('subject', '<div class="invalid-feedback">:message</div>') !!}

                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <textarea class="form-control different-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" value="{{old('comments')}}" name="comments" id="comments" rows="5" placeholder="Enter Message"></textarea>
                      {!! $errors->first('subject', '<div class="invalid-feedback">:message</div>') !!}

                  </div>
              </div>
              <div class="col-md-12 text-right">
                  <button type="submit" value="submit" class="button-contact"><span>Send Message</span></button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </section>


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
  <script src="{{asset('vendors/jquery.form.js')}}"></script>
  <script src="{{asset('vendors/jquery.validate.min.js')}}"></script>
  <script src="{{asset('vendors/contact.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>

  


</body>
</html>
