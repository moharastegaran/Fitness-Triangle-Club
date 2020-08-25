@extends('website.includes.master')

@section('title','باشگاه مثلث فیتنس - ویدئوها')

@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{ asset('blackfit/images/background/11.jpg') }})">
        <div class="auto-container">
            <h2>کلیپ‌ها</h2>
            <ul class="page-breadcrumb">
                <li>کلیپ‌ها</li>
                <li><a href="{{ route('website.index') }}">خانه</a></li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Sidebar Page Container -->
    <div class="sidebar-page-container overflow-hidden">
        <div class="auto-container">
            <div class="row clearfix d-flex flex-lg-row flex-column-reverse flex-wrap ">

                <!-- Content Side -->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <!-- Shop Single -->
                    <div class="shop-section">

                        <!-- Sort By -->
                        {{--<div class="items-sorting">--}}
                        {{--<div class="total-items">Showing <span>1-6 of 26</span></div>--}}
                        {{--</div>--}}

                        <div class="row clearfix">

                        @if(count($attachments))
                            @foreach($attachments as $attachment)
                                    <div class="col-md-6 col-12 my-2">
                                        <div class="video-box"
                                             style="background-image:url({{ asset('blackfit/images/resource/video-img.jpg') }})">
                                            <figure class="video-image">
                                                <img src="{{ asset('blackfit/images/resource/video-img-2.jpg') }}" alt="">
                                            </figure>
                                            <a href="{{ asset(env('STORAGE_DIR_PATH').env('WORKOUT_DIR_PATH').$attachment->w_id.'/'.$attachment->filename) }}"
                                               class="lightbox-image overlay-box"><span class="flaticon-play-arrow"><i
                                                            class=""></i></span></a>
                                        </div>
                                        <div class="lower-content text-right">
                                            <h6 class="my-2">{{ $attachment->title }}</h6>
                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <div class="price" dir="rtl">{{ toFaDigits(\Morilog\Jalali\Jalalian::forge($attachment->created_at)->format('%d %B %Y')) }}</div>
                                                </div>
                                                <div class="pull-right">
                                                    <a href="#" class="text-dark">{{ $attachment->c_title }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                            {!! $attachments->render() !!}
                        @else
                            <div class="col-md-8 col-sm-10 col-12 mx-auto">
                                <div class="alert rounded p-3 border border-primary text-primary text-right" dir="rtl">
                                    ویدئویی برای نمایش در این دسته‌بندی‌ وجود ندارد.
                                </div>
                            </div>
                        @endif

                        </div>

                        <!-- Lower Text -->
                        {{--<div class="lower-text text-center">--}}
                        {{--<a href="#" class="products">MORE PRODUCTS</a>--}}
                        {{--</div>--}}

                    </div>
                </div>

                <!-- Sidebar Side -->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12 mb-3">
                    <aside class="sidebar sticky-top">
                        <div class="sidebar-inner padding-left">

                            <!-- Category Widget -->
                            <div class="sidebar-widget category-widget">
                                <!-- Sidebar Title -->
                                <div class="sidebar-title">
                                    <h5>دسته‌بندی‌ها</h5>
                                </div>

                                <div class="widget-content">
                                    <ul class="shop-cat">
                                        <li @if(!request('category_id')) class="active" @endif><a href="{{ route('website.videos') }}">همه<span></span></a>
                                        </li>
                                        @foreach($categories as $category)
                                            <li @if(request('category_id')==$category->id) class="active" @endif><a href="{{ route('website.videos',['category_id' => $category->id]) }}">{{ $category->title }}<span></span></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

@endsection