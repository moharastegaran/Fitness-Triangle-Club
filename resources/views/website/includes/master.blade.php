<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title','Fitness Triangle Club')</title>
    <!-- Stylesheets -->
    <link href="{{ asset('blackfit/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('blackfit/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('blackfit/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('style/font.css') }}" rel="stylesheet">
    <link href="{{ asset('blackfit/css/rtl-persian.css') }}" rel="stylesheet">
    <link href="{{ asset('blackfit/css/font-awesome.css') }}" rel="stylesheet">
    @yield('style')


    <link rel="shortcut icon" href="{{ asset('cork/assets/img/logo1.png') }}" type="image/*">
    <link rel="icon" href="{{ asset('cork/assets/img/logo1.png') }}" type="image/*">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

</head>

<body class="hidden-bar-wrapper">

<div class="page-wrapper">

    <!-- Preloder -->
    <div id="preloder" class="preloader">
        <div class="loader"></div>
    </div>
    <!-- Εnd Preloader -->

    <!-- Main Header-->
    <header class="main-header header-style-one">

        <!--Header-Upper-->
        <div class="header-upper">
            <div class="outer-container">
                <div class="inner-container clearfix d-flex d-md-block justify-content-between align-items-center">

                    <!-- Logo Box -->
                    <div class="logo-box">
                        <div class="logo"><a href="{{ route('website.index') }}"><img
                                        src="{{ asset('cork/assets/img/logo1.png') }}" alt=""
                                        title="" width="125"></a></div>
                    </div>

                    <!-- Logo -->
                    <div class="mobile-logo pull-left">
                        <a href="{{ route('website.index') }}" title=""><img
                                    src="{{ asset('cork/assets/img/logo1.png') }}" alt=""
                                    title="" width="75"></a>
                    </div>

                    <!-- Header Social Box -->
                    {{--<div class="header-social-box clearfix">--}}
                    {{--<a href="#" class="fa fa-facebook"></a>--}}
                    {{--<a href="#" class="fa fa-twitter"></a>--}}
                    {{--<a href="#" class="fa fa-instagram"></a>--}}
                    {{--<a href="#" class="fa fa-linkedin"></a>--}}
                    {{--</div>--}}

                    <div class="outer-box clearfix">

                        <!-- Hidden Nav Toggler -->
                        <div class="nav-toggler">
                            <div class="nav-btn">
                                <button class="hidden-bar-opener"><span class="icon"><img
                                                src="{{ asset('blackfit/images/icons/burger.svg') }}" alt=""></span>
                                </button>
                            </div>
                        </div>
                        <!-- / Hidden Nav Toggler -->

                    </div>

                    <div class="nav-outer clearfix">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><span class="icon"><img
                                        src="{{ asset('blackfit/images/icons/burger.svg') }}" alt=""></span></div>
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md">
                            <div class="navbar-header">
                                <!-- Toggle Button -->
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix d-flex flex-wrap flex-md-row-reverse flex-column">
                                    <li><a href="{{ route('website.index') }}">خانه</a></li>
                                    @if(!auth()->check())
                                        <li><a href="{{ route('website.users.join') }}">ثبت‌نام</a></li>
                                        <li><a href="{{ url('login') }}">ورود</a></li>
                                    @else
                                        <li>
                                            <a href="{{ route(auth()->user()->isAdmin() ? 'panel.dashboard' : 'panel.users.show',auth()->user())  }}">پنل
                                                کاربری</a></li>
                                        {{--<li><a href="{{ route('website.users.logout') }}">خروج</a></li>--}}
                                    @endif
                                    <li><a href="{{ route('website.articles') }}">مقالات</a></li>
                                    <li><a href="{{ route('website.videos') }}">کلیپ‌ها</a></li>
                                </ul>
                            </div>
                        </nav>

                    </div>

                </div>

            </div>
        </div>
        <!--End Header Upper-->

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container clearfix d-flex flex-row justify-content-between">
                <!--Logo-->
                <div class="logo pull-left">
                    <a href="{{ route('website.index') }}" title=""><img src="{{ asset('cork/assets/img/logo2.png') }}"
                                                                         alt=""
                                                                         width="145"></a>
                </div>
                <!--Right Col-->
                <div class="pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav><!-- Main Menu End-->

                </div>
            </div>
        </div><!-- End Sticky Menu -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-multiply"></span></div>

            <nav class="menu-box">
                <div class="nav-logo"><a href="{{ asset('website.index') }}"><img
                                src="{{ asset('cork/assets/img/logo1.png') }}"
                                alt="" title="" width="75"></a></div>
                <div class="menu-outer">
                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            </nav>

        </div>
        <!-- End Mobile Menu -->

    </header>
    <!-- End Main Header -->

    <!-- FullScreen Menu -->
    <div class="fullscreen-menu">
        <!--Close Btn-->
        <div class="close-menu"><span style="font-size: 50px !important">&times;</span></div>

        <div class="menu-outer-container">
            <div class="menu-box">
                <nav class="full-menu">
                    <ul class="navigation">
                        <li><a href="{{ route('website.index') }}">خانه</a></li>
                        @if(!auth()->check())
                            <li><a href="{{ route('website.users.join') }}">ثبت‌نام</a></li>
                            <li><a href="{{ url('login') }}">ورود</a></li>
                        @else
                            <li>
                                <a href="{{ route(auth()->user()->isAdmin() ? 'panel.dashboard' : 'panel.users.show',auth()->user())  }}">پنل
                                    کاربری</a></li>
                            {{--                            <li><a href="{{ route('website.users.logout') }}">خروج</a></li>--}}
                        @endif
                        <li><a href="{{ route('website.articles') }}">مقالات</a></li>
                        <li><a href="{{ route('website.videos') }}">کلیپ‌ها</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- End FullScreen Menu -->

@yield('content')

<!-- Main Footer -->
    <footer class="main-footer"
            style="background-image:url({{ asset('images/style3_1.png') }});background-size: contain;background-repeat: no-repeat;background-position-x: 800px;">
        <div class="auto-container">
            <!-- Widgets Section -->
            <div class="widgets-section pb-md-3">
                <div class="row clearfix">
                    <!-- Big Column -->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">

                            <!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget logo-widget">
                                    <div class="logo">
                                        <a href="{{ route('website.index') }}"><img
                                                    src="{{ asset('cork/assets/img/logo2.png') }}"
                                                    width="100" alt=""></a>
                                    </div>
                                    <!-- Footer Mobile Logo -->
                                    <div class="footer-mobile-logo">
                                        <a href="{{ route('website.index') }}"><img
                                                    src="{{ asset('cork/assets/img/logo2.png') }}" alt=""
                                                    title=""></a>
                                    </div>
                                    <ul class="info-list">
                                        {{--<li><span>Address:</span>4578 Marmora Road, Glasgow</li>--}}
                                        <li><span>شماره تماس:</span>
                                            <a href="tel:1-123-456-78-89">+98 912 1212 477</a><br>
                                            {{--<a href="tel:1-123-456-78-80">+1-123-456-78-80</a>--}}
                                        </li>
                                        {{--<li><span>Working Hours:</span>Monday-Sunday: 07:00 - 22:00</li>--}}
                                        <li><span>ایمیل:</span><a href="mailto:moharastegaran@gmail.com">moharastegaran@gmail.com</a>
                                        </li>
                                        <li class="social-links"><span>ما را در فضای مجازی دنبال کنید</span>
                                            <a href="#" class="fab fa-facebook"></a>
                                            <a href="#" class="fab fa-twitter"></a>
                                            <a href="#" class="fab fa-instagram"></a>
                                            <a href="#" class="fab fa-linkedin"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget news-widget">
                                    <h6>آخرین مقالات</h6>
                                    @php $latest_articles = \App\Blog::latest()->limit(3)->get(); @endphp
                                    <div class="widget-content">
                                        @forelse($latest_articles as $article)
                                            <div class="post">
                                                <h5>
                                                    <a href="{{ route('website.article',$article->id) }}">{{ $article->title }}</a>
                                                </h5>
                                                <span class="date">{{ toFaDigits(\Morilog\Jalali\Jalalian::forge($article->created_at)->ago()) }}</span>
                                                <div class="thumb">
                                                    <a href="{{ route('website.article',$article->id) }}">
                                                        <img src="{{ asset(env('STORAGE_DIR_PATH').env('ARTICLE_DIR_PATH').$article->attachment->filename) }}"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        @empty
                                            هنوز مقاله‌ای به ثبت نرسیده است.
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Big Column -->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">

                            <!-- Footer Column -->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget gallery-widget">
                                    <h6>شبکه‎‌های اجتماعی</h6>
                                    <div class="widget-content">

                                        <div class="images-outer text-center">
                                            <p><a href="#"><i class="fab fa-telegram-plane fa-2x text-light"></i></a>
                                            </p>
                                            <p><a href="#"><i class="fab fa-instagram fa-2x text-light"></i></a></p>
                                            <p><a href="#"><i class="fab fa-twitter fa-2x text-light"></i></a></p>
                                            <p><a href="#"><i class="fab fa-facebook-f fa-2x text-light"></i></a></p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget newsletter-widget">
                                    <h6>درباره ما</h6>
                                    <div class="text">
                                        جسمی بسازید که باعث افتخار شما شود
                                        <br>
                                        <span style="text-decoration: line-through">من خسته‌ام. من تنهام. خیلی سرده. خیلی گرمه. خیلی دیره.</span>
                                         همه اینارو بنداز دور و شروع کن.
                                    </div>
                                    <!-- Newsletter Form -->
                                    {{--<div class="newsletter-form">--}}
                                    {{--<form method="post" action="contact.html">--}}
                                    {{--<div class="form-group">--}}
                                    {{--<input type="email" name="email" value="" placeholder="Email"--}}
                                    {{--required="">--}}
                                    {{--<button type="submit" class="theme-btn submit-btn"><span><img--}}
                                    {{--src="{{ asset('blackfit/images/icons/message-icon.png') }}"--}}
                                    {{--alt=""></span></button>--}}
                                    {{--</div>--}}
                                    {{--</form>--}}
                                    {{--</div>--}}

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{--<div class="row text-right mb-0">--}}
                    {{--<div style="width: 70px;margin-left: auto">--}}
                        {{--<script src="https://www.zarinpal.com/webservice/TrustCode" type="text/javascript"></script>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="copyright">باشگاه مثلث فیتنس</div>
            </div>

        </div>
    </footer>

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

<!-- Purchase Popup -->
{{--<div id="purchase-popup" class="purchase-popup">--}}
{{--<div class="close-search theme-btn"><span>Close</span></div>--}}
{{--<div class="popup-inner">--}}
{{--<div class="overlay-layer"></div>--}}

{{--<div class="purchase-form">--}}
{{--<div class="sec-title centered">--}}
{{--<h2><span>GET FREE</span> CONSULTATION</h2>--}}
{{--<div class="text">If you need of a Personal Trainer, Fitness Instructor advice, or a healthy <br> living--}}
{{--product review, please feel free to contact us--}}
{{--</div>--}}
{{--</div>--}}

{{--<!-- Default Form -->--}}
{{--<form method="post" action="contact.html">--}}
{{--<div class="row clearfix">--}}

{{--<div class="col-lg-6 col-md-6 col-sm-12 form-group">--}}
{{--<input type="text" name="name" placeholder="Name" required="">--}}
{{--</div>--}}

{{--<div class="col-lg-6 col-md-6 col-sm-12 form-group">--}}
{{--<input type="email" name="email" placeholder="Email" required="">--}}
{{--</div>--}}

{{--<div class="col-lg-12 col-md-12 col-sm-12 form-group">--}}
{{--<input type="text" name="subject" placeholder="Subject" required="">--}}
{{--</div>--}}

{{--<div class="col-lg-12 col-md-12 col-sm-12 form-group">--}}
{{--<textarea class="darma" name="message" placeholder="Your Message"></textarea>--}}
{{--</div>--}}

{{--<div class="form-group text-center col-lg-12 col-md-12 col-sm-12">--}}
{{--<span class="data">* Personal data will be encrypted</span>--}}
{{--<button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="txt">SEND MESSAGE</span>--}}
{{--</button>--}}
{{--</div>--}}

{{--</div>--}}
{{--</form>--}}


{{--</div>--}}

{{--</div>--}}
{{--</div>--}}

<script src="{{ asset('blackfit/js/jquery.js') }}"></script>
<script src="{{ asset('blackfit/js/popper.min.js') }}"></script>
<script src="{{ asset('blackfit/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('blackfit/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('blackfit/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('blackfit/js/appear.js') }}"></script>
<script src="{{ asset('blackfit/js/owl.js') }}"></script>
<script src="{{ asset('blackfit/js/wow.js') }}"></script>
<script src="{{ asset('blackfit/js/jquery-ui.js') }}"></script>
<script src="{{ asset('blackfit/js/script.js') }}"></script>
@yield('script')

</body>
</html>
