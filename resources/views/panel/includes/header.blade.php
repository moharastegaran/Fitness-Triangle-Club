<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">

        <ul class="navbar-item theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="{{ route('website.index') }}" class="d-md-none d-block">
                    <img src="{{ asset('cork/assets/img/logo1.png') }}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="{{ route('website.index') }}" class="nav-link"> <img src="{{ asset('cork/assets/img/logo2.png') }}" height="45"> </a>
            </li>
        </ul>

        <ul class="navbar-item flex-row align-items-center ml-md-auto">

            {{ auth()->user()->name.' '.auth()->user()->family }}

            @php
                $notifications = auth()->user()->newMembers();
            @endphp

            @if(auth()->user()->isAdmin())
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
                                    <a href="{{ route('panel.users.show',$notification->data['user']['id']) }}">
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
            @endif

            <li class="nav-item dropdown user-profile-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img src="{{ asset(($a=auth()->user()->avatar()) ? env('STORAGE_DIR_PATH').env('AVATAR_DIR_PATH').auth()->user()->id.'/'.$a :'icons/user.png') }}"
                         class="img-fluid" alt="avatar" width="90" height="90">
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="">
                        <div class="dropdown-item">
                            <a href="{{ route('panel.users.show',auth()->user()->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                پروفایل من</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="{{ route('panel.users.edit',auth()->user()->id) }}">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                     viewBox="0 0 29.643 29.643" fill="none" stroke="currentColor" stroke-width="1.5"
                                     stroke-linecap="round"
                                     stroke-linejoin="round" class="feather">
                                    <g>
                                        <path d="M18.621,12.397l-0.546-1.295c0,0,1.267-2.859,1.157-2.969l-1.678-1.639c-0.117-0.113-2.978,1.191-2.978,1.191l-1.32-0.533
		c0,0-1.169-2.898-1.327-2.898h-2.37c-0.164,0-1.242,2.906-1.242,2.906L6.998,7.695c0,0-2.922-1.242-3.034-1.135L2.287,8.203
		c-0.116,0.115,1.219,2.916,1.219,2.916l-0.544,1.295c0,0-2.962,1.139-2.962,1.295v2.322c0,0.16,2.969,1.217,2.969,1.217
		l0.545,1.291c0,0-1.268,2.861-1.157,2.971l1.679,1.641c0.113,0.111,2.976-1.195,2.976-1.195l1.321,0.537
		c0,0,1.166,2.896,1.326,2.896h2.37c0.163,0,1.244-2.906,1.244-2.906l1.32-0.535c0,0,2.918,1.242,3.031,1.135l1.678-1.643
		c0.115-0.111-1.221-2.914-1.221-2.914l0.546-1.295c0,0,2.963-1.143,2.963-1.299v-2.32C21.591,13.453,18.621,12.397,18.621,12.397z
		 M10.795,18.207c-1.905,0-3.459-1.52-3.459-3.387c0-1.865,1.554-3.385,3.459-3.385c1.908,0,3.459,1.52,3.459,3.385
		C14.254,16.688,12.703,18.207,10.795,18.207z"/>
                                        <path d="M28.538,9.693l0.014-0.676c0,0,1.118-1.006,1.091-1.076l-0.414-1.048c-0.031-0.072-1.544-0.062-1.544-0.062l-0.474-0.492
		c0,0,0.058-1.502-0.013-1.533l-1.041-0.467c-0.074-0.033-1.117,1.035-1.117,1.035l-0.684-0.027c0,0-1.039-1.119-1.109-1.092
		l-1.061,0.393c-0.071,0.025-0.036,1.518-0.036,1.518l-0.495,0.463c0,0-1.523-0.082-1.554-0.014l-0.457,1.02
		c-0.032,0.072,1.065,1.119,1.065,1.119l-0.014,0.672c0,0-1.117,1.008-1.09,1.078l0.415,1.049c0.03,0.07,1.543,0.059,1.543,0.059
		l0.473,0.494c0,0-0.055,1.502,0.016,1.533l1.041,0.465c0.072,0.033,1.116-1.029,1.116-1.029l0.685,0.023
		c0,0,1.037,1.119,1.109,1.094l1.058-0.393c0.073-0.025,0.038-1.52,0.038-1.52l0.494-0.459c0,0,1.523,0.078,1.555,0.01l0.457-1.02
		C29.634,10.74,28.538,9.693,28.538,9.693z M26.145,9.9c-0.367,0.82-1.347,1.184-2.187,0.809c-0.836-0.373-1.22-1.346-0.853-2.168
		c0.365-0.818,1.348-1.18,2.184-0.807C26.126,8.111,26.51,9.082,26.145,9.9z"/>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                    </g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                </svg>
                                ویرایش پروفایل</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="{{ route(auth()->user()->isAdmin() ? 'panel.admin.logout' : 'website.users.logout') }}">
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