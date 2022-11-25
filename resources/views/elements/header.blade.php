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
