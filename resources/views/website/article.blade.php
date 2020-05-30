@extends('website.includes.master')

@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{ asset('blackfit/images/background/9.jpg') }})">
        <div class="auto-container">
            <h2>مقالات</h2>
            <ul class="page-breadcrumb">
                <li>{{ $article->category }}</li>
                <li><a href="{{ route('website.articles') }}">مقالات</a></li>
                <li><a href="{{ route('website.index') }}">خانه</a></li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Sidebar Side -->
                <div class="sidebar-side col-lg-3 col-md-12 col-sm-12">
                    <aside class="sidebar sticky-top">
                        <div class="sidebar-inner">

                            <!-- News Widget -->
                            <div class="sidebar-widget news-widget">
                                <!-- Sidebar Title -->
                                <div class="sidebar-title">
                                    <h5>مقالات دیگر</h5>
                                </div>

                                <div class="widget-content">

                                    @foreach($others as $other)
                                        <div class="post">
                                            <div class="thumb"><a href="{{ route('website.article',$other->id) }}"><img
                                                            src="{{ asset(env('STORAGE_DIR_PATH').env('ARTICLE_DIR_PATH').$other->attachment->filename) }}"
                                                            alt=""></a></div>
                                            <h5>
                                                <a href="{{ route('website.article',$other->id) }}">{{ $other->title }}</a>
                                            </h5>
                                            <span class="date">{{ toFaDigits(\Morilog\Jalali\Jalalian::forge($article->created_at)->format('%B %d, %y')) }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Category Widget -->
                            <div class="sidebar-widget category-widget">
                                <!-- Sidebar Title -->
                                <div class="sidebar-title">
                                    <h5>دسته‌بندی‌ها</h5>
                                </div>

                                <div class="widget-content">
                                    <ul class="blog-cat">
                                        @foreach($others as $other)
                                            <li>
                                                <a href="{{ route('website.article',$other->id) }}">{{ $other->category }}</a>
                                            </li>
                                        @endforeach
                                        {{--<li><a href="#">HEALTH (15)</a></li>--}}
                                        {{--<li><a href="#">LIFESTYLE (29)</a></li>--}}
                                        {{--<li><a href="#">TRAINING PROGRAM (3)</a></li>--}}
                                        {{--<li><a href="#">SPORT SCIENCE (5)</a></li>--}}
                                        {{--<li><a href="#">NUTRITION (4)</a></li>--}}
                                    </ul>
                                </div>

                            </div>

                            <!-- Instagram Widget -->
                        {{--<div class="sidebar-widget instagram-widget">--}}
                        {{--<!-- Sidebar Title -->--}}
                        {{--<div class="sidebar-title">--}}
                        {{--<h5>INSTAGRAM</h5>--}}
                        {{--</div>--}}
                        {{--<div class="images-outer clearfix">--}}
                        {{--<!--Image Box-->--}}
                        {{--<figure class="image-box"><a href="{{ asset('blackfit/images/gallery/1.jpg') }}" class="lightbox-image" data-fancybox="footer-gallery" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="{{ asset('blackfit/images/gallery/footer-gallery-thumb-1.jpg') }}" alt=""></a></figure>--}}
                        {{--<!--Image Box-->--}}
                        {{--<figure class="image-box"><a href="{{ asset('blackfit/images/gallery/2.jpg') }}" class="lightbox-image" data-fancybox="footer-gallery" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="{{ asset('blackfit/images/gallery/footer-gallery-thumb-2.jpg') }}" alt=""></a></figure>--}}
                        {{--<!--Image Box-->--}}
                        {{--<figure class="image-box"><a href="{{ asset('blackfit/images/gallery/3.jpg') }}" class="lightbox-image" data-fancybox="footer-gallery" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="{{ asset('blackfit/images/gallery/footer-gallery-thumb-3.jpg') }}" alt=""></a></figure>--}}
                        {{--<!--Image Box-->--}}
                        {{--<figure class="image-box"><a href="{{ asset('blackfit/images/gallery/4.jpg') }}" class="lightbox-image" data-fancybox="footer-gallery" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="{{ asset('blackfit/images/gallery/footer-gallery-thumb-4.jpg') }}" alt=""></a></figure>--}}
                        {{--<!--Image Box-->--}}
                        {{--<figure class="image-box"><a href="{{ asset('blackfit/images/gallery/5.jpg') }}" class="lightbox-image" data-fancybox="footer-gallery" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="{{ asset('blackfit/images/gallery/footer-gallery-thumb-5.jpg') }}" alt=""></a></figure>--}}
                        {{--<!--Image Box-->--}}
                        {{--<figure class="image-box"><a href="{{ asset('blackfit/images/gallery/6.jpg') }}" class="lightbox-image" data-fancybox="footer-gallery" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="{{ asset('blackfit/images/gallery/footer-gallery-thumb-6.jpg') }}" alt=""></a></figure>--}}
                        {{--<!--Image Box-->--}}
                        {{--<figure class="image-box"><a href="{{ asset('blackfit/images/gallery/7.jpg') }}" class="lightbox-image" data-fancybox="footer-gallery" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="{{ asset('blackfit/images/gallery/footer-gallery-thumb-7.jpg') }}" alt=""></a></figure>--}}
                        {{--<!--Image Box-->--}}
                        {{--<figure class="image-box"><a href="{{ asset('blackfit/images/gallery/8.jpg') }}" class="lightbox-image" data-fancybox="footer-gallery" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="{{ asset('blackfit/images/gallery/footer-gallery-thumb-8.jpg') }}" alt=""></a></figure>--}}
                        {{--<!--Image Box-->--}}
                        {{--<figure class="image-box"><a href="{{ asset('blackfit/images/gallery/9.jpg') }}" class="lightbox-image" data-fancybox="footer-gallery" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="{{ asset('blackfit/images/gallery/footer-gallery-thumb-9.jpg') }}" alt=""></a></figure>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        <!-- Newsletter Widget -->
                            {{--<div class="sidebar-widget newsletter-widget">--}}
                            {{--<!-- Sidebar Title -->--}}
                            {{--<div class="sidebar-title">--}}
                            {{--<h5>NEWSLETTER</h5>--}}
                            {{--</div>--}}
                            {{--<div class="text">BIGBEAR – fitness health center where your body gets its shape! Start--}}
                            {{--training now to stay fit and healthy all year round!--}}
                            {{--</div>--}}
                            {{--<!-- Newsletter Form -->--}}
                            {{--<div class="newsletter-form">--}}
                            {{--<form method="post" action="contact.html">--}}
                            {{--<div class="form-group">--}}
                            {{--<input type="email" name="email" value="" placeholder="Email" required="">--}}
                            {{--<button type="submit" class="theme-btn submit-btn"><span--}}
                            {{--class="txt fa fa-envelope-o"></span></button>--}}
                            {{--</div>--}}
                            {{--</form>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                        </div>
                    </aside>
                </div>

                <!-- Content Side -->
                <div class="content-side col-lg-9 col-md-12 col-sm-12">
                    <div class="blog-detail style-two">
                        <div class="inner-box">
                            <h5>{{ $article->title }}</h5>
                            <div class="image">
                                <img src="{{ asset(env('STORAGE_DIR_PATH').env('ARTICLE_DIR_PATH').$article->attachment->filename) }}"
                                     alt="" style="max-height: 450px">
                            </div>
                            <ul class="post-info">
                                <li><span>موضوع: </span>{{ $article->category }}</li>
                                <li>
                                    <span>تاریخ: </span>{{ toFaDigits(\Morilog\Jalali\Jalalian::forge($article->created_at)->format('%d %B %y')) }}
                                </li>
                                {{--                                <li><span>ناشر: </span>{{ asset(\App\User::) }}</li>--}}
                            </ul>
                            <p>
                                {!! $article->content !!}
                            </p>

                            <!-- Post Share Options-->
                            {{--<div class="post-share-options clearfix">--}}
                            {{--<div class="pull-left">--}}
                            {{--<ul class="social-box">--}}
                            {{--<li class="share">MY SOCIALS:</li>--}}
                            {{--<li><a href="#"><span class="fa fa-facebook-f"></span></a></li>--}}
                            {{--<li><a href="#"><span class="fa fa-twitter"></span></a></li>--}}
                            {{--<li><a href="#"><span class="fa fa-instagram"></span></a></li>--}}
                            {{--<li><a href="#"><span class="fa fa-youtube-play"></span></a></li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                            {{--<div class="pull-right">--}}
                            {{--<ul class="posts">--}}
                            {{--<li><a href="#"><span class="arrow flaticon-back-1"></span>&ensp; Prev</a></li>--}}
                            {{--<li><a href="#">Next &ensp; <span class="arrow flaticon-arrow-pointing-to-right"></span></a></li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                        </div>

                    </div>

                    <!-- Related Posts -->
                    {{--<div class="related-posts style-two">--}}
                        {{--<h5>مقالات مشابه</h5>--}}
                        {{--<div class="row clearfix">--}}

                            {{--<!-- News Block -->--}}
                            {{--<div class="news-block style-two col-lg-6 col-md-6 col-sm-12">--}}
                                {{--<div class="inner-box">--}}
                                    {{--<div class="image">--}}
                                        {{--<a class="overlay-link" href="#"></a>--}}
                                        {{--<img src="{{ asset(env('STORAGE_DIR_PATH').env('ARTICLE_DIR_PATH').$article->attachment->filename) }}"--}}
                                             {{--alt="">--}}
                                        {{--<div class="post-date">--}}
                                            {{--<span>{{ toFaDigits(\Morilog\Jalali\Jalalian::forge($article->created_at)->format('%d')) }}</span>--}}
                                            {{--{{ toFaDigits(\Morilog\Jalali\Jalalian::forge($article->created_at)->format('%B')) }}--}}
                                        {{--</div>--}}
                                        {{--<div class="content">--}}
                                            {{--<h4>--}}
                                                {{--<a href="{{ route('website.article',$article->id) }}">{{ $article->title }}</a>--}}
                                            {{--</h4>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<!-- News Block -->--}}
                            {{--<div class="news-block style-two col-lg-6 col-md-6 col-sm-12">--}}
                                {{--<div class="inner-box">--}}
                                    {{--<a class="overlay-link" href="blog-detail.html"></a>--}}
                                    {{--<div class="image">--}}
                                        {{--<img src="{{ asset('blackfit/images/resource/news-14.jpg') }}" alt="">--}}
                                        {{--<div class="post-date">--}}
                                            {{--<span>18</span>SEP--}}
                                        {{--</div>--}}
                                        {{--<div class="content">--}}
                                            {{--<h4><a href="blog-detail.html">10 TIPS HOW TO PREPARE MEALS FAST AND--}}
                                                    {{--EASY</a></h4>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}

                </div>

            </div>
        </div>
    </div>

@endsection