@extends('website.includes.master')

@section('content')
    <!-- Banner Section -->
    <section class="banner-section">
        <div class="main-slider-carousel owl-carousel owl-theme">

            <div class="slide">
                <div class="image-layer" style="background-image:url({{ asset('blackfit/images/main-slider/image-1.jpg') }})"></div>
                <div class="auto-container">
                    <!-- Content Boxed -->
                    <div class="content-boxed">
                        <div class="inner-boxed">
                            <h1>KEEP YOUR BODY <span>FIT & STRONG</span></h1>
                            <div class="text">BLACKFIT – fitness health center where your body gets its shape! <br> Start training now to stay fit and healthy all year round!</div>
                            <div class="btns-box">
                                <div class="theme-btn purchase-box-btn btn-style-one"><span class="txt">LET’S TRAIN</span></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="slide">
                <div class="image-layer" style="background-image:url({{ asset('blackfit/images/main-slider/image-3.jpg') }})"></div>
                <div class="auto-container">
                    <!-- Content Boxed -->
                    <div class="content-boxed">
                        <div class="inner-boxed">
                            <h1>KEEP YOUR BODY <span>FIT & STRONG</span></h1>
                            <div class="text">BLACKFIT – fitness health center where your body gets its shape! <br> Start training now to stay fit and healthy all year round!</div>
                            <div class="btns-box">
                                <div class="theme-btn purchase-box-btn btn-style-one"><span class="txt">LET’S TRAIN</span></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="slide">
                <div class="image-layer" style="background-image:url({{ asset('blackfit/images/main-slider/image-4.jpg') }})"></div>
                <div class="auto-container">
                    <!-- Content Boxed -->
                    <div class="content-boxed">
                        <div class="inner-boxed">
                            <h1>KEEP YOUR BODY <span>FIT & STRONG</span></h1>
                            <div class="text">BLACKFIT – fitness health center where your body gets its shape! <br> Start training now to stay fit and healthy all year round!</div>
                            <div class="btns-box">
                                <div class="theme-btn purchase-box-btn btn-style-one"><span class="txt">LET’S TRAIN</span></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="slide">
                <div class="image-layer" style="background-image:url({{ asset('blackfit/images/main-slider/image-5.jpg') }})"></div>
                <div class="auto-container">
                    <!-- Content Boxed -->
                    <div class="content-boxed">
                        <div class="inner-boxed">
                            <h1>KEEP YOUR BODY <span>FIT & STRONG</span></h1>
                            <div class="text">BLACKFIT – fitness health center where your body gets its shape! <br> Start training now to stay fit and healthy all year round!</div>
                            <div class="btns-box">
                                <div class="theme-btn purchase-box-btn btn-style-one"><span class="txt">LET’S TRAIN</span></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!--Scroll Dwwn Btn-->
        <div class="mouse-btn-down scroll-to-target" data-target=".testimonial-section">
            <span class="icon"><img src="{{ asset('blackfit/images/icons/scroll.png')}}" alt=""></span>
        </div>

    </section>
    <!-- End Banner Section -->

    <!-- Testimonial Section -->
    <section class="testimonial-section">
        <div class="auto-container">
            <div class="inner-container">
                <span class="quote-left flaticon-quote-3"></span>
                <span class="quote-right flaticon-quote-4"></span>

                <!-- Testimonial Block -->
                <div class="testimonial-block">
                    <div class="inner-box">
                        <div class="text">Want to be healthy and have a perfect body? BLACKFIT is the right decision for you! It will create your personal training program and balance your diet so you could get the <br> shape of your dream shortly!</div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Testimonial Section -->

    <!-- Pricing Section -->
    <section class="pricing-section" style="background-image: url({{ asset('blackfit/images/background/1.jpg') }})">
        <div class="auto-container">
            <div class="sec-title centered">
{{--                <h2><span>Program</span> Pricing</h2>--}}
            </div>
            <div class="row clearfix">

                <!-- Pricing Block -->
                <div class="price-block col-lg-4 col-md-4 col-sm-12">
{{--                    <div class="side-text">STANDART</div>--}}
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="icon-box">
                            <span class="icon"><img src="{{ asset('blackfit/images/icons/price-1-icon.svg') }}" alt=""></span>
                        </div>
                    </div>
                </div>

                <!-- Pricing Block -->
                <div class="price-block col-lg-4 col-md-4 col-sm-12">
{{--                    <div class="side-text">PROFESSIONAL</div>--}}
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="icon-box">
                            <span class="icon"><img src="{{ asset('blackfit/images/icons/price-2-icon.svg') }}" alt=""></span>
                        </div>
                    </div>
                </div>

                <!-- Pricing Block -->
                <div class="price-block col-lg-4 col-md-4 col-sm-12">
{{--                    <div class="side-text">ULTIMATE</div>--}}
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="icon-box">
                            <span class="icon"><img src="{{ asset('blackfit/images/icons/price-3-icon.svg') }}" alt=""></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Pricing Section -->

    <!-- Calculator Section -->
    <section class="calculator-section">
        <div class="auto-container">
            <div class="sec-title centered">
                <h2><span>bmi</span> محاسبه</h2>
                <div class="text persian">
                    شاخص توده بدنی BMI مقیاسی برای اندازه گیری میزان چربی بدن و تناسب اندام بر اساس نسبت وزن به قد فرد است.
                    <br>
                    این شاخص از طریق حاصل تقسیم وزن بر مجذور قد فرد محاسبه میشود و برای افراد بالای 20 سال چه خانم چه آقا درست کار میکند.
                    <br>
                    اعداد متوسط این شاخص برای کودکان بالای دو سال متفاوت است.
                </div>
            </div>

            <div class="inner-container">

                <!-- Default Form -->
                <div class="default-form">

                    <!-- Default Form -->
                    <form method="post" action="contact.html">
                        <div class="row clearfix">

                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <input type="text" name="cm" placeholder="قد (سانتیمتر)" required>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <input type="text" name="weight" placeholder="وزن (کیلوگرم)" required>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <input type="text" name="age" placeholder="سن" required>
                            </div>

                            <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                <select class="custom-select-box" required>
                                    <option value="">جنسیت</option>
                                    <option value="male">مرد</option>
                                    <option value="female">زن</option>
                                </select>
                            </div>

                            <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                <select class="custom-select-box">
                                    <option>Select an activity factor</option>
                                    <option>Factor 01</option>
                                    <option>Factor 02</option>
                                </select>
                            </div>

                            <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="txt">CALCULATE</span></button>
                            </div>

                        </div>
                    </form>

                    <!--End Default Form -->
                </div>

            </div>

        </div>
    </section>
    <!-- End Calculator Section -->
@endsection
