@extends('panel.includes.master')

@section('title','مشاهده کاربر')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.admin.users.index') }}">کاربران</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>مشاهده کاربران</span></li>
@endsection

@section('style')
    <link href="{{ asset('cork/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
            <div class="row layout-spacing">

                <!-- Content -->
                <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                    <div class="user-profile layout-spacing">
                        <div class="widget-content widget-content-area">
                            <div class="d-flex justify-content-between">
                                <h3 class="">پروفایل</h3>
                                {{--<a href="user_account_setting.html" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>--}}
                            </div>
                            <div class="text-center user-info">
                                <img src="{{ asset('cork/assets/img/90x90.jpg') }}" alt="avatar">
                                <p class="">{{ $user->name.' '.$user->family }}</p>
                            </div>
                            <div class="user-info-list">

                                <div class="">
                                    <ul class="contacts-block list-unstyled">
                                        <li class="contacts-block__item">
                                            <svg enable-background="new 0 0 512 512" height="24" viewBox="0 0 512 512" width="24" xmlns="http://www.w3.org/2000/svg"><g><path d="m512 96.145c0-25.691-10.006-49.838-28.174-67.991-33.056-33.028-84.499-37.167-122.094-11.516-37.588-25.595-89.019-21.458-122.078 11.516-12.461 12.451-21.081 27.722-25.268 44.376-22.651-2.427-45.295 3.225-64.139 16.105-37.588-25.588-89.016-21.452-122.073 11.519-18.169 18.153-28.174 42.3-28.174 67.991s10.005 49.837 28.169 67.986l87.478 87.478-14.94 59.761c-1.12 4.48-.113 9.229 2.729 12.869 2.843 3.641 7.204 5.769 11.823 5.769h20.699c2.231 23.032 9.447 36.959 15.946 49.486 6.691 12.897 12.47 24.035 13.198 46.003.269 8.11 6.928 14.503 14.982 14.503.168 0 .337-.003.506-.008 8.28-.274 14.769-7.209 14.495-15.489-.953-28.758-9.24-44.731-16.552-58.824-5.53-10.66-10.473-20.195-12.408-35.67h19.134c4.619 0 8.98-2.128 11.823-5.769 2.842-3.641 3.849-8.389 2.729-12.869l-14.94-59.761 87.474-87.474c6.703-6.698 12.326-14.306 16.751-22.557l38.031 38.031-14.94 59.761c-1.12 4.48-.113 9.229 2.729 12.869 2.843 3.641 7.204 5.769 11.823 5.769h19.155c-1.926 15.782-6.909 25.442-12.485 36.249-7.813 15.143-16.67 32.306-16.67 65.017 0 32.74 8.86 49.925 16.677 65.088 1.274 2.47 2.477 4.803 3.642 7.197 2.596 5.336 7.938 8.44 13.499 8.44 2.202 0 4.438-.486 6.552-1.515 7.449-3.624 10.55-12.602 6.926-20.051-1.317-2.707-2.657-5.307-3.953-7.82-7.159-13.886-13.342-25.878-13.342-51.34 0-25.428 6.177-37.398 13.33-51.261 6.521-12.637 13.764-26.69 15.983-50.005h20.687c4.619 0 8.98-2.128 11.823-5.769 2.842-3.641 3.849-8.389 2.729-12.869l-14.94-59.761 87.474-87.473c18.168-18.154 28.174-42.299 28.174-67.991zm-371.599 252.146c2.82 2.468 6.335 3.718 9.859 3.718s7.039-1.25 9.859-3.718l5.93 23.718h-31.577zm110.736-133.372-100.877 100.877-100.882-100.882c-12.496-12.486-19.378-29.096-19.378-46.769 0-17.674 6.882-34.283 19.369-46.76 24.847-24.781 64.772-25.904 90.895-2.554 5.697 5.092 14.31 5.088 20.003-.009 14.203-12.717 32.818-18.517 51.421-16.402 1.493 23.328 11.286 45.048 27.962 61.711l26.809 26.809c-3.288 8.972-8.493 17.155-15.322 23.979zm94.815 85.089 5.93-23.718c2.82 2.468 6.335 3.718 9.859 3.718s7.039-1.25 9.859-3.718l5.93 23.718zm116.665-157.089-100.877 100.877-100.881-100.882c-12.497-12.485-19.378-29.096-19.378-46.769 0-17.674 6.882-34.283 19.369-46.76 12.898-12.864 29.858-19.353 46.842-19.353 15.734 0 31.49 5.569 44.052 16.799 5.697 5.091 14.31 5.088 20.003-.009 26.118-23.387 66.035-22.265 90.875 2.554 12.496 12.486 19.378 29.095 19.378 46.769 0 17.673-6.882 34.283-19.383 46.774z"/></g></svg>
                                            {{ \Morilog\Jalali\Jalalian::forge($user->birthday)->format('%y %B %d') }}
                                        </li>
                                        {{--<li class="contacts-block__item">--}}
                                            {{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>--}}
                                            {{--Jan 20, 1989--}}
                                        {{--</li>--}}
                                        {{--<li class="contacts-block__item">--}}
                                            {{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>--}}
                                            {{--New York, USA--}}
                                        {{--</li>--}}
                                        <li class="contacts-block__item">
                                            <a href="mailto:{{ $user->email }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                                {{ $user->email }}
                                            </a>
                                        </li>
                                        <li class="contacts-block__item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                            {{ $user->mobile }}
                                        </li>
                                        {{--<li class="contacts-block__item">--}}
                                            {{--<ul class="list-inline">--}}
                                                {{--<li class="list-inline-item">--}}
                                                    {{--<div class="social-icon">--}}
                                                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                                {{--<li class="list-inline-item">--}}
                                                    {{--<div class="social-icon">--}}
                                                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                                {{--<li class="list-inline-item">--}}
                                                    {{--<div class="social-icon">--}}
                                                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--<div class="education layout-spacing ">--}}
                        {{--<div class="widget-content widget-content-area">--}}
                            {{--<h3 class="">Education</h3>--}}
                            {{--<div class="timeline-alter">--}}
                                {{--<div class="item-timeline">--}}
                                    {{--<div class="t-meta-date">--}}
                                        {{--<p class="">04 Mar 2009</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="t-dot" data-original-title="" title="">--}}
                                    {{--</div>--}}
                                    {{--<div class="t-text">--}}
                                        {{--<p>Royal Collage of Art</p>--}}
                                        {{--<p>Designer Illustrator</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="item-timeline">--}}
                                    {{--<div class="t-meta-date">--}}
                                        {{--<p class="">25 Apr 2014</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="t-dot" data-original-title="" title="">--}}
                                    {{--</div>--}}
                                    {{--<div class="t-text">--}}
                                        {{--<p>Massachusetts Institute of Technology (MIT)</p>--}}
                                        {{--<p>Designer Illustrator</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="item-timeline">--}}
                                    {{--<div class="t-meta-date">--}}
                                        {{--<p class="">04 Apr 2018</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="t-dot" data-original-title="" title="">--}}
                                    {{--</div>--}}
                                    {{--<div class="t-text">--}}
                                        {{--<p>School of Art Institute of Chicago (SAIC)</p>--}}
                                        {{--<p>Designer Illustrator</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="work-experience layout-spacing ">--}}

                        {{--<div class="widget-content widget-content-area">--}}

                            {{--<h3 class="">Work Experience</h3>--}}

                            {{--<div class="timeline-alter">--}}

                                {{--<div class="item-timeline">--}}
                                    {{--<div class="t-meta-date">--}}
                                        {{--<p class="">04 Mar 2009</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="t-dot" data-original-title="" title="">--}}
                                    {{--</div>--}}
                                    {{--<div class="t-text">--}}
                                        {{--<p>Netfilx Inc.</p>--}}
                                        {{--<p>Designer Illustrator</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="item-timeline">--}}
                                    {{--<div class="t-meta-date">--}}
                                        {{--<p class="">25 Apr 2014</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="t-dot" data-original-title="" title="">--}}
                                    {{--</div>--}}
                                    {{--<div class="t-text">--}}
                                        {{--<p>Google Inc.</p>--}}
                                        {{--<p>Designer Illustrator</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="item-timeline">--}}
                                    {{--<div class="t-meta-date">--}}
                                        {{--<p class="">04 Apr 2018</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="t-dot" data-original-title="" title="">--}}
                                    {{--</div>--}}
                                    {{--<div class="t-text">--}}
                                        {{--<p>Design Reset Inc.</p>--}}
                                        {{--<p>Designer Illustrator</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}

                </div>

                <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

                    <div class="skills layout-spacing">
                        <div class="widget-content widget-content-area">
                            <h3 class="">مشخصات پزشکی</h3>
                            {{--<div class="progress br-30">--}}
                                {{--<div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>PHP</span> <span>25%</span> </div></div>--}}
                            {{--</div>--}}
                            {{--<div class="progress br-30">--}}
                                {{--<div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>Wordpress</span> <span>50%</span> </div></div>--}}
                            {{--</div>--}}
                            {{--<div class="progress br-30">--}}
                                {{--<div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>Javascript</span> <span>70%</span> </div></div>--}}
                            {{--</div>--}}
                            {{--<div class="progress br-30">--}}
                                {{--<div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>jQuery</span> <span>60%</span> </div></div>--}}
                            {{--</div>--}}

                        </div>
                    </div>

                    <div class="bio layout-spacing ">
                        <div class="widget-content widget-content-area">
                            <h3 class="">Bio</h3>
                            <p>I'm Web Developer from California. I code and design websites worldwide. Mauris varius tellus vitae tristique sagittis. Sed aliquet, est nec auctor aliquet, orci ex vestibulum ex, non pharetra lacus erat ac nulla.</p>

                            <p>Sed vulputate, ligula eget mollis auctor, lectus elit feugiat urna, eget euismod turpis lectus sed ex. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ut velit finibus, scelerisque sapien vitae, pharetra est. Nunc accumsan ligula vehicula scelerisque vulputate.</p>

                            <div class="bio-skill-box">

                                <div class="row">

                                    <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">

                                        <div class="d-flex b-skills">
                                            <div>
                                            </div>
                                            <div class="">
                                                <h5>Sass Applications</h5>
                                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse eu fugiat nulla pariatur.</p>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">

                                        <div class="d-flex b-skills">
                                            <div>
                                            </div>
                                            <div class="">
                                                <h5>Github Countributer</h5>
                                                <p>Ut enim ad minim veniam, quis nostrud exercitation aliquip ex ea commodo consequat.</p>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-12 col-xl-6 col-lg-12 mb-xl-0 mb-5 ">

                                        <div class="d-flex b-skills">
                                            <div>
                                            </div>
                                            <div class="">
                                                <h5>Photograhpy</h5>
                                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia anim id est laborum.</p>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-12 col-xl-6 col-lg-12 mb-xl-0 mb-0 ">

                                        <div class="d-flex b-skills">
                                            <div>
                                            </div>
                                            <div class="">
                                                <h5>Mobile Apps</h5>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do et dolore magna aliqua.</p>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>

@endsection
