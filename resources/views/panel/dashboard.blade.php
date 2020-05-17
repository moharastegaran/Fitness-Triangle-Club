@extends('panel.includes.master')

@section('title','پنل ادمین')

@section('breadcrumb')
    <li class="breadcrumb-item active"><span>داشبورد</span></li>
@endsection

@section('style')
    <link href="{{ asset('cork/assets/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    <div class="col-md-3 col-sm-6 col-12 my-2">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="">
                        <div class="w-icon bg-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-file">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                        </div>
                    </div>
                    <div class="w-info">
                        <h6 class="value">{{ toFaDigits('0') }}</h6>
                        <p class="">درخواست برنامه جدید</p>
                    </div>
                </div>
                <div class="w-footer">
                    <a href="#" class="w-100 btn btn-sm btn-rounded"
                       style="background-image: linear-gradient(to left, #7579ff 0%, #b224ef 100%);">بیشتر</a>
                    {{--<div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-12 my-2">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="">
                        <div class="w-icon bg-warning">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 width="30" height="30" stroke="#ddd" stroke-width="17" stroke-linecap="round"
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
                        </div>
                    </div>
                    <div class="w-info">
                        <h6 class="value">{{ toFaDigits(count(\App\Workout::all())) }}</h6>
                        <p class="">تمرین‌های ثبت‌شده</p>
                    </div>
                </div>
                <div class="w-footer">
                    <a href="{{ route('panel.admin.workouts.index') }}" class="w-100 btn btn-sm btn-rounded"
                       style="background-image: linear-gradient(to left, #f09819 0%, #ff5858 100%);">بیشتر</a>
                    {{--<div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-12 my-2">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="">
                        <div class="w-icon bg-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="w-info">
                        <h6 class="value">{{ toFaDigits(count(\App\User::all())) }}</h6>
                        <p class="">کاربران ثبت‌شده</p>
                    </div>
                </div>
                <div class="w-footer">
                    <a href="{{ route('panel.admin.users.index') }}" class="w-100 btn btn-sm btn-rounded"
                       style="background-image: linear-gradient(to left, #d09693 0%, #c71d6f 100%);">بیشتر</a>
                    {{--<div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-12 my-2">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="">
                        <div class="w-icon bg-primary">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                 x="0px" y="0px"
                                 fill="#eee" width="30" height="30" viewBox="0 0 512 512"
                                 style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M172.55,391.902c-0.13-0.64-0.32-1.27-0.57-1.88c-0.25-0.6-0.56-1.18-0.92-1.72c-0.36-0.55-0.78-1.06-1.24-1.52
                            c-0.46-0.46-0.97-0.88-1.52-1.24c-0.54-0.36-1.12-0.67-1.73-0.92c-0.6-0.25-1.23-0.45-1.87-0.57c-1.29-0.26-2.62-0.26-3.9,0
                            c-0.64,0.12-1.27,0.32-1.88,0.57c-0.6,0.25-1.18,0.56-1.72,0.92c-0.55,0.36-1.06,0.78-1.52,1.24c-0.46,0.46-0.88,0.97-1.24,1.52
                            c-0.37,0.54-0.67,1.12-0.92,1.72c-0.25,0.61-0.45,1.24-0.57,1.88c-0.13,0.64-0.2,1.3-0.2,1.95c0,0.65,0.07,1.31,0.2,1.95
                            c0.12,0.64,0.32,1.27,0.57,1.87c0.25,0.61,0.55,1.19,0.92,1.73c0.36,0.55,0.78,1.06,1.24,1.52c0.46,0.46,0.97,0.88,1.52,1.24
                            c0.54,0.361,1.12,0.671,1.72,0.921c0.61,0.25,1.24,0.45,1.88,0.57c0.64,0.13,1.3,0.2,1.95,0.2c0.65,0,1.31-0.07,1.95-0.2
                            c0.64-0.12,1.27-0.32,1.87-0.57c0.61-0.25,1.19-0.561,1.73-0.921c0.55-0.36,1.06-0.78,1.52-1.24c0.46-0.46,0.88-0.97,1.24-1.52
                            c0.36-0.54,0.67-1.12,0.92-1.73c0.25-0.6,0.44-1.23,0.57-1.87s0.2-1.3,0.2-1.95S172.68,392.542,172.55,391.902z"/>
                                </g>
                            </g>
                                <g>
                                    <g>
                                        <path d="M459.993,394.982c-0.039-0.1-0.079-0.199-0.121-0.297c-9.204-21.537-30.79-29.497-56.336-20.772l-69.668,19.266
                            c-4.028-12.198-14.075-22.578-28.281-27.85c-0.088-0.032-0.176-0.064-0.265-0.094l-76.581-25.992
                            c-6.374-8.239-26.34-29.321-63.723-29.321c-26.125,0-49.236,17.922-62.458,37.457H10c-5.523,0-10,4.477-10,10v126.077
                            c0,5.523,4.477,10,10,10h59.457c5.523,0,10-4.477,10-10v-8.634h27.883c5.523,0,10-4.477,10-10v-2.878
                            c16.254,1.418,21.6,4.501,36.528,13.109c11.48,6.62,28.831,16.625,60.077,30.674c0.145,0.065,0.292,0.127,0.439,0.185
                            c5.997,2.359,17.72,6.065,32.173,6.065c10.06,0,21.445-1.797,33.131-7.094l153.991-55.136c0.274-0.098,0.544-0.208,0.808-0.33
                            C449.204,442.646,471.135,423.563,459.993,394.982z M59.457,473.455H20V367.378h39.457V473.455z M97.34,454.821H79.457v-87.443
                            H97.34V454.821z M426.496,431.074l-153.922,55.111c-0.135,0.048-0.318,0.12-0.451,0.174c-0.135,0.055-0.27,0.113-0.403,0.174
                            c-21.437,9.852-41.814,3.954-49.8,0.849c-30.182-13.581-46.291-22.87-58.061-29.657c-16.364-9.436-24.249-13.984-46.519-15.823
                            V361.36c9.479-15.536,27.861-31.439,47.679-31.439c33.986,0,48.387,22.105,48.953,22.997c1.221,1.986,3.098,3.483,5.305,4.232
                            l79.475,26.974c12.693,4.764,19.401,15.634,16.318,26.474c-1.423,5.006-4.711,9.158-9.257,11.691
                            c-4.507,2.511-9.717,3.132-14.683,1.758l-89.593-28.392c-5.268-1.669-10.886,1.247-12.554,6.512
                            c-1.669,5.265,1.247,10.885,6.512,12.554l89.749,28.441c0.095,0.03,0.19,0.059,0.286,0.086c3.583,1.019,7.231,1.523,10.857,1.523
                            c6.638,0,13.203-1.691,19.161-5.011c9.213-5.133,15.875-13.547,18.759-23.692c0.23-0.81,0.434-1.62,0.611-2.43l75.083-20.8
                            c10.844-3.704,25.079-5.039,31.417,9.558C447.978,419.533,430.928,428.96,426.496,431.074z"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M359.06,131.543c-0.13-0.64-0.32-1.27-0.58-1.88c-0.25-0.6-0.55-1.18-0.92-1.72c-0.36-0.55-0.78-1.06-1.24-1.52
                            c-0.46-0.46-0.97-0.88-1.52-1.24c-0.54-0.36-1.12-0.67-1.72-0.92c-0.61-0.25-1.24-0.45-1.87-0.57c-1.29-0.26-2.62-0.26-3.91,0
                            c-0.64,0.12-1.27,0.32-1.87,0.57c-0.61,0.25-1.19,0.56-1.73,0.92c-0.55,0.36-1.06,0.78-1.52,1.24c-0.46,0.46-0.88,0.97-1.24,1.52
                            c-0.36,0.54-0.67,1.12-0.92,1.72c-0.25,0.61-0.45,1.24-0.57,1.88c-0.13,0.64-0.2,1.3-0.2,1.95c0,0.65,0.07,1.31,0.2,1.95
                            c0.12,0.64,0.32,1.27,0.57,1.87c0.25,0.61,0.56,1.19,0.92,1.73c0.36,0.55,0.78,1.06,1.24,1.52c0.46,0.46,0.97,0.88,1.52,1.24
                            c0.54,0.36,1.12,0.67,1.73,0.92c0.6,0.25,1.23,0.44,1.87,0.57s1.3,0.2,1.95,0.2c0.65,0,1.31-0.07,1.96-0.2
                            c0.63-0.13,1.26-0.32,1.87-0.57c0.6-0.25,1.18-0.56,1.72-0.92c0.55-0.36,1.06-0.78,1.52-1.24c0.46-0.46,0.88-0.97,1.24-1.52
                            c0.37-0.54,0.67-1.12,0.92-1.73c0.26-0.6,0.45-1.23,0.58-1.87c0.13-0.64,0.19-1.3,0.19-1.95
                            C359.25,132.843,359.19,132.183,359.06,131.543z"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M502,33.891h-59.457c-5.523,0-10,4.477-10,10v8.634H404.66c-5.523,0-10,4.477-10,10v2.878
                            c-16.254-1.419-21.6-4.501-36.527-13.109c-11.48-6.62-28.831-16.625-60.078-30.674c-0.145-0.066-0.291-0.127-0.44-0.185
                            c-10.171-4.002-36.828-11.876-65.299,1.027l-40.24,14.408L158.157,2.952c-3.905-3.905-10.237-3.905-14.142,0L32.657,114.309
                            c-3.602,3.603-4.293,9.85,0,14.143l190.287,190.287c3.045,3.046,10.175,3.967,14.143,0l101.665-101.664
                            c2.643,0.228,5.386,0.351,8.229,0.351c26.126,0,49.236-17.922,62.457-37.456H502c5.523,0,10-4.477,10-10V43.891
                            C512,38.368,507.523,33.891,502,33.891z M151.085,24.165l22.792,22.792c-6.775,4.19-14.608,6.432-22.792,6.432
                            c-8.185,0-16.017-2.241-22.792-6.432L151.085,24.165z M76.663,144.173L53.871,121.38l22.792-22.792
                            c4.19,6.775,6.432,14.608,6.432,22.792C83.095,129.564,80.854,137.397,76.663,144.173z M230.016,297.525l-22.788-22.788
                            c13.913-8.586,31.661-8.586,45.575,0L230.016,297.525z M267.211,260.331c-22.098-16.03-52.292-16.03-74.39,0L91.07,158.579
                            c7.809-10.74,12.025-23.641,12.025-37.199c0-13.559-4.215-26.459-12.025-37.199l22.817-22.816
                            c10.74,7.809,23.64,12.025,37.199,12.025c13.559,0,26.459-4.216,37.199-12.025l21.629,21.629
                            c-4.667,0.689-9.218,2.227-13.462,4.592c-7.168,3.994-12.792,9.975-16.294,17.211c-11.28,2.089-21.723,7.55-29.915,15.741
                            c-22.225,22.226-22.225,58.389,0.001,80.615c11.112,11.112,25.709,16.669,40.307,16.669c14.597,0,29.195-5.556,40.308-16.669
                            c7.23-7.23,12.295-16.116,14.832-25.8l33.764,11.459c-3.801,17.608,0.092,36.132,10.593,50.682L267.211,260.331z M206.413,162.018
                            c0.088,0.032,0.176,0.064,0.265,0.094l19.996,6.787c-1.51,6.815-4.927,13.081-9.957,18.112c-14.428,14.426-37.904,14.428-52.33,0
                            c-14.428-14.427-14.428-37.902,0-52.33c3.48-3.482,7.587-6.203,12.062-8.048C178.295,141.995,189.356,155.688,206.413,162.018z
                            M304.457,223.084c-3.86-6.29-6.044-13.469-6.389-20.796c4.79,3.463,10.644,6.856,17.636,9.549L304.457,223.084z M394.659,165.983
                            c-9.478,15.538-27.86,31.441-47.678,31.441c-3.708,0-7.183-0.264-10.432-0.734c-0.013-0.002-0.026-0.004-0.039-0.006
                            c-21.596-3.137-33.213-15.411-37.042-20.271c-0.204-0.3-1.073-1.437-1.202-1.626c-1.165-2.082-3.075-3.756-5.511-4.583
                            l-79.508-26.985c-12.688-4.762-19.395-15.627-16.321-26.463c0.002-0.007,0.004-0.014,0.006-0.021
                            c0.003-0.008,0.005-0.017,0.007-0.025c1.429-4.99,4.711-9.129,9.247-11.656c4.506-2.511,9.715-3.134,14.683-1.757l89.593,28.391
                            c5.266,1.671,10.886-1.247,12.554-6.512c1.668-5.265-1.247-10.885-6.512-12.554l-71.255-22.58l-0.622-0.622
                            c-0.006-0.006-0.012-0.013-0.019-0.019l-36.89-36.89l31.708-11.354c0.107-0.039,0.239-0.088,0.345-0.131
                            c0.027-0.011,0.079-0.031,0.105-0.042c0.136-0.055,0.27-0.113,0.403-0.174c21.436-9.852,41.812-3.955,49.799-0.849
                            c30.183,13.581,46.293,22.87,58.063,29.657c16.364,9.437,24.249,13.984,46.518,15.823V165.983z M432.543,159.968H414.66V72.525
                            h17.883V159.968z M492,159.968h-39.457V53.891H492V159.968z"/>
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
                        </div>
                    </div>
                    <div class="w-info">
                        <h6 class="value">{{ toFaDigits('13,000,000').' ریال' }}</h6>
                        <p class="">مبالغ واریز‌شده</p>
                    </div>
                </div>
                <div class="w-footer">
                    <a href="#" class="w-100 btn btn-sm btn-rounded"
                       style="background-image: linear-gradient(to left, #0081ff 0%, #0045ff 100%);">بیشتر</a>
                    {{--<div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>--}}
                </div>
            </div>
        </div>
    </div>

@endsection
