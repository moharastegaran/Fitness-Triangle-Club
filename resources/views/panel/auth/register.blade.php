@extends('layouts.app')

@section('title','ثبت نام کاربر')

@section('style')
    <link type="text/css" rel="stylesheet" href="{{ asset('style/form.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('style/persianDatepicker.css') }}">
    <style>
        .container-fluid {
            background-image: url(../../../images/body-builder-3.jpeg);
            background-position: center center;
            background-size: cover;
            background-attachment: fixed;
            padding: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="navbar-container bg-white w-100">
            @include('layouts.navbar')
        </div>
        <div class="row col-md-11 col-12 mx-auto p-md-5 p-sm-4 p-3">
            <div class="col-md-6 col-12 bg-white my-4 px-0 shadow-lg">
                <h3 class="text-center text-white p-md-4 p-3" style="background-color: #cb1313">
                    امروز را یک روزه انتخاب کنید
                </h3>
                <form method="post" action="{{ route('join-member.store') }}"
                      class="form pt-md-4 pb-md-5 px-md-5 p-sm-4 p-3">
                    {{ csrf_field() }}
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" name="name" class="custom-input" autocomplete="off"
                                   value="{{ old('name') }}" placeholder="نام">
                        </div>
                        @if($errors->has('name'))
                            <p class="custom-error">{{ $errors->first('name') }}</p>
                        @endif

                        <div class="form-group">
                            <input type="text" name="family" class="custom-input" autocomplete="off"
                                   value="{{ old('family') }}" placeholder="نام خانوادگی">
                        </div>
                        @if($errors->has('family'))
                            <p class="custom-error">{{ $errors->first('family') }}</p>
                        @endif

                        <div class="form-group">
                            <input type="email" name="email" class="custom-input" autocomplete="off"
                                   value="{{ old('email') }}" placeholder="ایمیل">
                        </div>
                        @if($errors->has('email'))
                            <p class="custom-error">{{ $errors->first('email') }}</p>
                        @endif

                        <div class="form-group">
                            <input type="text" name="birthday" class="custom-input" autocomplete="off"
                                   value="{{ old('birthday') }}" placeholder="تاریخ تولد">
                        </div>
                        @if($errors->has('mobile'))
                            <p class="custom-error">{{ $errors->first('mobile') }}</p>
                        @endif

                        <div class="form-group">
                            <input type="password" name="password" class="custom-input" autocomplete="off"
                                   placeholder="رمز عبور">
                        </div>
                        @if($errors->has('password'))
                            <p class="custom-error">{{ $errors->first('password') }}</p>
                        @endif

                        <div class="form-group">
                            <input type="submit" class="btn btn-block bg-dark text-white" style="border-radius : 0"
                                   value="ثبت نام">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 col-12 text-right text-white py-3 d-md-block d-none">
                <div class="vazir-medium mb-3" style="font-size: 65px">
                    پیوستن به
                    <span class="text-danger iransans-web-bold">ما</span>
                </div>
                <p class="vazir-light mt-4">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها
                    و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                </p>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/persianDatepicker.min.js') }}"></script>
    <script>
        $(document).ready(function () {

            $("input[name='birthday']").persianDatepicker({
                formatDate: "YYYY-0M-0D",
                cellWidth: 35,
                cellHeight: 25,
                calendarPosition: {
                    x: 20,
                    y: 0,
                }
            });

            $(".custom-input").on("focus", function () {
                $(this).parent().addClass("active").next(".custom-error").remove();
            });
            $(".custom-input").on("blur", function () {
                $(this).parent().removeClass("active");
            });
        })
    </script>
@endsection