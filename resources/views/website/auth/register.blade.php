@extends('website.includes.master')

@section('title','ثبت نام در پنل کاربری')

@section('style')
    <link type="text/css" rel="stylesheet" href="{{ asset('style/persianDatepicker.css') }}">
@endsection

@section('content')
    <section class="page-title" style="background-image:url({{ asset('blackfit/images/background/10.jpg') }})">
        <div class="auto-container">
            <h2>ثبت‌نام</h2>
            <ul class="page-breadcrumb">
                <li>ثبت‌نام در سایت ftc pro</li>
                <li><a href="{{ route('website.index') }}">خانه</a></li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Contact Page Section -->
    {{--<section class="contact-page-section">--}}
    <div class="auto-container my-4">
        <div class="row clearfix">
            <div class="form-column col-lg-8 col-md-12 col-sm-12 mx-auto">
                <div class="inner-column">
                    <!-- Contact Form -->
                    <div class="contact-form">
                        <div class="group-title text-right"><h3>ثبت نام</h3></div>
                    {{--<div class="form-text">If you need of a Personal Trainer, Fitness Instructor advice, or a healthy living product review, please feel free to contact us</div>--}}
                    <!-- Contact Form -->
                        <form method="post" action="{{ route('website.users.store') }}" id="register-form">
                            @csrf
                            <div class="row clearfix text-right d-flex flex-sm-row-reverse flex-column">
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="name" placeholder="نام" value="{{ old('name') }}"
                                           @if($errors->has('name')) style="border:.5px solid #e7515a; !important;" @endif
                                           autocomplete="off" dir="rtl">
                                    @if($errors->has('name'))
                                        <div class="text-danger font-s mt-1"
                                             dir="rtl">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="family" placeholder="نام خانوادگی" autocomplete="off"
                                           @if($errors->has('family')) style="border:.5px solid #e7515a; !important;" @endif
                                           dir="rtl" value="{{ old('family') }}">
                                    @if($errors->has('family'))
                                        <div class="text-danger font-s mt-1"
                                             dir="rtl">{{ $errors->first('family') }}</div>
                                    @endif
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="mobile" placeholder="موبایل" autocomplete="off"
                                           @if($errors->has('mobile')) style="border:.5px solid #e7515a; !important;" @endif
                                           value="{{ old('mobile') }}" dir="rtl">
                                    @if($errors->has('mobile'))
                                        <div class="text-danger font-s mt-1"
                                             dir="rtl">{{ $errors->first('mobile') }}</div>
                                    @endif
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="birthday" placeholder="تاریخ تولد" autocomplete="off"
                                           @if($errors->has('birthday')) style="border:.5px solid #e7515a; !important;" @endif
                                           value="{{ old('birthday') }}" dir="rtl">
                                    @if($errors->has('birthday'))
                                        <div class="text-danger font-s mt-1"
                                             dir="rtl">{{ $errors->first('birthday') }}</div>
                                    @endif
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="password" name="password" placeholder="رمز عبور" autocomplete="off"
                                           @if($errors->has('password')) style="border:.5px solid #e7515a; !important;" @endif
                                           dir="rtl">
                                    @if($errors->has('password'))
                                        <div class="text-danger font-s mt-1"
                                             dir="rtl">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="password" name="password_confirmation" autocomplete="off"
                                           @if($errors->has('password_confirmation')) style="border:.5px solid #e7515a; !important;" @endif
                                           placeholder="تکرار رمز عبور" dir="rtl">
                                    @if($errors->has('password_confirmation'))
                                        <div class="text-danger font-s mt-1"
                                             dir="rtl">{{ $errors->first('password_confirmation') }}</div>
                                    @endif
                                </div>

                                <div class="col-lg-12 clearfix col-md-12 col-sm-12 form-group">
                                    <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span
                                                class="txt">ذخیره اطلاعات</span></button>
                                    {{--<span class="data">* Personal data will be encrypted</span>--}}
                                </div>

                            </div>
                        </form>
                    </div>
                    <!-- End Contact Form -->
                </div>
            </div>

        </div>
    </div>
    {{--</section>--}}
@endsection

@section('script')
    <script src="{{ asset('js/persianDatepicker.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("input[name='birthday']").persianDatepicker({
                formatDate: "YYYY-0M-0D"
            });

            $("input").on("focus", function () {
                $(this).attr('style', '').next().remove();
            });
        });
    </script>
@endsection