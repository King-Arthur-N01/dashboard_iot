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

        <style>
            /* ===== LOGIN PAGE — GLOBAL CARD DESIGN ===== */

            /* === BACKGROUND PANEL === */
            .login-right-panel {
                position: relative;
                display: flex !important;
                align-items: center;
                justify-content: center;
                background: #f8fafc; /* Desktop subtle background */
                min-height: 100vh;
            }

            .app-login-box {
                position: relative;
                z-index: 1;
                padding: 20px 16px;
                width: 100%;
            }

            /* ===========================
               GLASS CARD — PUTIH TERANG
               =========================== */
            .login-glass-card {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(24px) saturate(180%);
                -webkit-backdrop-filter: blur(24px) saturate(180%);
                border: 1px solid rgba(255, 255, 255, 0.95);
                border-radius: 24px;
                position: relative;
                overflow: hidden;
                box-shadow:
                    0 20px 60px rgba(0, 0, 0, 0.08),
                    0 4px 16px rgba(0, 0, 0, 0.04),
                    inset 0 1px 0 rgba(255,255,255,1);
                padding: 36px 28px 28px;
                transition: box-shadow 0.3s ease, transform 0.3s ease;
            }

            /* === LOGO AREA === */
            .login-logo-wrap {
                text-align: center;
                margin-bottom: 20px;
                padding-bottom: 16px;
                border-bottom: 2px solid rgba(16, 185, 129, 0.15);
            }

            .login-logo-wrap .custom-app-logo {
                height: 56px;
                width: auto;
                filter: drop-shadow(0 2px 6px rgba(0,0,0,0.12));
            }

            /* === TYPOGRAPHY === */
            .login-title {
                font-size: 1.25rem !important;
                font-weight: 700 !important;
                color: #111827 !important;
                line-height: 1.35;
                letter-spacing: -0.3px;
            }

            .login-title span:first-child {
                color: #111827 !important;
                font-size: 0.85rem;
                font-weight: 500 !important;
                text-transform: uppercase;
                letter-spacing: 1px;
                color: #6b7280 !important;
            }

            .login-title span:last-child {
                color: #111827 !important;
                font-size: 1.3rem;
                font-weight: 700 !important;
            }

            .login-subtitle {
                color: #6b7280 !important;
                font-size: 0.875rem;
            }

            .login-subtitle a.text-primary {
                color: #059669 !important;
                font-weight: 600;
                text-decoration: none;
            }

            .login-subtitle a.text-primary:hover {
                color: #10b981 !important;
            }

            /* === FORM LABELS === */
            .login-glass-card label {
                color: #374151 !important;
                font-weight: 600;
                font-size: 0.8rem;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                margin-bottom: 6px;
            }

            /* === INPUT FIELDS === */
            .login-glass-card .form-control {
                background: #f9fafb !important;
                border: 1.5px solid #e5e7eb !important;
                color: #111827 !important;
                border-radius: 12px !important;
                padding: 10px 14px !important;
                font-size: 0.95rem;
                height: auto !important;
                transition: border-color 0.2s ease, box-shadow 0.2s ease;
            }

            .login-glass-card .form-control::placeholder {
                color: #9ca3af !important;
            }

            .login-glass-card .form-control:focus {
                background: #ffffff !important;
                border-color: #10b981 !important;
                box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15) !important;
                outline: none;
            }

            /* Hide arrows on number input */
            .login-glass-card input[type="number"]::-webkit-outer-spin-button,
            .login-glass-card input[type="number"]::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
            .login-glass-card input[type="number"] {
                -moz-appearance: textfield; /* Firefox */
            }

            /* === CHECKBOX === */
            .login-glass-card .form-check-label {
                color: #4b5563 !important;
                font-size: 0.875rem;
                font-weight: 400;
            }

            .login-glass-card .form-check-input:checked {
                background-color: #10b981 !important;
                border-color: #10b981 !important;
            }

            /* === DIVIDER === */
            .login-glass-card .divider {
                border-top: 1px solid #f0f0f0 !important;
                margin: 16px 0 !important;
            }

            /* === RECOVER PASSWORD LINK === */
            .login-glass-card .btn-link {
                color: #6b7280 !important;
                font-size: 0.85rem;
                text-decoration: none;
                padding: 0;
                font-weight: 500;
            }

            .login-glass-card .btn-link:hover {
                color: #059669 !important;
            }

            /* === LOGIN BUTTON === */
            .login-glass-card .btn-primary {
                background: linear-gradient(135deg, #10b981 0%, #059669 100%) !important;
                border: none !important;
                border-radius: 12px !important;
                font-weight: 700 !important;
                font-size: 0.9rem;
                letter-spacing: 0.4px;
                padding: 10px 22px !important;
                box-shadow:
                    0 4px 15px rgba(16, 185, 129, 0.40),
                    0 1px 3px rgba(0,0,0,0.1) !important;
                transition: transform 0.15s ease, box-shadow 0.15s ease !important;
                white-space: nowrap;
            }

            .login-glass-card .btn-primary:active {
                transform: translateY(1px) !important;
                box-shadow: 0 2px 8px rgba(16, 185, 129, 0.30) !important;
            }

            /* === BADGE DEKORASI — garis aksen hijau atas card === */
            .login-glass-card::before {
                content: '';
                display: block;
                position: absolute;
                top: 0;
                left: 50%;
                transform: translateX(-50%);
                width: 60px;
                height: 4px;
                background: linear-gradient(90deg, #10b981, #34d399);
                border-radius: 0 0 4px 4px;
            }


            /* ==================================================
               MOBILE & TABLET (< 992px): GAMBAR JADI BACKGROUND
               ================================================== */
            @media (max-width: 991.98px) {
                html, body, .app-container, .h-100 {
                    height: 100% !important;
                }

                .login-right-panel {
                    background: #000;
                    background-size: cover;
                    background-position: center center;
                    background-repeat: no-repeat;
                }

                /* Buat glass card lebih frosted (gelap sedikit bayangannya) di atas foto */
                .login-glass-card {
                    background: rgba(255, 255, 255, 0.88);
                    box-shadow:
                        0 20px 60px rgba(0, 0, 0, 0.30),
                        0 4px 16px rgba(0, 0, 0, 0.15),
                        inset 0 1px 0 rgba(255,255,255,1);
                }

                /* Layer gambar: absolute fill, fade bergantian */
                .mobile-bg-slide {
                    position: absolute;
                    inset: 0;
                    background-size: cover;
                    background-position: center center;
                    background-repeat: no-repeat;
                    opacity: 0;
                    transition: opacity 1.2s ease-in-out;
                    z-index: 0;
                }

                .mobile-bg-slide.active {
                    opacity: 1;
                }

                /* Overlay lebih ringan agar foto tetap keliatan tapi card kontras */
                .login-right-panel::before {
                    content: '';
                    position: absolute;
                    inset: 0;
                    background: linear-gradient(
                        170deg,
                        rgba(0, 40, 20, 0.55) 0%,
                        rgba(0, 20, 10, 0.45) 100%
                    );
                    z-index: 0;
                }
            }
        </style>

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
                                        <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                            <div class="slide-img-bg" style="background-image: url({{asset('/assets/images/originals/garden_menu_2.jpg')}});"></div>
                                            <div class="slider-content"><h3>Perfect Balance</h3>
                                                <p>ArchitectUI is like a dream. Some think it's too good to be true! Extensive collection of unified React Boostrap Components and Elements.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                            <div class="slide-img-bg" style="background-image: url({{asset('/assets/images/originals/garden_menu_4.jpg')}});"></div>
                                            <div class="slider-content"><h3>Scalable, Modular, Consistent</h3>
                                                <p>Easily exclude the components you don't require. Lightweight, consistent Bootstrap based styles across all elements and components</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                            <div class="slide-img-bg" style="background-image: url({{asset('/assets/images/originals/garden_menu_3.jpg')}});"></div>
                                            <div class="slider-content"><h3>Complex, but lightweight</h3>
                                                <p>We've included a lot of components that cover almost all use cases for any type of application.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="h-100 d-flex justify-content-center align-items-center col-md-12 col-lg-8 login-right-panel">
                            <!-- Mobile background image slides (hidden on desktop) -->
                            <div class="d-lg-none">
                                <div class="mobile-bg-slide active" style="background-image: url('{{asset('/assets/images/originals/garden_menu_2.jpg')}}');"></div>
                                <div class="mobile-bg-slide" style="background-image: url('{{asset('/assets/images/originals/garden_menu_4.jpg')}}');"></div>
                                <div class="mobile-bg-slide" style="background-image: url('{{asset('/assets/images/originals/garden_menu_3.jpg')}}');"></div>
                            </div>
                            <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                                <div class="login-glass-card">
                                    <div class="login-logo-wrap">
                                        <img class="custom-app-logo" src="{{ asset('/assets/images/logo-meta.png') }}">
                                    </div>
                                    <h4 class="mb-0 login-title">
                                        <span class="d-block">Welcome back,</span>
                                        <span>Please sign in to your account.</span>
                                    </h4>
                                    <h6 class="mt-3 login-subtitle">No account? <a href="javascript:void(0);" class="text-primary">Sign up now</a></h6>
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
        </div>

    <!--CORE-->
    <script src="{{asset('js/jquery-3.4.0.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/metismenu.js')}}"></script>
    <script src="{{asset('js/scripts-init/app.js')}}"></script>
    <script src="{{asset('js/scripts-init/demo.js')}}"></script>

    <!--Slick Carousel -->
    <script src="{{asset('js/vendors/carousel-slider.js')}}"></script>
    <script src="{{asset('js/scripts-init/carousel-slider.js')}}"></script>

    <!-- Override carousel: autoplay tanpa arrows -->
    <script>
        $(document).ready(function () {
            // Tunggu carousel-slider.js selesai init (delay 2500ms sama seperti di file aslinya)
            setTimeout(function () {
                var $slider = $(".slick-slider");
                if ($slider.hasClass('slick-initialized')) {
                    $slider.slick('unslick');
                }
                $slider.slick({
                    dots: true,
                    arrows: false,          // hapus panah kiri-kanan
                    autoplay: true,         // slide otomatis
                    autoplaySpeed: 4500,    // ganti slide tiap 4.5 detik
                    speed: 1000,            // durasi transisi 1 detik
                    fade: true,             // efek crossfade antar slide
                    cssEase: 'ease-in-out',
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    pauseOnHover: false
                });
            }, 2500);
        });
    </script>

    <!-- Mobile background fadeshow: identik dengan desktop Slick fade -->
    <script>
        (function () {
            // Hanya jalankan di mobile/tablet (< 992px)
            if (window.innerWidth >= 992) return;

            var slides   = document.querySelectorAll('.mobile-bg-slide');
            var current  = 0;
            var total    = slides.length;
            var duration = 4500;   // sama dengan autoplaySpeed Slick desktop

            if (total === 0) return;

            // Pastikan slide pertama aktif
            slides[0].classList.add('active');

            setInterval(function () {
                // Fade out slide sekarang
                slides[current].classList.remove('active');

                // Pindah ke slide berikutnya (loop)
                current = (current + 1) % total;

                // Fade in slide baru
                slides[current].classList.add('active');
            }, duration);
        })();
    </script>

    <!--SweetAlert2 -->
    <script src="{{asset('js/vendors/sweetalert2.all.js')}}"></script>
    <!-- SweetAlert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/scripts-init/sweet-alerts.min.js')}}"></script>
    <script src="{{asset('js/scripts-init/sweet-alerts.js')}}"></script>

    <!-- Script untuk SweetAlert -->
    @if ($errors->has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login gagal',
                text: '{{ $errors->first('error') }}',
                timer: 3000,                 // auto-close 5 detik
                timerProgressBar: true,
                showConfirmButton: false
            });
        </script>
    @endif
    </body>
</html>
