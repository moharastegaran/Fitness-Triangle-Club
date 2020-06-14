@extends('website.includes.master')

@section('title','باشگاه مثلث فیتنس - مقالات')

@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{ asset('blackfit/images/background/9.jpg') }})">
        <div class="auto-container">
            <h2>مقالات</h2>
            <ul class="page-breadcrumb">
                <li>مقالات</li>
                <li><a href="{{ route('website.index') }}">خانه</a></li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Blog Post Section -->
    <section class="blog-post-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- News Block -->
                @if(count($articles))
                    @foreach($articles as $article)
                        <div class="news-block col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-box">
                                <a class="overlay-link" href="{{ route('website.article',$article->id) }}"></a>
                                <div class="image">
                                    <img src="{{ asset(env('STORAGE_DIR_PATH').env('ARTICLE_DIR_PATH').$article->attachment->filename) }}" alt="">
                                    <div class="post-date">
                                        <span>{{ toFaDigits(\Morilog\Jalali\Jalalian::forge($article->created_at)->format('%d')) }}</span>
                                        {{ toFaDigits(\Morilog\Jalali\Jalalian::forge($article->created_at)->format('%B')) }}
                                    </div>
                                    <div class="content">
                                        <h4><a href="{{ route('website.article',$article->id) }}">{{ $article->title }}</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
            @else
                    <div class="alert alert-danger">
                        مقاله برای نمایش وجود ندارد.
                    </div>
            @endif
            </div>
        </div>
    </section>
    <!-- End Blog Post Section -->
@endsection