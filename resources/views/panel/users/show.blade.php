@extends('panel.includes.master')

@section('title','مشاهده پروفایل کاربر')

@section('breadcrumb')
    @if(auth()->user()->isAdmin())
        <li class="breadcrumb-item"><a href="{{ route('panel.users.index') }}">کاربران</a></li>
    @endif
    <li class="breadcrumb-item active" aria-current="page"><span>مشاهده پروفایل</span></li>
@endsection

@section('style')
    <link href="{{ asset('cork/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('cork/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('cork/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <style>
        #blueimp-gallery {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 999999999;
            background-color: rgba(62, 62, 62, 0.85);
        }

        #blueimp-gallery img {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            max-width: 100%;
            max-height: 100%;
        }

        #blueimp-gallery span.close {
            cursor: pointer;
            position: absolute;
            top: 5%;
            left: 5%;
            z-index: 2;
            color: #efefef;
            font-size: 40px;
        }

        #blueimp-gallery span.close:hover {
            color: #fe4545;
        }

        .overlay-container {
            position: relative;
        }

        .overlay-container:hover .overlay-controls {
            -webkit-transform: scale(1.0);
            -moz-transform: scale(1.0);
            -ms-transform: scale(1.0);
            -o-transform: scale(1.0);
            transform: scale(1.0);
        }

        .overlay-controls {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(99, 99, 99, 0.59);

            -webkit-transform: scale(0.0);
            -moz-transform: scale(0.0);
            -ms-transform: scale(0.0);
            -o-transform: scale(0.0);
            transform: scale(0.0);

            -webkit-transition: .25s;
            -moz-transition: .25s;
            -ms-transition: .25s;
            -o-transition: .25s;
            transition: .25s;
        }

        .overlay-items {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);

            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .overlay-items a {
            background-color: #333;
            padding: .5rem;
            border-radius: 50%;
            margin: .25rem;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')

    <div class="row w-100 layout-spacing mx-2">

        <!-- Content -->
        <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

            <div class="user-profile layout-spacing">
                <div class="widget-content widget-content-area">
                    <div class="d-flex justify-content-between">
                        <h3 class="">پروفایل</h3>
                        <a href="{{ route('panel.users.edit',$user->id) }}" class="mt-2 edit-profile">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-edit-3">
                                <path d="M12 20h9"></path>
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="text-center user-info">
                        <div class="overlay-container" style="width: 100px;height: 100px;margin: auto">
                            <img src="{{ asset(($a=$user->avatar()) ? env('STORAGE_DIR_PATH').env('AVATAR_DIR_PATH').$user->id.'/'.$a :'icons/user.png')  }}"
                                 alt="avatar" width="100" height="100">
                            @if($a)
                                <div class="overlay-controls">
                                    <div class="overlay-items">
                                        {{--<a href="#" target="_blank">--}}
                                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
                                        {{--viewBox="0 0 24 24"--}}
                                        {{--fill="none" stroke="currentColor" stroke-width="2"--}}
                                        {{--stroke-linecap="round"--}}
                                        {{--stroke-linejoin="round"--}}
                                        {{--class="feather feather-download">--}}
                                        {{--<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>--}}
                                        {{--<polyline points="7 10 12 15 17 10"></polyline>--}}
                                        {{--<line x1="12" y1="15" x2="12" y2="3"></line>--}}
                                        {{--</svg>--}}
                                        {{--</a>--}}
                                        <a href="#" class="fullscreen">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-maximize-2">
                                                <polyline points="15 3 21 3 21 9"></polyline>
                                                <polyline points="9 21 3 21 3 15"></polyline>
                                                <line x1="21" y1="3" x2="14" y2="10"></line>
                                                <line x1="3" y1="21" x2="10" y2="14"></line>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <p class="">{{ $user->name.' '.$user->family }}</p>
                    </div>
                    <div class="user-info-list">
                        <div class="">
                            <ul class="contacts-block list-unstyled">
                                <li class="contacts-block__item">
                                    <svg height="24" viewBox="0 0 512 512"
                                         width="24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#fff"
                                         stroke-width="5" stroke-linecap="round" stroke-linejoin="round"
                                         class="feather">
                                        <g>
                                            <path d="m512 96.145c0-25.691-10.006-49.838-28.174-67.991-33.056-33.028-84.499-37.167-122.094-11.516-37.588-25.595-89.019-21.458-122.078 11.516-12.461 12.451-21.081 27.722-25.268 44.376-22.651-2.427-45.295 3.225-64.139 16.105-37.588-25.588-89.016-21.452-122.073 11.519-18.169 18.153-28.174 42.3-28.174 67.991s10.005 49.837 28.169 67.986l87.478 87.478-14.94 59.761c-1.12 4.48-.113 9.229 2.729 12.869 2.843 3.641 7.204 5.769 11.823 5.769h20.699c2.231 23.032 9.447 36.959 15.946 49.486 6.691 12.897 12.47 24.035 13.198 46.003.269 8.11 6.928 14.503 14.982 14.503.168 0 .337-.003.506-.008 8.28-.274 14.769-7.209 14.495-15.489-.953-28.758-9.24-44.731-16.552-58.824-5.53-10.66-10.473-20.195-12.408-35.67h19.134c4.619 0 8.98-2.128 11.823-5.769 2.842-3.641 3.849-8.389 2.729-12.869l-14.94-59.761 87.474-87.474c6.703-6.698 12.326-14.306 16.751-22.557l38.031 38.031-14.94 59.761c-1.12 4.48-.113 9.229 2.729 12.869 2.843 3.641 7.204 5.769 11.823 5.769h19.155c-1.926 15.782-6.909 25.442-12.485 36.249-7.813 15.143-16.67 32.306-16.67 65.017 0 32.74 8.86 49.925 16.677 65.088 1.274 2.47 2.477 4.803 3.642 7.197 2.596 5.336 7.938 8.44 13.499 8.44 2.202 0 4.438-.486 6.552-1.515 7.449-3.624 10.55-12.602 6.926-20.051-1.317-2.707-2.657-5.307-3.953-7.82-7.159-13.886-13.342-25.878-13.342-51.34 0-25.428 6.177-37.398 13.33-51.261 6.521-12.637 13.764-26.69 15.983-50.005h20.687c4.619 0 8.98-2.128 11.823-5.769 2.842-3.641 3.849-8.389 2.729-12.869l-14.94-59.761 87.474-87.473c18.168-18.154 28.174-42.299 28.174-67.991zm-371.599 252.146c2.82 2.468 6.335 3.718 9.859 3.718s7.039-1.25 9.859-3.718l5.93 23.718h-31.577zm110.736-133.372-100.877 100.877-100.882-100.882c-12.496-12.486-19.378-29.096-19.378-46.769 0-17.674 6.882-34.283 19.369-46.76 24.847-24.781 64.772-25.904 90.895-2.554 5.697 5.092 14.31 5.088 20.003-.009 14.203-12.717 32.818-18.517 51.421-16.402 1.493 23.328 11.286 45.048 27.962 61.711l26.809 26.809c-3.288 8.972-8.493 17.155-15.322 23.979zm94.815 85.089 5.93-23.718c2.82 2.468 6.335 3.718 9.859 3.718s7.039-1.25 9.859-3.718l5.93 23.718zm116.665-157.089-100.877 100.877-100.881-100.882c-12.497-12.485-19.378-29.096-19.378-46.769 0-17.674 6.882-34.283 19.369-46.76 12.898-12.864 29.858-19.353 46.842-19.353 15.734 0 31.49 5.569 44.052 16.799 5.697 5.091 14.31 5.088 20.003-.009 26.118-23.387 66.035-22.265 90.875 2.554 12.496 12.486 19.378 29.095 19.378 46.769 0 17.673-6.882 34.283-19.383 46.774z"/>
                                        </g>
                                    </svg>
                                    {{ toFaDigits(\Morilog\Jalali\Jalalian::forge($user->birthday)->format('%d %B %Y')) }}
                                </li>
                                <li class="contacts-block__item">
                                    <a href="mailto:{{ $user->email }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-mail">
                                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                        @if($user->email)
                                            {{ $user->email }}
                                        @else
                                            <span class="text-danger">ایمیل وارد نشده است.</span>
                                        @endif
                                    </a>
                                </li>
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-phone">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                    {{ toFaDigits($user->mobile) }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="skills layout-spacing widget-chart-two">
                <div class="widget-content widget-content-area">
                    <h3>برنامه‌ها و درخواست‌ها</h3>
                    <div id="chart-2" class="iransans-web">
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

            <div class="skills layout-spacing" style="width: 100%">
                <div class="widget-content widget-content-area">
                    <h3 class="">مشخصات پزشکی</h3>
                    <div class="d-flex flex-wrap justify-content-between">
                        @if($user->medical)
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 my-2">
                                <div class="d-flex flex-xl-row flex-column justify-content-between align-items-start"
                                     style="background: linear-gradient(to left,#8dbf42 0%,transparent 85%) bottom no-repeat;background-size: 100% 1%">
                                    <h6 class="info-heading" style="color : #e6ffbf">گروه خونی</h6>
                                    <p class="info-text"
                                       dir="ltr">{{ $user->medical ? $user->medical->blood_type : '-'}}</p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 my-2">
                                <div class="d-flex flex-xl-row flex-column justify-content-between align-items-start"
                                     style="background: linear-gradient(to left,#8dbf42 0%,transparent 85%) bottom no-repeat;background-size: 100% 1%">
                                    <h6 class="info-heading" style="color: #e6ffbf">قد<span
                                                style="font-size: 11px">(cm) </span></h6>
                                    <p class="info-text">{{ $user->medical ? toFaDigits($user->medical->height) : '-'}}</p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 my-2">
                                <div class="d-flex flex-xl-row flex-column justify-content-between align-items-start"
                                     style="background: linear-gradient(to left,#8dbf42 0%,transparent 85%) bottom no-repeat;background-size: 100% 1%">
                                    <h6 class="info-heading" style="color : #e6ffbf">وزن<span
                                                style="font-size: 11px">(kg) </span></h6>
                                    <p class="info-text">{{ $user->medical ? toFaDigits($user->medical->weight) : '-'}}</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-6 my-md-4 my-2">
                                <div class="d-flex flex-xl-row flex-column justify-content-between align-items-start"
                                     style="background: linear-gradient(to left,#8dbf42 0%,transparent 85%) bottom no-repeat;background-size: 100% 1%">
                                    <h6 class="info-heading mr-xl-2" style="color : #e6ffbf">سابقه بیماری</h6>
                                    <p class="info-text text-justify ml-1">{{ $user->medical ? $user->medical->disease_history : '-'}}</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-6 my-md-4 my-2">
                                <div class="d-flex flex-xl-row flex-column justify-content-between align-items-start"
                                     style="background: linear-gradient(to left,#8dbf42 0%,transparent 85%) bottom no-repeat;background-size: 100% 1%">
                                    <h6 class="info-heading mr-xl-2" style="color : #e6ffbf">سابقه مصدومیت</h6>
                                    <p class="info-text text-justify ml-1">{{ $user->medical ? $user->medical->injury_history : '-'}}</p>
                                </div>
                            </div>
                            @if($user->medical && $user->medical->attachment)
                                <div class="col-xl-6 col-12 mr-auto mt-2">
                                    <h6 class="info-heading" style="color : #e6ffbf">برگه آزمایش</h6>
                                    <div class="overlay-container">
                                        <img src="{{ asset(env('STORAGE_DIR_PATH').env('MEDICAL_DIR_PATH').$user->id.'/'.$user->medical->attachment->filename)  }}"
                                             class="img-fluid">
                                        <div class="overlay-controls">
                                            <div class="overlay-items">
                                                <a href="#" class="fullscreen">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2"
                                                         stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-maximize-2">
                                                        <polyline points="15 3 21 3 21 9"></polyline>
                                                        <polyline points="9 21 3 21 3 15"></polyline>
                                                        <line x1="21" y1="3" x2="14" y2="10"></line>
                                                        <line x1="3" y1="21" x2="10" y2="14"></line>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            برای ثبت اطلاعات پزشکی خود از قسمت ویرایش اطلاعات اقدام نمایید.
                        @endif
                    </div>
                </div>
            </div>

            <div class="skills layout-spacing">
                <div class="widget-content widget-content-area">
                    <h3 class="">مشخصات ورزشی</h3>
                    <div class="d-flex flex-wrap justify-content-between">
                        @if($user->athletic)
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-6 my-md-4 my-2">
                                <div class="d-flex flex-xl-row flex-column justify-content-between align-items-start"
                                     style="background: linear-gradient(to left,#8dbf42 0%,transparent 85%) bottom no-repeat;background-size: 100% 1%">
                                    <h6 class="info-heading mr-xl-2" style="color : #e6ffbf">سابقه تمرینی</h6>
                                    <p class="info-text text-justify ml-1">{{ $user->athletic ? $user->athletic->athletic_history : '-'}}</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-6 my-md-4 my-2">
                                <div class="d-flex flex-xl-row flex-column justify-content-between align-items-start"
                                     style="background: linear-gradient(to left,#8dbf42 0%,transparent 85%) bottom no-repeat;background-size: 100% 1%">
                                    <h6 class="info-heading mr-xl-2" style="color : #e6ffbf">هدف تمرین</h6>
                                    <p class="info-text text-justify ml-1">{{ $user->athletic ? $user->athletic->target : '-'}}</p>
                                </div>
                            </div>
                            @if($user->athletic && $user->athletic->test())
                                <div class="col-xl-6 col-12 mr-auto mt-2">
                                    <h6 class="info-heading" style="color : #e6ffbf">تست ترکیب بدن</h6>
                                    <div class="overlay-container">
                                        <img src="{{ asset(env('STORAGE_DIR_PATH').env('ATHLETIC_TEST_DIR_PATH').$user->id.'/'.$user->athletic->test()->filename) }}"
                                             class="img-fluid">
                                        <div class="overlay-controls">
                                            <div class="overlay-items">
                                                <a href="#" class="fullscreen">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2"
                                                         stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-maximize-2">
                                                        <polyline points="15 3 21 3 21 9"></polyline>
                                                        <polyline points="9 21 3 21 3 15"></polyline>
                                                        <line x1="21" y1="3" x2="14" y2="10"></line>
                                                        <line x1="3" y1="21" x2="10" y2="14"></line>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            برای ثبت اطلاعات ورزشی خود از قسمت ویرایش اطلاعات اقدام نمایید.
                        @endif
                    </div>
                </div>
            </div>

            <div class="skills layout-spacing">
                <div class="widget-content widget-content-area widget-table-one">
                    <h3>تراکنش‌ها</h3>
                    @php $is_odd=true; @endphp
                    @forelse($user->requests as $request)
                        @php $t = $request->transaction; @endphp
                        <div class="transactions-list">
                            <div class="t-item">
                                <div class="t-company-name">
                                    <div class="t-icon">
                                        @if($request->is_workout_program && !$request->is_nutrition_program)
                                            @php $abbr = 'WP'; @endphp
                                        @elseif(!$request->is_workout_program && $request->is_nutrition_program)
                                            @php $abbr = 'NP'; @endphp
                                        @else
                                            @php $abbr = 'W N'; @endphp
                                        @endif
                                        <div class="t-icon">
                                            <div class="avatar avatar-xl">
                                                <span class="avatar-title rounded-circle @if($is_odd) bg-danger @else bg-warning @endif">{{ $abbr }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="t-name">
                                        <h4>
                                            @if($request->is_workout_program && !$request->is_nutrition_program)
                                                برنامه تمرینی
                                            @elseif(!$request->is_workout_program && $request->is_nutrition_program)
                                                برنامه غذایی
                                            @else
                                                برنامه تمرینی و غذایی
                                            @endif
                                        </h4>
                                        <p class="meta-date">{{ toFaDigits(\Morilog\Jalali\Jalalian::forge($t->created_at)->format('%d %B, H:i')) }}</p>
                                    </div>
                                </div>
                                <div class="t-rate @if($is_odd) rate-inc @else rate-dec @endif">
                                    <p><span>{{ normalize($t->price).' تومان' }}</span></p>
                                </div>
                            </div>
                        </div>
                        @php $is_odd = !$is_odd @endphp
                    @empty
                        تراکنشی به ثبت نرسیده است.
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('cork/plugins/apex/apexcharts.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            var options = {
                chart: {
                    type: 'donut',
                    width: 380
                },
                colors: ['#5c1ac3', '#e2a03f', '#e7515a', '#e2a03f'],
                dataLabels: {
                    enabled: false
                },
                legend: {
                    position: 'bottom',
                    horizontalAlign: 'center',
                    fontFamily: 'iransans_web',
                    fontSize: '14px',
                    markers: {
                        width: 10,
                        height: 10,
                    },
                    itemMargin: {
                        horizontal: 0,
                        vertical: 8
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '65%',
                            background: 'transparent',
                            fontFamily: 'iransans_web',
                            labels: {
                                show: true,
                                fontFamily: 'iransans_web',
                                name: {
                                    show: true,
                                    fontSize: '29px',
                                    fontFamily: 'iransans_web',
                                    color: undefined,
                                    offsetY: -10
                                },
                                value: {
                                    show: true,
                                    fontSize: '26px',
                                    fontFamily: 'iransans_web',
                                    color: '#bfc9d4',
                                    offsetY: 16,
                                    formatter: function (val) {
                                        return val
                                    }
                                },
                                total: {
                                    show: true,
                                    showAlways: true,
                                    label: 'مجموع',
                                    color: '#888ea8',
                                    formatter: function (w) {
                                        return w.globals.seriesTotals.reduce(function (a, b) {
                                            return a + b
                                        }, 0)
                                    }
                                }
                            }
                        }
                    }
                },
                stroke: {
                    show: true,
                    width: 25,
                    colors: '#0e1726'
                },
                series: [parseInt('{{ $user_wp_count }}'), parseInt('{{ $user_np_count }}'), parseInt('{{ $user_unapproved_count }}')],
                labels: ['تمرینی', 'غذایی', 'تایید نشده'],
                responsive: [{
                    breakpoint: 1599,
                    options: {
                        chart: {
                            width: '350px',
                            height: '400px'
                        },
                        legend: {
                            position: 'bottom'
                        }
                    },

                    breakpoint: 1439,
                    options: {
                        chart: {
                            width: '250px',
                            height: '390px'
                        },
                        legend: {
                            position: 'bottom'
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    size: '65%',
                                }
                            }
                        }
                    },
                }]
            }
            var chart = new ApexCharts(
                document.querySelector("#chart-2"),
                options
            );
            chart.render();

            $("a.fullscreen").on("click", function (e) {
                e.preventDefault();
                var link = $(this);
                var src = link.parents(".overlay-container").first().find('img').attr('src');
                $("body").append(
                    $("<div id='blueimp-gallery'></div>")
                        .append($("<img>").attr("src", src))
                        .append($("<span>&times;</span>").addClass("close"))
                );
            });

            $(document).on("click", "#blueimp-gallery .close", function () {
                $(this).parents("#blueimp-gallery").fadeOut(function () {
                    $(this).remove();
                });
            });
        });
    </script>
@endsection
