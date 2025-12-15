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
                        <div class="h-100 d-md-flex d-sm-block bg-white justify-content-center align-items-center col-md-12 col-lg-7">
                            <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                                <div class="app-logo"></div>
                                <h4>
                                    <div class=""><h3>First Setup</h3></div>
                                    <span>It looks like you've been seen for the first time</span>
                                </h4>
                                <div>
                                    <form method="POST" action="{{ route('register.garden') }}">
                                    @csrf
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="gardenName" class="">Nama Kebun</label><input name="garden_name" id="gardenName" placeholder="Type here..." type="text" class="form-control"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="gardenDesc" class="">Deskripsi Kebun</label><input name="garden_desc" id="gardenDesc" placeholder="Type here..." type="text" class="form-control"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="gardenPic" class="">Gambar Kebun</label><input name="garden_pic" id="gardenPic" placeholder="" type="file" class="form-control"></div>
                                            </div>
                                        </div>
                                        <div class="mt-3 position-relative form-check"><input name="check" id="exampleCheck" type="checkbox" class="form-check-input"><label for="exampleCheck" class="form-check-label">Accept our <a href="javascript:void(0);">Terms and Conditions</a>.</label></div>
                                        <div class="mt-4 d-flex align-items-center">
                                            <div class="ml-auto">
                                                <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg">Buat Kebun</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="d-lg-flex d-xs-none col-lg-5">
                            <div class="slider-light">
                                <div class="slick-slider slick-initialized">
                                    <div>
                                        <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                            <div class="slide-img-bg" style="background-image: url({{asset('assets/images/dropdown-header/create_garden_menu_1.jpg')}});"></div>
                                            <div class="slider-content"><h3>Scalable, Modular, Consistent</h3>
                                                <p>Easily exclude the components you don't require. Lightweight, consistent Bootstrap based styles across all elements and components</p></div>
                                        </div>
                                    </div>
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


    </body>
</html>
