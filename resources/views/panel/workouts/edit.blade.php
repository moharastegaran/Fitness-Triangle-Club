@extends('panel.includes.master')

@section('title','ویرایش تمرین')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.admin.workouts.index') }}">تمرینات</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>ویرایش تمرین</span></li>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('style/jquery.fileupload.css') }}"/>
    <link rel="stylesheet" href="{{ asset('style/jquery.fileupload-ui.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/plugins/select2/select2.min.css') }}">
@endsection

@section('content')

    <div class="col-md-9 col-12 mx-auto">

        @include('panel.includes.errors')

        <form id="fileupload" method="post" action="{{ route('panel.admin.workouts.update',$workout) }}"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 col-12">
                    <label for="title">نام</label>
                    <input id="title" type="text" name="title" class="form-control form-control-sm"
                           value="{{ count($errors->all()) ? old('title') : $workout->title }}"
                           autocomplete="off">
                </div>
                <div class="col-md-6 col-12">
                    <label for="category">دسته‌بندی</label>
                    <select id="category" name="category_id" class="form-control form-control-sm">
                        <option value="" disabled selected>گروه بندی را انتخاب کنید</option>
                        @foreach($cats as $cat)
                            <option value="{{ $cat->id }}"
                                    @if(old('category_id') && old('category_id')==$cat->id) selected
                                    @elseif(!old('category_id') && $workout->category->id==$cat->id) selected @endif>{{ $cat->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
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
                <input type="hidden"
                       name="redirect"
                       value="https://blueimp.github.io/jQuery-File-Upload/"/>
                <div class="fileupload-buttonbar">
                    <div class="iransans-web-light">
                        <button class="btn btn-outline-success fileinput-button">
                            <span>آپلود فایل ها</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-plus">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            <input type="file" name="files[]" multiple/>
                        </button>
                        {{--<button type="submit" class="btn btn-outline-primary start">--}}
                        {{--<span>شروع آپلود</span>--}}
                        {{--<i class="fas fa-upload"></i>--}}
                        {{--</button>--}}
                        <button type="reset" class="btn btn-outline-warning cancel">
                            <span>کنسل آپلود</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-slash">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                            </svg>
                        </button>
                        {{--<button type="reset" class="btn btn-outline-danger delete">--}}
                        {{--<span>حذف انتخاب‌ها</span>--}}
                        {{--<i class="fas fa-trash-alt"></i>--}}
                        {{--</button>--}}
                        {{--<input type="checkbox" class="toggle" style="transform: scale(1.5);margin-right:.5rem;">--}}
                        {{--<span class="fileupload-process"></s    pan>--}}
                    </div>
                </div>
                <!-- The table listing the files available for upload/download -->
                <table role="presentation" class="table table-striped">
                    <tbody id="files" class="files">
                    @if(count($files = $workout->attachments))
                        @php $path = env('STORAGE_DIR_PATH').env('WORKOUT_DIR_PATH') @endphp
                        @foreach($files as $file)
                            <div class="template-download statbox widget box box-shadow rounded mt-2 mb-1">
                                <div class="widget-content widget-content-area rounded p-1">
                                    <div class="d-flex flex-md-row flex-wrap align-items-center justify-content-between">
                                        <div class="col-md-2 col-sm-4 text-center text-sm-left">
  <span class="preview">

   <a class="fullscreen" href="{{ asset($path.$workout->id.'/'.$file->filename) }}" title="{{ $file->title }}"
      download="{{ $file->title }}">
  @if($file->type === 'image')
           <img src="{{ asset($path.$workout->id.'/'.$file->filename) }}" style="max-width:80px;max-height:80px">
       @elseif($file->type === 'video')
           <video width="110" height="110" controls>
  <source src="{{ asset($path.$workout->id.'/'.$file->filename) }}">
  </video>
       @endif
  </a>

  </span>
                                        </div>
                                        <div class="file-desc col-md-6 col-sm-6 col-12 mx-auto d-flex flex-md-row-reverse flex-column-reverse align-items-center">
                                            <div class="col-md-4 col-12 text-md-left text-center text-light mt-md-0 mt-3">
                                                @php $size = \Illuminate\Support\Facades\Storage::size(env('WORKOUT_DIR_PATH').$workout->id.'/'.$file->filename); @endphp
                                                <span class="size text-light">{{ $size>1000000 ? round($size/1000000,2).' MB' : round($size/1000,2).' KB'  }}</span>
                                            </div>
                                            <div class="col-md-8 col-12 text-md-left text-center mt-sm-0 mt-3">
                                                <p class="name w-100 mb-md-2 mb-0">
                                                    <a class="fullscreen"
                                                       href="{{ asset($path.$workout->id.'/'.$file->filename) }}"
                                                       title="{{ $file->title }}"
                                                       download="{{ $file->title }}">{{ $file->title }}</a></p>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-2 col-12 text-center d-flex flex-wrap flex-md-row flex-sm-column-reverse flex-row justify-content-center align-items-center">
                                            <button class="btn btn-outline-danger delete mr-md-1 mr-sm-0 mr-1"
                                                    data-type="DELETE"
                                                    data-url="{{ route('attachment.destroy',$file->id) }}">
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
                                                <span>حذف</span>
                                            </button>
                                            <button class="btn btn-outline-success my-1 update" data-type="PUT"
                                                    data-url="{{ route('attachment.update',$file->id) }}">
                                                <input type="hidden" value="0">
                                                <i class="fas fa-edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-edit-2">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                    </svg>
                                                </i>
                                                <span>ویرایش</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    @endif
                    @php $files = \App\Attachment::where('attachmentable_id',0)->where('attachmentable_type',\App\Workout::class)->get(); @endphp
                    @if(count($files))
                        @php $path = env('STORAGE_DIR_PATH').env('WORKOUT_DIR_PATH') @endphp
                        @foreach($files as $file)
                            <div class="template-download statbox widget box box-shadow rounded mt-2 mb-1">
                                <div class="widget-content widget-content-area rounded p-1">
                                    <div class="d-flex flex-md-row flex-wrap align-items-center justify-content-between">
                                        <div class="col-md-2 col-sm-4 text-center text-sm-left">
  <span class="preview">

   <a class="fullscreen" href="{{ asset($path.'0/'.$file->filename) }}" title="{{ $file->title }}"
      download="{{ $file->title }}">
  @if($file->type === 'image')
           <img src="{{ asset($path.'0/'.$file->filename) }}" style="max-width:80px;max-height:80px">
       @elseif($file->type === 'video')
           <video width="110" height="110" controls>
  <source src="{{ asset($path.'0/'.$file->filename) }}">
  </video>
       @endif
  </a>

  </span>
                                        </div>
                                        <div class="file-desc col-md-6 col-sm-6 col-12 mx-auto d-flex flex-md-row-reverse flex-column-reverse align-items-center">
                                            <div class="col-md-4 col-12 text-md-left text-center text-light mt-md-0 mt-3">
                                                @php $size = \Illuminate\Support\Facades\Storage::size(env('WORKOUT_DIR_PATH').'0/'.$file->filename); @endphp
                                                <span class="size text-light">{{ $size>1000000 ? round($size/1000000,2).' MB' : round($size/1000,2).' KB'  }}</span>
                                            </div>
                                            <div class="col-md-8 col-12 text-md-left text-center mt-sm-0 mt-3">
                                                <p class="name w-100 mb-md-2 mb-0">
                                                    <a class="fullscreen"
                                                       href="{{ asset($path.'0/'.$file->filename) }}"
                                                       title="{{ $file->title }}"
                                                       download="{{ $file->title }}">{{ $file->title }}</a></p>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-2 col-12 text-center d-flex flex-wrap flex-md-row flex-sm-column-reverse flex-row justify-content-center align-items-center">
                                            <button class="btn btn-outline-danger delete mr-md-1 mr-sm-0 mr-1"
                                                    data-type="DELETE"
                                                    data-url="{{ route('attachment.destroy',$file->id) }}">
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
                                                <span>حذف</span>
                                            </button>
                                            <button class="btn btn-outline-success my-1 update" data-type="PUT"
                                                    data-url="{{ route('attachment.update',$file->id) }}">
                                                <input type="hidden" value="0">
                                                <i class="fas fa-edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-edit-2">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                    </svg>
                                                </i>
                                                <span>ویرایش</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="col-12 text-right">
                <input id="btn-submit" type="button" class="btn btn-primary px-4" value="ویرایش">
            </div>
        </form>
    </div>

@endsection

@section('script')

    @include('layouts.files.upload')

    @include('layouts.files.download')

    <script src="{{ asset('cork/plugins/select2/select2.min.js') }}"></script>

    <script src="{{ asset('js/workout.create.js') }}"></script>

    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"--}}
    {{--integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f"--}}
    {{--crossorigin="anonymous"></script>--}}
    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="{{ asset('js/vendor/jquery.ui.widget.js') }}"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    {{--<script src="/js/jquery.iframe-transport.js"></script>--}}
    <script src="{{ asset('js/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('js/jquery.fileupload-process.js') }}"></script>
    <script src="{{ asset('js/jquery.fileupload-image.js') }}"></script>
    <script src="{{ asset('js/jquery.fileupload-video.js') }}"></script>
    <script src="{{ asset('js/jquery.fileupload-ui.js') }}"></script>
    <script src="{{ asset('js/demo.js') }}"></script>
    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
    {{--<script src="/js/cors/jquery.xdr-transport.js"></script>--}}
    <script>
        $(document).ready(function () {
            $(".basic").select2({tags: true});
            $("#btn-submit1").on("click", function (e) {
                e.preventDefault();
                $("input[name='_redirect']").val('1');
                $("form").submit();
            });
        });
    </script>
@endsection
