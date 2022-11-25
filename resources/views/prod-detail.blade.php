<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seaplace Hotel - Blog Single</title>

    <link rel="icon" href="{{ asset('img/favicon.png" type="image/png') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/magnefic-popup/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
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

                            <li class="nav-item"><a class="nav-link" href="/contact">{{ __('messages.Contact') }}</a>
                            </li>
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
    <section class="blog-banner-area" id="blog">
        <div class="h-100 container">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>{{ $offre->name }}</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->


    <!--================Blog Area =================-->
    <section class="blog_area single-post-area py-80px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src="{{ asset('img/' . $offre->image) }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="blog_info text-right">
                                <div class="post_tag">
                                    <a href="#">Food,</a>
                                    <a class="active" href="#">Technology,</a>
                                    <a href="#">Politics,</a>
                                    <a href="#">Lifestyle</a>
                                </div>
                                <ul class="blog_meta list">
                                    <li>
                                        <a href="#">Mark wiens
                                            <i class="lnr lnr-user"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            {{ \Carbon\Carbon::parse($offre->created_at)->format('d/m/Y') }}

                                            <i class="lnr lnr-calendar-full"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">1.2M Views
                                            <i class="lnr lnr-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">{{ $offre->commentaires->count() }} Comments
                                            <i class="lnr lnr-bubble"></i>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="social-links">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-github"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-behance"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 blog_details">
                            <h2>{{ $offre->name }}</h2>
                            <p class="excert">
                                {{ $offre->description }}

                            </p>

                        </div>
                        <div class="col-lg-12">

                            <h5>Tour Includes</h5>

                            <div class="quotes">
                                <ul>
                                    <li>

                                        {{ $offre->includ }}
                                    </li>
                                </ul>
                            </div>
                            <h5>Tour Excludes</h5>
                            <div class="quotes">
                                {{ $offre->not_includ }}
                            </div>

                        </div>
                    </div>



                    <div class="comments-area">


                        <div class="comment-list left-padding">
                            <div class="single-comment justify-content-between d-flex">


                                <div class="comment-list">
                                    {{-- kibhal haka aywli dakchi, fnadark mzian haka ? nn machi haka 
                                        kif makant f lwal, wa bach nyen le nombre des comments
                                        Khass nzid dik transform, bghiti nrdha kikant flwl
                                        anrdha mais mahanbyenoch le nombre de commentaires.
                                        ach awa had chinwiya  --}}

                                    {{-- lach 7ala had le project ?
                                        kant 5dama en parallele
                                        KAOUTAR, sm3i l hdrti walaw mra whda
                                        Wach nti 9ada tkhdmi 3la 2 projects f d9a ? hhhhh
                                        nnnnn 3afak nslam hi 3la baba o hani jaya 2min 3afaak, ok
                                        reeee zakaria kantsnat lik
                                        Hyedi had le project, matqisihch, khdmi dakchi li glt lik
                                         ok  --}}
                                    @forelse ($commentaires as $commentaire)
                                        <div class="single-comment justify-content-between d-flex">

                                            <div class="user justify-content-between d-flex">

                                                <div class="thumb">
                                                    <img src="img/blog/c4.jpg" alt="">

                                                    @if ($commentaire->comments_count)
                                                        {{ $commentaire->comments_count }}comments
                                                    @else
                                                        <p> No comment yet </p>
                                                    @endif

                                                </div>
                                            <div>
                                                 {{ $commentaire->created_at->diffInHours() }}h
                                             @if ($commentaire->created_at->diffInHours() < 1)
                                             <span class="badge badge-success">New </span>

                                             @else
                                             <span class="badge badge-dark">Old </span>

                                             @endif
                                            </div>

                                                <div class="desc">

                                                    <p class="comment">
                                                        {{ $commentaire->commentaire }}
                                                    </p>

                                                    <p class="date">
                                                   
                                                        updated {{ $commentaire->updated_at->diffForHumans() }}
                                                        Added {{ $commentaire->created_at->diffForHumans() }},by
                                                        {{ $commentaire->user->name }}
                                                    </p>
                                                </div>

                                            </div>
                                            @can('update', $commentaire)
                                                <form action="{{ route('update.comment', $commentaire->id) }}"
                                                    method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <div class="form-group">
                                                        <textarea class="form-control mb-10" rows="5" id="commentaire" name="commentaire" placeholder="Messege"
                                                            value="{{ old('commentaire') }}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'">   
                                                        </textarea>

                                                    </div>
                                                    <button type="submit" class="btn">update</button>
                                                </form>
                                            @endcan
                                            @cannot('delete', $commentaire)
                                                <span class="badge badge-danger">You can't delete this post </span>
                                            @endcannot
                                            @can('delete', $commentaire)
                                                <form action="{{ route('comment.destroy', $commentaire->id) }}"
                                                    method="post">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn">delete</button>
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            @endcan
                                        </div>
                                       @empty
                                       <p class="bg-danger text-white p-1">No comment.</p>

                                    @endforelse

                                </div>

                            </div>
                        </div>


                    </div>

                    <div class="comment-form">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                       {{-- @if(Auth::user()->id == $commentaires->user_id)--}} 
                       {{-- @if (auth()->check()AND auth()->user()->id)--}}
                        {{--@if (!auth()->guest())--}} 

                        @if (auth()->check())
                        <form method="POST" action="{{ route('prodDetailComm', $offre->id) }}">

                            @csrf

                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">


                                    <input type="text" class="@error('objet') is-invalid @enderror form-control"
                                        value="{{ old('objet') }}" id="objet" name="objet"
                                        placeholder="Enter objet" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter objet'">
                                    @error('objet')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email') }}" placeholder="Enter email address"
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email address'">
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" id="commentaire" name="commentaire" placeholder="Messege"
                                    value="{{ old('commentaire') }}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'">   
                                </textarea>

                            </div>
                            <button type="submit" value="submit" class="button-contact">Post Comment</button>

                        </form>
                        @else
                        <p class="bg-danger text-white p-1">Veulliez etre connecté pour voir la formulaire de commentaire Merci..</p>

                        @endif
                    </div>
                </div>




                <div class="col-lg-4">
                    <div class="blog_right_sidebar">




                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Post Catgories</h4>
                            @foreach ($categories as $cat)
                                <ul class="list cat-list">
                                    <li>

                                        <a href="{{ url('categories-product/' . $cat->slug) }}"
                                            class="d-flex justify-content-between">
                                            <p>{{ $cat->name }}</p>
                                            <p>{{ $cat->products->count() }}</p>
                                        </a>
                                    </li>

                                </ul>
                            @endforeach

                            <div class="br"></div>
                        </aside>

                        <aside class="single-sidebar-widget tag_cloud_widget">
                            <h4 class="widget_title">Tag Clouds</h4>
                            <ul class="list">
                                <li>
                                    <a href="#">Technology</a>
                                </li>
                                <li>
                                    <a href="#">Fashion</a>
                                </li>
                                <li>
                                    <a href="#">Architecture</a>
                                </li>
                                <li>
                                    <a href="#">Fashion</a>
                                </li>
                                <li>
                                    <a href="#">Food</a>
                                </li>
                                <li>
                                    <a href="#">Technology</a>
                                </li>
                                <li>
                                    <a href="#">Lifestyle</a>
                                </li>
                                <li>
                                    <a href="#">Art</a>
                                </li>
                                <li>
                                    <a href="#">Adventure</a>
                                </li>
                                <li>
                                    <a href="#">Food</a>
                                </li>
                                <li>
                                    <a href="#">Lifestyle</a>
                                </li>
                                <li>
                                    <a href="#">Adventure</a>
                                </li>
                            </ul>
                        </aside>
                    </div>
                </div>
                </a>
            </div>
    </section>
    <!--================Blog Area =================-->



    <!-- ================ start footer Area ================= -->
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-sm-6 mb-xl-0 single-footer-widget mb-4">
                    <h4>Top Products</h4>
                    <ul>
                        <li><a href="#">Managed Website</a></li>
                        <li><a href="#">Manage Reputation</a></li>
                        <li><a href="#">Power Tools</a></li>
                        <li><a href="#">Marketing Service</a></li>
                    </ul>
                </div>
                <div class="col-xl-2 col-sm-6 mb-xl-0 single-footer-widget mb-4">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Brand Assets</a></li>
                        <li><a href="#">Investor Relations</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-xl-2 col-sm-6 mb-xl-0 single-footer-widget mb-4">
                    <h4>Features</h4>
                    <ul>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Brand Assets</a></li>
                        <li><a href="#">Investor Relations</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-xl-2 col-sm-6 mb-xl-0 single-footer-widget mb-4">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="#">Guides</a></li>
                        <li><a href="#">Research</a></li>
                        <li><a href="#">Experts</a></li>
                        <li><a href="#">Agencies</a></li>
                    </ul>
                </div>
                <div class="col-xl-4 col-md-8 mb-xl-0 single-footer-widget mb-4">
                    <h4>Newsletter</h4>
                    <p>You can trust us. we only send promo offers,</p>
                    <div class="form-wrap" id="mc_embed_signup">
                        <form target="_blank"
                            action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                            method="get" class="form-inline">
                            <input class="form-control" name="EMAIL" placeholder="Your Email Address"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
                                required="" type="email">
                            <button class="click-btn btn btn-default text-uppercase">subscribe</button>
                            <div style="position: absolute; left: -5000px;">
                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                    type="text">
                            </div>

                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer-bottom row align-items-center text-lg-left text-center">
                <p class="footer-text col-lg-8 col-md-12 m-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="fa fa-heart"
                        aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-md-12 text-lg-right footer-social text-center">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-dribbble"></i></a>
                    <a href="#"><i class="fab fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- ================ End footer Area ================= -->



    <script src="{{ asset('vendors/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/magnefic-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('vendors/easing.min.js') }}"></script>
    <script src="{{ asset('vendors/superfish.min.js') }}"></script>
    <script src="{{ asset('vendors/nice-select/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('vendors/mail-script.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
