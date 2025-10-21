<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

        <!-- Disable tap highlight on IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <link href="{{asset('assets/css/base.min.css')}}" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>

    <body>
        <div class="app-container app-theme-white body-tabs-shadow">
            <div class="app-container">
                <div class="h-100">
                    <div class="h-100 no-gutters row">
                        <div class="d-none d-lg-block col-lg-4">
                            <div class="slider-light">
                                <div class="slick-slider">
                                    <div>
                                        <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-plum-plate" tabindex="-1">
                                            <div class="slide-img-bg" style="background-image: url({{asset('/assets/images/originals/city.jpg')}});"></div>
                                            <div class="slider-content"><h3>Perfect Balance</h3>
                                                <p>ArchitectUI is like a dream. Some think it's too good to be true! Extensive collection of unified React Boostrap Components and Elements.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                            <div class="slide-img-bg" style="background-image: url({{asset('/assets/images/originals/citynights.jpg')}});"></div>
                                            <div class="slider-content"><h3>Scalable, Modular, Consistent</h3>
                                                <p>Easily exclude the components you don't require. Lightweight, consistent Bootstrap based styles across all elements and components</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-sunny-morning" tabindex="-1">
                                            <div class="slide-img-bg" style="background-image: url({{asset('/assets/images/originals/citydark.jpg')}});"></div>
                                            <div class="slider-content"><h3>Complex, but lightweight</h3>
                                                <p>We've included a lot of components that cover almost all use cases for any type of application.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
                            <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                                <div class="app-logo"></div>
                                <h4 class="mb-0">
                                    <span class="d-block">Welcome back,</span>
                                    <span>Please sign in to your account.</span></h4>
                                <h6 class="mt-3">No account? <a href="javascript:void(0);" class="text-primary">Sign up now</a></h6>
                                <div class="divider row"></div>
                                <div>
                                    @include('auth.form_auth.login_form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!--SCRIPTS INCLUDES-->

    <!--CORE-->
    <script src="{{asset('js/jquery-3.4.0.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/metismenu.js')}}"></script>
    <script src="{{asset('js/scripts-init/app.js')}}"></script>
    <script src="{{asset('js/scripts-init/demo.js')}}"></script>

    <!--Slick Carousel -->
    <script src="{{asset('js/vendors/carousel-slider.js')}}"></script>
    <script src="{{asset('js/scripts-init/carousel-slider.js')}}"></script>
    </body>
</html>
