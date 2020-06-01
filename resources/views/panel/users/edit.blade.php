@extends('panel.includes.master')

@section('title','ویرایش اطلاعات کاربر')

@section('breadcrumb')
    @if(auth()->user()->isAdmin())
        <li class="breadcrumb-item"><a href="{{ route('panel.users.index') }}">کاربران</a></li>
    @endif
    <li class="breadcrumb-item active" aria-current="page"><span>ویرایش پروفایل</span></li>
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('cork/assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="col-12 account-settings-container layout-top-spacing">
        <form method="post" action="{{ route('panel.users.update',$user->id) }}" enctype="multipart/form-data"
              class="ml-auto">
            @csrf
            @method('PUT')
            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll"
                     data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info">
                                <div class="info">
                                    <h6 class="">اطلاعات شخصی</h6>
                                    {{--<div class="row">--}}
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row mx-auto">
                                            <div class="col-xl-2 col-lg-12 col-md-4 text-center">
                                                <div class="upload mt-4 pr-md-4 mx-auto">
                                                    <input type="file" id="input-file-max-fs" class="dropify"
                                                           data-default-file="assets/img/200x200.jpg"
                                                           data-max-file-size="2M" name="avatar"/>
                                                    <p class="mt-2 text-center"><i
                                                                class="flaticon-cloud-upload mr-1"></i>آپلود عکس</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                {{--<div class="form">--}}
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group mb-4">
                                                            <label for="name">نام</label>
                                                            <input type="text" class="form-control"
                                                                   id="name" name="name" autocomplete="off"
                                                                   value="{{ count($errors->all()) ? old('name') : $user->name }}">
                                                            @if($errors->has('name'))
                                                                <div class="text-left text-danger m-1 font-s">{{ $errors->first('name') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group mb-4">
                                                            <label for="family">نام خانوادگی</label>
                                                            <input type="text" class="form-control"
                                                                   id="family" name="family" autocomplete="off"
                                                                   value="{{ count($errors->all()) ? old('family') : $user->family }}">
                                                            @if($errors->has('family'))
                                                                <div class="text-left text-danger m-1 font-s">{{ $errors->first('family') }}
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group mb-4">
                                                        <label for="email">ایمیل</label>
                                                        <input type="email" class="form-control"
                                                               id="email" name="email" autocomplete="off"
                                                               value="{{ count($errors->all()) ? old('email') : $user->email }}">
                                                        @if($errors->has('email'))
                                                            <div class="text-left text-danger m-1 font-s">{{ $errors->first('email') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group mb-4">
                                                        <label for="mobile">شماره تماس</label>
                                                        <input type="text" class="form-control"
                                                               id="mobile" name="mobile" autocomplete="off"
                                                               value="{{ count($errors->all()) ? old('mobile') : $user->mobile }}">
                                                        @if($errors->has('mobile'))
                                                            <div class="text-left text-danger m-1 font-s">{{ $errors->first('mobile') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="dob-input">تاریخ تولد</label>
                                                    <div class="d-sm-flex d-block">
                                                        <div class="form-group mr-1">
                                                            <select class="form-control" name="birth_day"
                                                                    id="exampleFormControlSelect1">
                                                                @for($i=1;$i<=31;$i++)
                                                                    <option value="{{ $i<10 ? '0'.$i : $i }}"
                                                                            @if($i==\Morilog\Jalali\Jalalian::forge($user->birthday)->format('%d')) selected @endif>
                                                                        {{ $i }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="form-group mr-1">
                                                            @php
                                                                $month = \Morilog\Jalali\Jalalian::forge($user->birthday)->format('%B');
                                                            @endphp
                                                            <select class="form-control" name="birth_month"
                                                                    id="month">
                                                                <option value="01"
                                                                        @if($month=='فروردین') selected @endif>
                                                                    فروردین
                                                                </option>
                                                                <option value="02"
                                                                        @if($month=='اردیبهشت') selected @endif>
                                                                    اردیبهشت
                                                                </option>
                                                                <option value="03"
                                                                        @if($month=='خرداد') selected @endif>
                                                                    خرداد
                                                                </option>
                                                                <option value="04"
                                                                        @if($month=='تیر') selected @endif>
                                                                    تیر
                                                                </option>
                                                                <option value="05"
                                                                        @if($month=='مرداد') selected @endif>
                                                                    مرداد
                                                                </option>
                                                                <option value="06"
                                                                        @if($month=='شهریور') selected @endif>
                                                                    شهریور
                                                                </option>
                                                                <option value="07"
                                                                        @if($month=='مهر') selected @endif>
                                                                    مهر
                                                                </option>
                                                                <option value="08"
                                                                        @if($month=='آبان') selected @endif>
                                                                    آبان
                                                                </option>
                                                                <option value="09"
                                                                        @if($month=='آذر') selected @endif>
                                                                    آذر
                                                                </option>
                                                                <option value="10"
                                                                        @if($month=='دی') selected @endif>دی
                                                                </option>
                                                                <option value="11"
                                                                        @if($month=='بهمن') selected @endif>
                                                                    بهمن
                                                                </option>
                                                                <option value="12"
                                                                        @if($month=='اسفند') selected @endif>
                                                                    اسفند
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group mr-1">
                                                            <select class="form-control" name="birth_year"
                                                                    id="year">
                                                                @for($i=1330;$i<=1400;$i++)
                                                                    <option value="{{ $i }}"
                                                                            @if($i==\Morilog\Jalali\Jalalian::forge($user->birthday)->format('%Y')) selected @endif>
                                                                        {{ $i }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                </div>
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <div class="section about">
                            <div class="info">
                                <h5 class="">مشخصات پزشکی</h5>
                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mx-auto">
                                        <div class="form-group">
                                            <label for="blood_type">گروه خونی</label>
                                            <select class="form-control" id="blood_type" name="blood_type">
                                                <option value="" selected>- انتخاب کنید -</option>
                                                <option value="A+" dir="ltr"
                                                        @if($user->medical && $user->medical->blood_type=='A+') selected @endif>
                                                    A+
                                                </option>
                                                <option value="B+" dir="ltr"
                                                        @if($user->medical && $user->medical->blood_type=='B+') selected @endif>
                                                    B+
                                                </option>
                                                <option value="O+" dir="ltr"
                                                        @if($user->medical && $user->medical->blood_type=='O+') selected @endif>
                                                    O+
                                                </option>
                                                <option value="AB+" dir="ltr"
                                                        @if($user->medical && $user->medical->blood_type=='AB+') selected @endif>
                                                    AB+
                                                </option>
                                                <option value="A-" dir="ltr"
                                                        @if($user->medical && $user->medical->blood_type=='A-') selected @endif>
                                                    A-
                                                </option>
                                                <option value="B-" dir="ltr"
                                                        @if($user->medical && $user->medical->blood_type=='B-') selected @endif>
                                                    B-
                                                </option>
                                                <option value="O-" dir="ltr"
                                                        @if($user->medical && $user->medical->blood_type=='O-') selected @endif>
                                                    O-
                                                </option>
                                                <option value="AB-" dir="ltr"
                                                        @if($user->medical && $user->medical->blood_type=='AB-') selected @endif>
                                                    AB-
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mx-auto">
                                        <div class="form-group">
                                            <label for="height">قد</label>
                                            <input type="number" class="form-control mb-4"
                                                   id="height" name="height" autocomplete="off"
                                                   value="{{ $user->medical ? $user->medical->height : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mx-auto">
                                        <div class="form-group">
                                            <label for="weight">وزن</label>
                                            <input type="number" class="form-control mb-4"
                                                   id="weight" name="weight" autocomplete="off"
                                                   value="{{ $user->medical ? $user->medical->weight : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mx-auto">
                                        <div class="form-group">
                                            <label for="disease_history">سابقه بیماری</label>
                                            <textarea type="text" class="form-control mb-4 text-justify" rows="10"
                                                      style="resize: none"
                                                      id="disease_history"
                                                      name="disease_history">{{ $user->medical ? $user->medical->disease_history : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mx-auto">
                                        <div class="form-group">
                                            <label for="injury_history">سابقه مصدومیت</label>
                                            <textarea type="text" class="form-control mb-4 text-justify" rows="10"
                                                      style="resize: none"
                                                      id="injury_history"
                                                      name="injury_history">{{ $user->medical ? $user->medical->injury_history : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-7 col-12 mx-auto my-1">
                                        <label>آپلود برگه آزمایش(کمتر از ۲ ماه)</label>
                                        <div class="custom-file-container" data-upload-id="injury-result-test">
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="injury_result_test">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <a href="javascript:void(0)"
                                               class="custom-file-container__image-clear mt-2"
                                               title="Clear Image" style="float: left;clear: both">حذف</a>
                                            <div id="injury-result-test-preview"
                                                 class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <div class="section about">
                            <div class="info">
                                <h5 class="">مشخصات ورزشی</h5>
                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mx-auto">
                                        <div class="form-group">
                                            <label for="disease_history">هدف از تمرین</label>
                                            <textarea type="text" class="form-control mb-4 text-justify" rows="10"
                                                      style="resize: none"
                                                      id="disease_history"
                                                      name="target">{{ $user->athletic ? $user->athletic->target : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mx-auto">
                                        <div class="form-group">
                                            <label for="injury_history">سابقه تمرینی</label>
                                            <textarea type="text" class="form-control mb-4 text-justify" rows="10"
                                                      style="resize: none"
                                                      id="injury_history"
                                                      name="athletic_history">{{ $user->athletic ? $user->athletic->athletic_history : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-7 col-12 mx-auto my-1">
                                        <label>تست ترکیب بدن</label>
                                        <div class="custom-file-container" data-upload-id="body-custom-test">
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="body_custom_test">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <a href="javascript:void(0)"
                                               class="custom-file-container__image-clear mt-2"
                                               title="Clear Image" style="float: left;clear: both">حذف</a>
                                            <div id="body-custom-test-preview"
                                                 class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </div>

    <div class="account-settings-footer">
        <div class="as-footer-container">
            <button type="reset" id="multiple-reset" class="btn btn-primary">ریست</button>
            <div class="blockui-growl-message">
                <i class="flaticon-double-check"></i>&nbsp; تغییرات با موفقیت ذخیره شد
            </div>
            <button id="multiple-messages" type="submit" class="btn btn-dark">ذخیره تغییرات</button>
        </div>
    </div>
    </form>
    </div>
@endsection

@section('script')
    <script src="{{ asset('cork/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('cork/assets/js/users/account-settings.js') }}"></script>
    <script src="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            var firstUpload = new FileUploadWithPreview('body-custom-test');
            var firstUpload1 = new FileUploadWithPreview('injury-result-test');
            $(".custom-file-container__image-preview").css({
                'marginTop': '0',
                'marginBottom': '0',
                'overflow': 'visible',
                'height': '225'
            });

            @if($user->avatar())
            $(".dropify-render img").attr("src", '{{  asset(env('STORAGE_DIR_PATH').env('AVATAR_DIR_PATH').$user->id.'/'.$user->avatar()) }}');
            @else
            $(".dropify-render img").attr("src", '{{ asset('icons/user.png') }}');
            @endif

            @if($user->medical && $user->medical->attachment)
            $("#injury-result-test-preview").css({
                backgroundImage: "url({{  asset(env('STORAGE_DIR_PATH').env('MEDICAL_DIR_PATH').$user->id.'/'.$user->medical->attachment->filename) }})"
            });
            @endif

            @if($user->athletic && $user->athletic->test())
            $("#body-custom-test-preview").css({
                backgroundImage: "url({{  asset(env('STORAGE_DIR_PATH').env('ATHLETIC_TEST_DIR_PATH').$user->id.'/'.$user->athletic->test()->filename) }})"
            });
            @endif
        });
    </script>
@endsection