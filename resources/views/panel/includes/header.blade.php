<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">

        <ul class="navbar-item theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="#" class="d-md-none d-block">
                    <img src="{{ asset('cork/assets/img/logo1.png') }}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="#" class="nav-link"> <img src="{{ asset('cork/assets/img/logo2.png') }}" height="45"> </a>
            </li>
        </ul>

        <ul class="navbar-item flex-row ml-md-auto">

            {{--<li class="nav-item dropdown message-dropdown">--}}
            {{--<a href="javascript:void(0);" class="nav-link dropdown-toggle" id="messageDropdown"--}}
            {{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
            {{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
            {{--stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
            {{--class="feather feather-mail">--}}
            {{--<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>--}}
            {{--<polyline points="22,6 12,13 2,6"></polyline>--}}
            {{--</svg>--}}
            {{--</a>--}}
            {{--<div class="dropdown-menu p-0 position-absolute" aria-labelledby="messageDropdown">--}}
            {{--<div class="">--}}
            {{--<a class="dropdown-item">--}}
            {{--<div class="">--}}

            {{--<div class="media">--}}
            {{--<div class="user-img">--}}
            {{--<img class="usr-img rounded-circle"--}}
            {{--src="{{ asset('cork/assets/img/90x90.jpg') }}" alt="profile">--}}
            {{--</div>--}}
            {{--<div class="media-body">--}}
            {{--<div class="">--}}
            {{--<h5 class="usr-name">Kara Young</h5>--}}
            {{--<p class="msg-title">ACCOUNT UPDATE</p>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--</div>--}}
            {{--</a>--}}
            {{--<a class="dropdown-item">--}}
            {{--<div class="">--}}

            {{--<div class="media">--}}
            {{--<div class="user-img">--}}
            {{--<img class="usr-img rounded-circle"--}}
            {{--src="{{ asset('cork/assets/img/90x90.jpg') }}" alt="profile">--}}
            {{--</div>--}}
            {{--<div class="media-body">--}}
            {{--<div class="">--}}
            {{--<h5 class="usr-name">Daisy Anderson</h5>--}}
            {{--<p class="msg-title">ACCOUNT UPDATE</p>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--</div>--}}
            {{--</a>--}}
            {{--<a class="dropdown-item">--}}
            {{--<div class="">--}}

            {{--<div class="media">--}}
            {{--<div class="user-img">--}}
            {{--<img class="usr-img rounded-circle"--}}
            {{--src="{{ asset('cork/assets/img/90x90.jpg') }}" alt="profile">--}}
            {{--</div>--}}
            {{--<div class="media-body">--}}
            {{--<div class="">--}}
            {{--<h5 class="usr-name">Oscar Garner</h5>--}}
            {{--<p class="msg-title">ACCOUNT UPDATE</p>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--</div>--}}
            {{--</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</li>--}}

            @php
                $notifications = auth()->user()->newMembers();
            @endphp

            <li class="nav-item dropdown notification-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-bell">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                    @if(count($notifications)) <span class="badge badge-success"></span> @endif
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">
                    <div class="notification-scroll">
                        @forelse($notifications as $notification)
                            <div class="dropdown-item">
                                <a href="{{ route('panel.admin.users.show',$notification->data['user']['id']) }}">
                                    <div class="media">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-user-plus">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="8.5" cy="7" r="4"></circle>
                                            <line x1="20" y1="8" x2="20" y2="14"></line>
                                            <line x1="23" y1="11" x2="17" y2="11"></line>
                                        </svg>
                                        <div class="media-body">
                                            <div class="notification-para">
                                                <span class="user-name">{{ $notification->data['user']['name'].' '.$notification->data['user']['family'] }}</span>
                                                به سایت پیوست
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="dropdown-item text-light">
                                اعلان جدیدی وجود ندارد
                            </div>
                        @endforelse
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown user-profile-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img src="{{ asset('cork/assets/img/90x90.jpg') }}" alt="avatar">
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="">
                        {{--<div class="dropdown-item">--}}
                        {{--<a href="user_profile.html">--}}
                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                        {{--fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                        {{--stroke-linejoin="round" class="feather feather-user">--}}
                        {{--<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>--}}
                        {{--<circle cx="12" cy="7" r="4"></circle>--}}
                        {{--</svg>--}}
                        {{--My Profile</a>--}}
                        {{--</div>--}}
                        {{--<div class="dropdown-item">--}}
                        {{--<a href="apps_mailbox.html">--}}
                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                        {{--fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                        {{--stroke-linejoin="round" class="feather feather-inbox">--}}
                        {{--<polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>--}}
                        {{--<path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>--}}
                        {{--</svg>--}}
                        {{--Inbox</a>--}}
                        {{--</div>--}}
                        {{--<div class="dropdown-item">--}}
                        {{--<a href="auth_lockscreen.html">--}}
                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                        {{--fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                        {{--stroke-linejoin="round" class="feather feather-lock">--}}
                        {{--<rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>--}}
                        {{--<path d="M7 11V7a5 5 0 0 1 10 0v4"></path>--}}
                        {{--</svg>--}}
                        {{--Lock Screen</a>--}}
                        {{--</div>--}}
                        <div class="dropdown-item">
                            <a href="{{ route('panel.admin.logout') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                خروج
                            </a>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
    </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN NAVBAR  -->
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>

        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">

                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @yield('breadcrumb')
                        </ol>
                    </nav>

                </div>
            </li>
        </ul>
        {{--@if(strpos(Route::currentRouteName(),'index') == false || strpos(Route::currentRouteName(),'dashboard') == false)--}}
            {{--<ul class="navbar-nav flex-row ml-auto ">--}}
                {{--<li class="d-block mx-2">--}}
                    {{--<a href="{{ URL::previous() }}">--}}
                        {{--بازگشت--}}
                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                        {{--fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                        {{--stroke-linejoin="round" class="feather feather-arrow-left">--}}
                        {{--<line x1="19" y1="12" x2="5" y2="12"></line>--}}
                        {{--<polyline points="12 19 5 12 12 5"></polyline>--}}
                        {{--</svg>--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--@endif--}}
        {{--<li class="nav-item more-dropdown">--}}
        {{--<div class="dropdown  custom-dropdown-icon">--}}
        {{--<a class="dropdown-toggle btn" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Settings</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>--}}

        {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">--}}
        {{--<a class="dropdown-item" data-value="Settings" href="javascript:void(0);">Settings</a>--}}
        {{--<a class="dropdown-item" data-value="Mail" href="javascript:void(0);">Mail</a>--}}
        {{--<a class="dropdown-item" data-value="Print" href="javascript:void(0);">Print</a>--}}
        {{--<a class="dropdown-item" data-value="Download" href="javascript:void(0);">Download</a>--}}
        {{--<a class="dropdown-item" data-value="Share" href="javascript:void(0);">Share</a>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</li>--}}
        {{--</ul>--}}
    </header>
</div>