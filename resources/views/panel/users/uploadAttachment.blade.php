@extends('panel.includes.master')

@section('title','تمرین جدید')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.admin.workouts.index') }}">تمرینات</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>تمرین جدید</span></li>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('style/jquery.fileupload.css') }}"/>
    <link rel="stylesheet" href="{{ asset('style/jquery.fileupload-ui.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('style/persianDatepicker.css') }}">
@endsection

@section('content')
    <div class="col-12 mx-auto">
        <ul class="mt-3">
            <li>
                حداکثر فضای آپلود برای هر عکس
                <strong dir="ltr">10 MB</strong>
                و برای هر ویدیو
                <strong dir="ltr">25 MB</strong>
                می‌باشد.
            </li>
            <li>
                فرمت‌های
                <strong>jpeg</strong> ,
                <strong>jpg</strong> ,
                <strong>png</strong> و
                <strong>gif</strong>
                مجاز برای آپلود عکس و فرمت‌های
                <strong>WebP</strong> ,
                <strong>mp4</strong> و
                <strong>ogg</strong>
                مجاز برای آپلود ویدئو می‌باشند.
            </li>
            <li>
                شما با استفاده از قابلیت
                <strong>drag & drop</strong>
                می‌توانید فایل‌ها را از کامپیوتر خود انتخاب کنید.
            </li>
        </ul>
        <form id="fileupload" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden"
                   name="redirect"
                   value="https://blueimp.github.io/jQuery-File-Upload/"/>
            <div class="fileupload-buttonbar">
                <div class="iransans-web-light">
                    <button class="btn btn-outline-success fileinput-button">
                        <span>آپلود فایل ها</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-plus">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <input type="file" name="files[]" multiple/>
                    </button>
                    <button type="submit" class="btn btn-outline-primary start">
                        <span>شروع آپلود</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-share">
                            <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                            <polyline points="16 6 12 2 8 6"></polyline>
                            <line x1="12" y1="2" x2="12" y2="15"></line>
                        </svg>
                    </button>
                    <button type="reset" class="btn btn-outline-warning cancel">
                        <span>کنسل آپلود</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-slash">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                        </svg>
                    </button>
                    {{--<button type="reset" class="btn btn-outline-danger delete">--}}
                    {{--<span>حذف انتخاب‌ها</span>--}}
                    {{--<i class="fas fa-trash-alt"></i>--}}
                    {{--</button>--}}
                    {{--<input type="checkbox" class="toggle" style="transform: scale(1.5);margin-right:.5rem;">--}}
                    {{--<span class="fileupload-process"></span>--}}
                </div>
            </div>
            <!-- The table listing the files available for upload/download -->
            <table role="presentation" class="table table-striped">
                <tbody class="files">
                @if(count($files))
                    @php $path = env('STORAGE_DIR_PATH').env('USER_DIR_PATH') @endphp
                    @foreach($files as $file)
                        <div class="template-download statbox widget box box-shadow rounded mt-2 mb-1">
                            <div class="widget-content widget-content-area rounded p-1">
                                <div class="d-flex flex-md-row flex-wrap align-items-center justify-content-between">
                                    <div class="col-md-2 col-sm-4 text-center text-sm-left">
  <span class="preview">

   <a class="fullscreen" href="{{ asset($path.$user->id.'/'.$file->filename) }}" title="{{ $file->title }}"
      download="{{ $file->title }}">
  @if($file->type === 'image')
           <img src="{{ asset($path.$user->id.'/'.$file->filename) }}" style="max-width:80px;max-height:80px">
       @elseif($file->type === 'video')
           <video width="110" height="110" controls>
  <source src="{{ asset($path.$user->id.'/'.$file->filename) }}">
  </video>
       @endif
  </a>

  </span>
                                    </div>
                                        <div class="col-lg-3 col-md-8 col-12 text-md-left text-center">
                                            <p class="name w-100 mb-0">
                                                <a class="fullscreen"
                                                   href="{{ asset($path.$user->id.'/'.$file->filename) }}"
                                                   title="{{ $file->title }}"
                                                   download="{{ $file->title }}">{{ $file->title }}</a></p>
                                        </div>
                                    <div class="date col-lg-3 col-md-8 col-12 text-md-left text-center">
                                        <span dir="rtl">{{ \Morilog\Jalali\Jalalian::forge($file->created_at)->format('%Y-%M-%d') }}</span>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-12 text-md-left text-center text-light" dir="rtl">
                                        @php $size = \Illuminate\Support\Facades\Storage::size(env('USER_DIR_PATH').$user->id.'/'.$file->filename); @endphp
                                        <span class="size text-light" dir="rtl">{{ $size>1000000 ? round($size/1000000,2).' MB' : round($size/1000,2).' KB'  }}</span>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-2 col-12 text-center d-flex flex-wrap flex-md-row flex-sm-column-reverse flex-row justify-content-center align-items-center">
                                        <button class="btn btn-outline-danger delete mr-md-1 mr-sm-0 mr-1"
                                                data-type="DELETE"
                                                data-url="{{ route('attachment.user.destroy',$file->id) }}">
                                            <i class="fas fa-trash-alt">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-trash-2">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>
                                            </i>
                                            {{--<span>حذف</span>--}}
                                        </button>
                                        <button class="btn btn-outline-success my-1 update" data-type="PUT"
                                                data-url="{{ route('attachment.user.update',$file->id) }}">
                                            <input type="hidden" value="0">
                                            <i class="fas fa-edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-edit-2">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                </svg>
                                            </i>
                                            {{--<span>ویرایش</span>--}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                </tbody>
            </table>
        </form>
    </div>
@endsection

@section('script')

    @include('panel.users.fileupload.upload')
    @include('panel.users.fileupload.download')

    <script src="{{ asset('js/persianDatepicker.min.js') }}"></script>

    <script src="{{ asset('js/vendor/jquery.ui.widget.js') }}"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->

    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
    <script src="{{ asset('js/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('js/jquery.fileupload-process.js') }}"></script>
    <script src="{{ asset('js/jquery.fileupload-image.js') }}"></script>
    <script src="{{ asset('js/jquery.fileupload-video.js') }}"></script>
    <script src="{{ asset('js/jquery.fileupload-ui.js') }}"></script>
    <script src="{{ asset('js/userdemo.js') }}"></script>
    {{--<script>--}}
        {{--$(document).ready(function () {--}}
            {{--$(document).on("click", "input[name='file_created_at[]']", function () {--}}
                {{--$(this).persianDatepicker({--}}
                    {{--formatDate: "YYYY-0M-0D"--}}
                {{--});--}}
            {{--});--}}
        {{--})--}}
    {{--</script>--}}
    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
    {{--<script src="/js/cors/jquery.xdr-transport.js"></script>--}}
@endsection
