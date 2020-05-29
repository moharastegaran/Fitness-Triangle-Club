@extends('panel.includes.master')

@section('title','مشاهده تمرین')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.admin.workouts.index') }}">تمرینات</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>مشاهده تمرین</span></li>
@endsection

@section('content')

    <div class="col-md-11 col-12 mx-auto">
        <div class="statbox widget box box-shadow">
            <div class="widget-header pt-3 px-3">
                {{--<div class="row">--}}
                <div class="d-flex justify-content-between align-items-center">
                    <h4>مشاهده تمرین</h4>
                    <ul class="d-flex">
                        <li class="d-block mx-2">
                            <a href="{{ route('panel.admin.workouts.edit',$workout) }}">
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
                {{--</div>--}}
            </div>
            <div class="widget-content widget-content-area rounded p-5">
                <ul>
                    <li class="d-flex flex-wrap my-2">
                        <h6 style="width: 150px" class="my-md-0 my-2">نام</h6>
                        <strong>{{ $workout->title }}</strong>
                    </li>
                    <li class="d-flex flex-wrap my-2">
                        <h6 style="width: 150px" class="my-md-0 my-2">دسته‌بندی</h6>
                        <strong>{{ $workout->category->title }}</strong>
                    </li>
                    <li class="d-flex flex-md-nowrap flex-wrap my-2">
                        <h6 style="min-width: 150px;" class="my-md-0 my-2">عکس‌ها</h6>
                        <div class="d-flex flex-wrap">
                            @if(count($images = $workout->images()))
                                @php $path = env('STORAGE_DIR_PATH').env('WORKOUT_DIR_PATH') @endphp
                                @foreach($workout->images() as $img)
                                    <div class="col-lg-4 col-md-6 col-12 my-1">
                                        <div class="card component-card_2">
                                            <img src="{{ asset($path.$workout->id.'/'.$img->filename) }}"
                                                 class="card-img-top" style="height: 220px;width: 100%"
                                                 alt="widget-card-2">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $img->title }}</h5>
                                                {{--<p class="card-text">Etiam sed augue ac justo tincidunt posuere. Vivamus euismod eros, nec risus malesuada.</p>--}}
                                                {{--<a href="#" class="btn btn-primary">Explore More</a>--}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                -
                            @endif
                        </div>
                    </li>
                    <li class="d-flex flex-md-nowrap flex-wrap my-2">
                        <h6 style="width: 150px;" class="my-md-0 my-2">ویدئوها</h6>
                        <div class="d-flex flex-wrap">
                            @if(count($videos = $workout->videos()))
                                @php $path = env('STORAGE_DIR_PATH').env('WORKOUT_DIR_PATH') @endphp
                                @foreach($workout->videos() as $video)
                                    <div class="col-md-6 col-12 my-1">
                                        <div class="card component-card_2">
                                            <video controls height="310" style="width: 100%">
                                                <source src="{{ asset($path.$workout->id.'/'.$video->filename) }}">
                                            </video>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $video->title }}</h5>
                                            {{--<p class="card-text">Etiam sed augue ac justo tincidunt posuere. Vivamus euismod eros, nec risus malesuada.</p>--}}
                                            {{--<a href="#" class="btn btn-primary">Explore More</a>--}}
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                -
                            @endif
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
