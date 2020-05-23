@extends('panel.includes.master')

@section('title','مشاهده مقاله')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.admin.articles.index') }}">مقالات</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>مشاهده مقاله</span></li>
@endsection

@section('style')
<style>
    .expand-container{
        position: fixed;
        top: 0;
        left:0;
        right: 0;
        bottom:0;
        z-index: 9999999;
        background-color: rgba(48, 48, 48, 0.86);
    }
    .expand-container img{
        max-width: 100%;
        max-height:100%;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }
    .expand-container .close{
        position: absolute;
        top: 5%;
        left: 5%;
        font-size: 40px;
        z-index: 2;
        color : #efefef;
    }
</style>
@endsection

@section('content')
    <div class="col-md-10 col-12 mx-auto">
        <div class="statbox widget box box-shadow mx-auto">
            <div class="widget-header p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4>مشاهده مقاله</h4>
                    <ul class="d-flex">
                        <li class="d-block mx-2">
                            <a href="{{ route('panel.admin.articles.edit',$blog) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round"
                                     class="feather feather-edit-2 p-1 br-6 mb-1">
                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <ul>
                    <li class="d-flex flex-wrap my-2">
                        <h6 style="width : 150px">عنوان</h6>
                        <div>{{ $blog->title }}</div>
                    </li>
                    <li class="d-flex flex-wrap my-2">
                        <h6 style="width : 150px">دسته بندی</h6>
                        <div>{{ $blog->category }}</div>
                    </li>
                    <li class="d-flex flex-wrap my-2">
                        <h6 style="min-width : 150px" class="my-1">عکس</h6>
                        <div class="d-flex flex-wrap align-items-center">
                            @if($a = $blog->attachment)
                                <img src="{{ asset(env('STORAGE_DIR_PATH').env('ARTICLE_DIR_PATH').$a->filename) }}"
                                     class="img img-fluid pt-2 rounded" style="max-width: 60%">
                                <a href="{{ route('panel.admin.articles.attachment.download',$blog->id) }}"
                                   class="shortcut-link shadow-sm mx-1">
                                    <img src="{{ asset('icons/download.png') }}" width="20" height="20">
                                </a>
                                <a href="javascript:void(0)" class="expand-link shortcut-link shadow-sm mx-1">
                                    <img src="{{ asset('icons/expand.png') }}" width="20" height="20">
                                </a>
                            @else
                                ندارد
                            @endif
                        </div>
                    </li>
                    <li class="d-flex flex-wrap my-2">
                        <h6 style="width : 150px" class="my-md-0 my-2">محتوا</h6>
                        <div>{!! $blog->content !!}</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $(".expand-link").on("click", function () {
                var src = $(this).siblings("img").first().attr("src");
                $("body").append("<div class='expand-container'>" +
                    "<a href='javascript:void(0);' class='close' >&times</a>" +
                    "<img class='img-fluid mx-auto' src='" + src + "'>" +
                    "</div>");
                $("body,html").css({overflow: "hidden"})
            });
            $(document).on("click",".expand-container , .expand-container .close",function () {
                $(".expand-container").fadeOut(function () {
                    $(this).remove();
                    $("body,html").css({overflow: "auto"})
                });
            });
        });
    </script>
@endsection
