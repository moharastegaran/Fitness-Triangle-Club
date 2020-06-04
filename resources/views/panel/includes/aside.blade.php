@php
    $roueName = \Illuminate\Support\Facades\Route::currentRouteName();
@endphp

<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            @if(auth()->user()->isAdmin())
                <li class="menu active">
                    <a href="{{ route('panel.dashboard') }}"
                       aria-expanded="{{ strpos($roueName,'panel.dashboard') !== false ? 'true' : 'false' }}"
                       class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span class="iransans-web">داشبورد</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="{{ route('panel.users.index') }}"
                       aria-expanded="{{ strpos($roueName,'admin.users')!==false ? 'true' : 'false' }}"
                       class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span class="iransans-web">کاربران</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="{{ route('panel.admin.workouts.index') }}"
                       aria-expanded="{{ strpos($roueName,'admin.workouts') !== false ? 'true' : 'false' }}"
                       class="dropdown-toggle">
                        <div class="">
                            <!-- Generator: Adobe Illustrator 18.1.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 width="24" height="24" stroke="currentColor" stroke-width="17" stroke-linecap="round"
                                 viewBox="0 0 512.009 512.009" class="feather">
                                <g>
                                    <g>
                                        <path d="M441.071,192.046l-3.729-0.042c-52,0-98.785,29.068-122.577,74.587c-14.966-6.75-31.194-10.587-48.09-10.587
			c-27.913,0-54.163,9.952-74.945,27.285c-0.401-18.324-2.788-36.573-5.117-52.785c-1.995-13.861-3.909-27.31-4.034-38.509
			l53.93,0.009c8.542,0,16.583-3.333,22.625-9.375l42.667-42.667c12.195-12.195,12.279-31.755,0.638-44.289
			c4.066-6.094,6.003-13.393,5.258-20.846c-0.948-9.573-6.083-18.135-14.094-23.469l-25.896-17.26
			c-12.51-8.344-27.083-12.76-42.135-12.76c-31.375,0-60.865,12.219-83.052,34.406C101.654,96.608,69.498,143.4,46.915,194.827
			c-27.208,61.958-41,107.667-41,135.844c0,16.146-1.396,29.26-4.156,38.99c-5.896,20.781,3.385,42.948,22.563,53.906
			c76.823,43.896,164.198,67.104,252.677,67.104h15.427c54.844,0,109.031-8.792,161.063-26.135l7.469-2.5
			c30.531-10.167,51.052-38.635,51.052-70.823V266.765C512.009,226.598,480.186,193.077,441.071,192.046z M490.675,391.213
			c0,22.99-14.656,43.323-36.479,50.594l-7.469,2.5c-49.833,16.604-101.75,25.031-154.302,25.031h-15.427
			c-84.771,0-168.49-22.229-242.094-64.292c-10.646-6.083-15.833-18.24-12.625-29.563c3.302-11.615,4.969-26.698,4.969-44.813
			c0-24.854,13.552-68.854,39.208-127.26c21.5-49,52.167-93.604,91.146-132.583c18.156-18.156,42.292-28.156,67.969-28.156
			c10.823,0,21.302,3.177,30.302,9.177l25.896,17.26c2.677,1.781,4.385,4.635,4.698,7.823c0.323,3.198-0.802,6.323-3.063,8.594
			l-34.073,34.073c-3.646,3.646-9.198,4.542-13.802,2.24c-3.479-1.74-5.833-4.938-6.458-8.781s0.594-7.625,3.344-10.375l9.802-9.802
			c4.167-4.167,4.167-10.917,0-15.083c-4.167-4.167-10.917-4.167-15.083,0l-9.802,9.802c-7.656,7.656-11.063,18.188-9.323,28.885
			c1.74,10.688,8.292,19.594,17.979,24.438c12.813,6.396,28.281,3.917,38.427-6.24l23.332-23.332
			c2.883,4.154,2.668,9.832-1.03,13.53l-42.667,42.667c-1.99,1.99-4.74,3.125-7.542,3.125l-49.807-0.008
			c0.669-1.107,1.311-2.246,2.182-3.117c4.167-4.167,4.167-10.917,0-15.083c-4.167-4.167-10.917-4.167-15.083,0
			c-17.448,17.448-13.208,46.938-8.302,81.083c2.542,17.729,5.177,36.063,5.177,54.458c0,43.938-33.25,53.292-34.667,53.667
			c-5.667,1.469-9.104,7.229-7.677,12.917c1.208,4.854,5.552,8.083,10.333,8.083c0.854,0,1.729-0.104,2.594-0.323
			c12.772-3.191,33.703-15.448,44.224-40.589c0.145-0.194,0.381-0.267,0.516-0.474c17.792-27.521,47.948-43.948,80.677-43.948
			c25.479,0,49.479,9.875,67.573,27.813c4.188,4.146,10.948,4.125,15.083-0.063c4.146-4.188,4.125-10.938-0.063-15.083
			c-4.935-4.893-10.345-9.112-15.939-12.999c20.049-38.836,59.803-63.668,104.012-63.668l3.156,0.042
			c27.667,0.729,50.177,24.677,50.177,53.385V391.213z"/>
                                    </g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>
                            <span class="iransans-web">تمرینات</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="#app" data-toggle="collapse"
                       aria-expanded="{{ (strpos($roueName,'admin.workout-programs') !== false || strpos($roueName,'admin.nutrition-programs') !== false || strpos($roueName,'admin.requests') !== false) ? 'true' : 'false'}}"
                       class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-book">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                            </svg>
                            <span class="iransans-web">برنامه‌ها</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ (strpos($roueName,'admin.workout-programs') !== false || strpos($roueName,'admin.nutrition-programs') !== false || strpos($roueName,'admin.requests') !== false) ? 'show' : '' }}"
                        id="app" data-parent="#accordionExample">
                        <li @if(strpos($roueName,'admin.workout-programs') !== false) class="active" @endif><a
                                    href="{{ route('panel.admin.workout-programs.index') }}">تمرینی</a></li>
                        <li @if(strpos($roueName,'admin.nutrition-programs') !== false) class="active" @endif><a
                                    href="{{ route('panel.admin.nutrition-programs.index') }}">غذایی</a></li>
                        <li @if(strpos($roueName,'panel.requests') !== false) class="active" @endif>
                            <a href="{{ route('panel.requests.index') }}">درخواست‌ها</a></li>
                    </ul>
                </li>
                <li class="menu">
                    <a href="{{ route('panel.admin.articles.index') }}"
                       aria-expanded="{{ strpos($roueName,'admin.articles')!==false ? 'true' : 'false'}}"
                       class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-file">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                            <span class="iransans-web">مقالات</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="{{ route('panel.admin.expenses.edit') }}"
                       aria-expanded="{{ strpos($roueName,'admin.expenses')!==false ? 'true' : 'false'}}"
                       class="dropdown-toggle">
                        <div class="">
                            <svg height="24" viewBox="0 0 64 64" width="24" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-file">
                                <g>
                                    <path d="m62 31h-8.586l9.293-9.293c.391-.391.391-1.023 0-1.414l-19-19c-.391-.391-1.023-.391-1.414 0l-29.707 29.707h-10.586c-.553 0-1 .448-1 1v26c0 .552.447 1 1 1h14.586l3.707 3.707c.195.195.451.293.707.293s.512-.098.707-.293l3.708-3.707h36.585c.553 0 1-.448 1-1v-26c0-.552-.447-1-1-1zm-19-27.586 17.586 17.586-10 10h-7.635c-.229-2.56-1.333-4.938-3.173-6.778-4.288-4.288-11.267-4.289-15.557 0-1.839 1.84-2.943 4.218-3.173 6.778h-5.635zm-15.773 27.586c-.136-.65.046-1.345.53-1.828l1.829 1.828zm10.788 0c-.11-.145-.228-.285-.358-.414-1.561-1.559-4.097-1.56-5.657 0l-2.829-2.828c.756-.755 2.072-.755 2.828 0l1.414-1.414c-.756-.755-1.76-1.171-2.828-1.171s-2.073.416-2.828 1.171l-.001.001-.707-.707-1.414 1.414.707.707c-.879.879-1.268 2.07-1.143 3.243h-2.141c.223-2.025 1.115-3.902 2.576-5.364 3.51-3.509 9.219-3.508 12.729 0 1.461 1.462 2.354 3.339 2.576 5.364h-2.924zm-17.015 29.586-1.586-1.586h3.172zm40-3.586h-58v-24h58z"/>
                                    <path d="m29 48h-2c0 2.206 1.794 4 4 4v1h2v-1c2.206 0 4-1.794 4-4s-1.794-4-4-4v-4c1.103 0 2 .897 2 2h2c0-2.206-1.794-4-4-4v-1h-2v1c-2.206 0-4 1.794-4 4s1.794 4 4 4v4c-1.103 0-2-.897-2-2zm0-6c0-1.103.897-2 2-2v4c-1.103 0-2-.897-2-2zm4 4c1.103 0 2 .897 2 2s-.897 2-2 2z"/>
                                    <path d="m32 56c6.065 0 11-4.935 11-11s-4.935-11-11-11-11 4.935-11 11 4.935 11 11 11zm0-20c4.963 0 9 4.038 9 9s-4.037 9-9 9-9-4.038-9-9 4.037-9 9-9z"/>
                                    <path d="m59 54v-18c0-.552-.447-1-1-1h-12v2h11v16h-11v2h12c.553 0 1-.448 1-1z"/>
                                    <path d="m6 55h12v-2h-11v-16h11v-2h-12c-.553 0-1 .448-1 1v18c0 .552.447 1 1 1z"/>
                                    <path d="m46 49h2v2h-2z"/>
                                    <path d="m50 49h2v2h-2z"/>
                                    <path d="m46 39h2v2h-2z"/>
                                    <path d="m50 39h2v2h-2z"/>
                                    <path d="m43.272 9.414 11.313 11.314-7.778 7.778 1.414 1.414 8.485-8.485c.391-.391.391-1.023 0-1.414l-12.727-12.728c-.375-.375-1.039-.375-1.414 0l-8.485 8.485 1.414 1.414z"/>
                                    <path d="m44.394 24.678h2v2h-2z"
                                          transform="matrix(.707 -.707 .707 .707 -4.861 39.619)"/>
                                    <path d="m47.222 21.849h2v2h-2z"
                                          transform="matrix(.707 -.707 .707 .707 -2.033 40.79)"/>
                                    <path d="m37.322 17.607h2v2h-2z"
                                          transform="matrix(.707 -.707 .707 .707 -1.932 32.548)"/>
                                    <path d="m40.15 14.778h2v2h-2z"
                                          transform="matrix(.707 -.707 .707 .707 .896 33.719)"/>
                                    <path d="m12 39h2v2h-2z"/>
                                    <path d="m16 39h2v2h-2z"/>
                                    <path d="m12 49h2v2h-2z"/>
                                    <path d="m16 49h2v2h-2z"/>
                                </g>
                            </svg>
                            <span class="iransans-web">هزینه‌ها</span>
                        </div>
                    </a>
                </li>
            @else
                <li class="menu active">
                    <a href="{{ route('panel.users.show',auth()->user()) }}"
                       aria-expanded="{{ strpos($roueName,'users.show')!==false ? 'true' : 'false' }}"
                       class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span class="iransans-web">پروفایل من</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="{{ route('panel.users.edit',auth()->user()) }}"
                       aria-expanded="{{ strpos($roueName,'users.edit')!==false ? 'true' : 'false' }}"
                       class="dropdown-toggle">
                        <div class="">
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
                            <span class="iransans-web">ویرایش پروفایل</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="{{ route('panel.requests.index') }}"
                       aria-expanded="{{ strpos($roueName,'panel.requests')!==false ? 'true' : 'false' }}"
                       class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-book">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                            </svg>
                            <span class="iransans-web">برنامه‌های من</span>
                        </div>
                    </a>
                </li>
            @endif
        </ul>
        <!-- <div class="shadow-bottom"></div> -->

    </nav>

</div>