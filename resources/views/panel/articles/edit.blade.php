@extends('panel.includes.master')

@section('title','ویرایش مقاله')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.admin.articles.index') }}">مقالات</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>ویرایش مقاله</span></li>
@endsection

@section('style')
    <link href="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet"
          type="text/css">
@endsection

@section('content')
    <div class="col-md-9 col-12 mx-auto">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <form method="post" action="{{ route('panel.admin.articles.update',$blog) }}" enctype="multipart/form-data"
                      class="row mx-auto">

                    @include('panel.includes.errors')

                    @csrf
                    @method('PUT')
                    <div class="col-sm-6 col-12 my-1">
                        <label for="title">عنوان</label>
                        <input type="text" name="title" class="form-control" id="title" autocomplete="off"
                               placeholder="روش های تغذیه سالم" value="{{ old('title') ?? $blog->title }}">
                    </div>
                    <div class="col-sm-6 col-12 my-1">
                        <label for="category">دسته بندی</label>
                        <input type="text" name="category" class="form-control" id="category" autocomplete="off"
                               placeholder="تغذیه‌ای" value="{{ old('category') ?? $blog->category }}">
                    </div>
                    <div class="col-12 my-1">
                        <label>آپلود عکس</label>
                        <div class="custom-file-container" data-upload-id="myFirstImage">
                            <label class="custom-file-container__custom-file">
                                <input type="file" class="custom-file-container__custom-file__custom-file-input"
                                       accept="image/*" name="file">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <a href="javascript:void(0)" class="custom-file-container__image-clear mt-2"
                               title="Clear Image" style="float: left;clear: both">حذف</a>
                            <div class="custom-file-container__image-preview custom-file-container__image-preview--active"></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="context">محتوا</label>
                        <textarea id="context" name="content">{!! $blog->content !!}</textarea>
                    </div>
                    <div class="col-12 my-4 text-right">
                        <button type="submit" class="btn btn-primary">ویرایش</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script src="{{ asset('cork/assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function () {
            CKEDITOR.replace('context');
            var firstUpload = new FileUploadWithPreview('myFirstImage');
            @if($blog->attachment)
            $(".custom-file-container__image-preview").css({
                backgroundImage : 'url(/{{ env("STORAGE_DIR_PATH").env("ARTICLE_DIR_PATH").$blog->attachment->filename }})'
            })
            @endif
        });
    </script>
@endsection
