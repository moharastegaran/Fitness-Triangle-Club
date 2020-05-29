@extends('panel.includes.master')

@section('title','مشاهده کاربر')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.admin.users.index') }}">کاربران</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>مشاهده کاربر</span></li>
@endsection

@section('style')
    <link href="{{ asset('cork/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    @php
        $user = auth()->user();
    @endphp
    <div class="row layout-spacing">

        <!-- Content -->
        <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

            <div class="user-profile layout-spacing">
                <div class="widget-content widget-content-area">
                    <div class="d-flex justify-content-between">
                        <h3 class="">پروفایل</h3>
                        <a href="/edit" class="mt-2 edit-profile">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-edit-3">
                                <path d="M12 20h9"></path>
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="text-center user-info">
                        <img src="{{ asset(env('STORAGE_DIR_PATH').env('AVATAR_DIR_PATH').$user->id.'/'.$user->avatar()) }}" alt="avatar" width="100" height="100">
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
                                    {{ \Morilog\Jalali\Jalalian::forge($user->birthday)->format('%d %B %Y') }}
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
                                        {{ $user->email }}
                                    </a>
                                </li>
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-phone">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                    {{ $user->mobile }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

            <div class="skills layout-spacing">
                <div class="widget-content widget-content-area">
                    <h3 class="">مشخصات پزشکی</h3>
                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="col-md-3 col-sm-6 col-12 my-2">
                            <div class="d-flex justify-content-between align-items-center"
                                 style="background: linear-gradient(to left,#8dbf42 0%,transparent 85%) bottom no-repeat;background-size: 100% 1%">
                                <h6 class="info-heading" style="color : #e6ffbf">گروه خونی</h6>
                                <p class="info-text">{{ $user->medical ? $user->medical->blood_type : '-'}}</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12 my-2">
                            <div class="d-flex justify-content-between align-items-center"
                                 style="background: linear-gradient(to left,#8dbf42 0%,transparent 85%) bottom no-repeat;background-size: 100% 1%">
                                <h6 class="info-heading" style="color: #e6ffbf">قد<span
                                            style="font-size: 11px">(cm) </span></h6>
                                <p class="info-text">{{ $user->medical ? $user->medical->height : '-'}}</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12 my-2">
                            <div class="d-flex justify-content-between align-items-center"
                                 style="background: linear-gradient(to left,#8dbf42 0%,transparent 85%) bottom no-repeat;background-size: 100% 1%">
                                <h6 class="info-heading" style="color : #e6ffbf">وزن<span
                                            style="font-size: 11px">(kg) </span></h6>
                                <p class="info-text">{{ $user->medical ? $user->medical->weight : '-'}}</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 my-md-4 my-2">
                            <div class="d-flex justify-content-between align-items-start"
                                 style="background: linear-gradient(to left,#8dbf42 0%,transparent 85%) bottom no-repeat;background-size: 100% 1%">
                                <h6 class="info-heading" style="color : #e6ffbf">سابقه بیماری</h6>
                                <p class="info-text text-justify ml-1">{{ $user->medical ? $user->medical->disease_history : '-'}}</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 my-md-4 my-2">
                            <div class="d-flex justify-content-between align-items-start"
                                 style="background: linear-gradient(to left,#8dbf42 0%,transparent 85%) bottom no-repeat;background-size: 100% 1%">
                                <h6 class="info-heading" style="color : #e6ffbf">سابقه مصدومیت</h6>
                                <p class="info-text text-justify ml-1">{{ $user->medical ? $user->medical->injury_history : '-'}}</p>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <h6 class="info-heading" style="color : #e6ffbf">برگه آزمایش</h6>
                            <img src="{{ asset('images/body-builder-1.jpg') }}" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>

            <div class="bio layout-spacing ">
                <div class="widget-content widget-content-area">
                    <h3 class="">مشخصات ورزشی</h3>
                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="col-md-6 col-12 my-md-4 my-2">
                            <div class="d-flex justify-content-between align-items-start"
                                 style="background: linear-gradient(to left,#8dbf42 0%,transparent 85%) bottom no-repeat;background-size: 100% 1%">
                                <h6 class="info-heading" style="color : #e6ffbf">سابقه تمرینی</h6>
                                <p class="info-text text-justify ml-1">{{ $user->athletic ? $user->athletic->athletic_history : '-'}}</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 my-md-4 my-2">
                            <div class="d-flex justify-content-between align-items-start"
                                 style="background: linear-gradient(to left,#8dbf42 0%,transparent 85%) bottom no-repeat;background-size: 100% 1%">
                                <h6 class="info-heading" style="color : #e6ffbf">هدف از تمرین</h6>
                                <p class="info-text text-justify ml-1">{{ $user->athletic ? $user->athletic->target : '-'}}</p>
                            </div>
                        </div>
                        <div class="col-12 mt-2 mb-4">
                            <h6 class="info-heading" style="color : #e6ffbf">تست ترکیب بدن</h6>
                            <img src="{{ asset('images/body-builder-1.jpg') }}" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
