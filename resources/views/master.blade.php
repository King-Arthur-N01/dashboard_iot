<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('assets/css/base.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header">
        <!--Header START-->
        <div class="app-header header-shadow" style="background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(10px); border-bottom: 1px solid rgba(0,0,0,0.05); z-index: 10;">
            
            <!-- LEFT: Hamburger Menu -->
            <div class="app-header__logo" style="width: auto; padding-left: 20px; display: flex; align-items: center; background: transparent; border-right: none;">
                <div class="dropdown">
                    <button type="button" class="hamburger hamburger--elastic" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 0;">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu rm-pointers" style="border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border: none; margin-top: 15px; width: 220px;">
                        <h6 tabindex="-1" class="dropdown-header text-primary">MENU UTAMA</h6>
                        <a href="{{route('dashboard')}}" class="dropdown-item py-2">
                            <i class="pe-7s-home mr-3" style="font-size: 1.2rem;"></i> Dashboards
                        </a>
                        <a href="{{route('page.sensor.report')}}" class="dropdown-item py-2">
                            <i class="pe-7s-graph1 mr-3" style="font-size: 1.2rem;"></i> Statistic
                        </a>
                        <a href="{{route('page.update.garden')}}" class="dropdown-item py-2">
                            <i class="pe-7s-date mr-3" style="font-size: 1.2rem;"></i> Schedule
                        </a>
                    </div>
                </div>
            </div>

            <!-- CENTER: Logo -->
            <div style="position: absolute; left: 50%; transform: translateX(-50%); height: 100%; display: flex; align-items: center; pointer-events: none;">
                <img src="{{asset('/assets/images/logo-meta.png')}}" alt="Logo" style="height: 75px; width: auto; object-fit: contain;">
            </div>

            <div class="app-header__content" style="padding-right: 15px;">
                <div class="app-header-left">
                    <!-- Search and Megamenu removed for cleaner UI -->
                </div>
                <div class="app-header-right">
                    <!-- Header dots removed -->
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <!-- User Profile (Simplified) -->
                                <div class="widget-content-left ml-3 header-user-info" style="display: flex; align-items: center; cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="widget-heading mr-2" style="font-weight: 600;">
                                        @auth
                                        {{ Auth::user()->name }}
                                        @endauth
                                    </div>
                                    <img width="40" height="40" class="rounded-circle shadow-sm" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}&background=10B981&color=fff&rounded=true&bold=true" alt="User Avatar">
                                </div>
                                
                                <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu dropdown-menu-right" style="border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border: none;">
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); if(confirm('Apakah anda ingin logout?')) { document.getElementById('logout-form').submit(); }">
                                        <i class="dropdown-icon lnr-exit"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Right Hamburger Menu Removed -->
                </div>
            </div>
        </div>
        <!--Header END-->
        <div class="app-main">
            <!-- Sidebar Removed completely. Navigation moved to Top Hamburger Dropdown. -->
            <div class="app-main__outer" style="padding-left: 0; width: 100%;">
                <div class="app-main__inner">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- Modals -->
    @yield('modals')

    <!--SCRIPTS INCLUDES-->

    <!--CORE-->
    <script src="{{ asset('js/jquery-3.4.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/metismenu.js') }}"></script>
    <script src="{{ asset('js/scripts-init/app.js') }}"></script>
    <script src="{{ asset('js/scripts-init/demo.js') }}"></script>
    <!--BlockUI -->
    <script src="{{asset('js/vendors/blockui.js')}}"></script>
    <script src="{{asset('js/scripts-init/blockui.js')}}"></script>
    @stack('script')
    @stack('style')
</body>

</html>
