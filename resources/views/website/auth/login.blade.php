@extends('website.includes.master')

@section('title','ورود به پنل کاربری')

@section('content')
    <section class="page-title" style="background-image:url({{ asset('blackfit/images/background/10.jpg') }})">
        <div class="auto-container">
            <h2>ورود</h2>
            <ul class="page-breadcrumb">
                <li>ورود به پنل کاربری</li>
                <li><a href="{{ route('website.index') }}">خانه</a></li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Contact Page Section -->
    {{--<section class="contact-page-section">--}}
    <div class="auto-container my-4">
        <div class="row clearfix">
            <div class="form-column col-lg-6 col-md-12 col-sm-12 mx-auto">
                <div class="inner-column">
                    <!-- Contact Form -->
                    <div class="contact-form">
                        <div class="group-title text-right"><h3>ورود</h3></div>
                    {{--<div class="form-text">If you need of a Personal Trainer, Fitness Instructor advice, or a healthy living product review, please feel free to contact us</div>--}}
                    <!-- Contact Form -->
                        <form method="post" action="{{ route('website.users.check') }}" id="register-form">
                            @csrf
                            <div class="row clearfix text-right d-flex flex-sm-row-reverse flex-column ">

                                <div class="col-lg-10 col-md-8 col-sm-12 form-group">
                                    <input type="text" name="email_or_phone" placeholder="موبایل" autocomplete="off"
                                           @if($errors->has('email_or_phone')) style="border:.5px solid #e7515a; !important;" @endif
                                           value="{{ old('email_or_phone') }}" dir="rtl">
                                    @if($errors->has('email_or_phone'))
                                        <div class="text-danger font-s mt-1"
                                             dir="rtl">{{ $errors->first('email_or_phone') }}</div>
                                    @endif
                                </div>

                                <div class="col-lg-10 col-md-8 col-sm-12 form-group">
                                    <input type="password" name="password" placeholder="رمز عبور" autocomplete="off"
                                           @if($errors->has('password')) style="border:.5px solid #e7515a; !important;" @endif
                                           dir="rtl">
                                    @if($errors->has('password'))
                                        <div class="text-danger font-s mt-1"
                                             dir="rtl">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>

                                <div class="col-lg-10 clearfix col-md-8 col-sm-12 form-group">
                                    <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span
                                                class="txt">ورود</span></button>
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
    <script>
        $(document).ready(function () {
            $("input").on("focus", function () {
                $(this).attr('style', '').next().remove();
            });
        });
    </script>
@endsection