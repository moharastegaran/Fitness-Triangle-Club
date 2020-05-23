@extends('panel.includes.master')

@section('title','دسته‌بندی تمرینات')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.admin.workouts.index') }}">تمرینات</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>دسته‌بندی تمرینات</span></li>
@endsection

@section('style')
    <link href="{{ asset('cork/assets/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    @foreach($categories as $category)
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 layout-spacing">
            <a href="{{ route('panel.admin.workouts.group',$category->id) }}">
                <div class="widget widget-five">
                    <div class="widget-content">
                        <div class="header">
                            <div class="header-body">
                                <h4>{{ $category->title }}</h4>
                            </div>
                        </div>

                        <div class="w-content">
                            <div class="">
                                <p class="task-left">{{ count($category->workouts) }}</p>
                                <p class="task-completed"><span>تمرین ثبت‌شده</span></p>
                                <p class="task-hight-priority">مشاهده تمرینات<span> {{ $category->title }} </span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
@endsection