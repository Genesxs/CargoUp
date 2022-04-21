<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cargoup</title>
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    @yield('meta')

    @stack('before-styles')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ad78bbd993.js" crossorigin="anonymous"></script>
    <style>
        .links>a {
            color: #000000;
            padding: 0 25px;
            font-size: 20px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .webmadewell {
            background-color: white;
        }

        body {
            margin: 0;
        }

        .sample-header {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            /* background-image: url("/img/bannerCar.jpg"); */
            background-image: linear-gradient(to right, #1D3D3C, #007574);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .sample-header::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgb(94, 94, 94);
            opacity: 0.3;
        }

        .sample-header-section {
            position: relative;
            padding: 15% 0 10%;
            max-width: 640px;
            margin-left: auto;
            margin-right: auto;
            color: white;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5);
            font-family: 'Nunito', sans-serif;
        }

        h1 {
            font-weight: 500;
        }

        h2 {
            font-weight: 400;
        }

        .sample-section-wrap {
            position: relative;
            background-color: white;
        }

        .sample-section {
            position: relative;
            max-width: 100%;
            margin-left: auto;
            margin-right: auto;
            padding: 15px;
        }

        .button {
            background-color: #007574;
            color: white;
            font-size: bold;
        }

        .button:hover {
            background-color: #FE7F25;
            color: white;
        }

        .tittle {
            color: #FE7F25;
        }

        .footer {
            background-image: linear-gradient(to top, #1D3D3C, #005352);
            position: relative;
            max-width: 100%;
            margin-left: auto;
            margin-right: auto;
            padding: 15px;
        }

        .btn-wsp {
            background-color: #25D366;
            color: white;
            border-radius: 100%;
        }

        .btn-fb {
            background-color: #3b5998;
            color: white;
            border-radius: 100%;
        }

        .btn-inst {
            background-image: linear-gradient(to bottom right, #3315A1, #CE125B, #F59C38, #EE865E, #CC7DC5);
            color: white;
            border-radius: 100%;
        }

    </style>
    @stack('after-styles')
</head>

<body>
    {{-- @include('includes.partials.read-only')
        @include('includes.partials.logged-in-as') --}}
    {{-- @include('includes.partials.announcements') --}}


    <div class="sample-header">
        <div class="sample-header-section">

            <div class="content title">
                <img src="{{ asset('/img/LOGOCARGOUP.png') }}" class="img-fluid p-3" alt="">
            </div>
            <div>
            </div>
        </div>
    </div>

    <div class="sample-section-wrap">
        <div class="sample-section">
            <!-- Loggin -->
            <div class="row">
                <div class="col d-flex justify-content-end m-0 p-0">
                    <div class="mb-4">
                        @auth
                            @if ($logged_in_user->isUser())
                                <a href="{{ route('frontend.user.dashboard') }}"
                                    class="btn btn-dark btn-md mr-4">@lang('Home')</a>
                            @endif

                            <a href="{{ route('frontend.user.account') }}"
                                class="btn btn-dark btn-md">@lang('Account')</a>
                        @else
                            <a href="{{ route('frontend.auth.login') }}"
                                class="btn btn-dark btn-md mr-4">@lang('Login')</a>

                        @endauth
                    </div>
                </div>
            </div>
            <!-- end loggin -->
            <!-- content -->
            <div class="row mb-5">
                <div class="col p-4">
                    <div class="d-flex justify-content-center mt-3">
                        <img src="{{ asset('/img/Rompecabezas.png') }}" height="280" width="270" alt="">
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-center p-3">
                        <div class="mr-5 mt-5">
                            <h1 class="text-center mb-4 tittle">INTEGRATE AL FUTURO</h1>
                            <h3 class="text-center description"> Hay una oportunidad para ti <br>La carga que para otros
                                es
                                pequeña hace grande a nuestro servicio</h3>
                            <div class="d-flex justify-content-center mt-5">
                                <a href="{{ route('frontend.auth.register') }}"
                                    class="btn btn-lg button">@lang('Register')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end content -->
        </div>

        <!-- footer -->
        <div class="row footer">
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 p-4 text-white ">
                <h4 class="text-center mb-2">CONTÁCTANOS</h4>
                <div class="d-flex justify-content-center">
                    <div class="text-center mt-3 mr-4">
                        <p><i class="fa-regular fa-building"></i> Dirección <br> Calle 7 #83 - 31 </p>
                        <p><i class="fa-solid fa-location-dot"></i> Ciudad <br> Medellín - Antioquia </p>
                    </div>
                    <div class="text-center mt-3">
                        <p> <i class="fa-solid fa-at"></i> Correo <br> cargoup.com@gmail.com </p>
                        <p> <i class="fa-regular fa-user"></i> Contacto de ventas <br> +57 314 6306322
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 p-4">
                <h4 class="text-center text-white mb-4">REDES</h4>
                <div class="d-flex align-items-center justify-content-center mt-5 ">
                    <a class="btn btn-wsp btn-lg mx-3" href=" https://wa.me/3207020990" target="_blank"><i class="fab fa-whatsapp"></i></a><br>

                    {{-- <a class="btn btn-fb btn-lg mx-3" href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-inst btn-lg mx-3" href="#" target="_blank"><i class="fab fa-instagram"></i></a> --}}
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 p-4 d-flex justify-content-center">
                <img src="{{ asset('/img/LOGOCARGOUP.png') }}" alt="" class="mt-3" height="140" width="100%">
            </div>
        </div>
        <!-- End footer -->
    </div>


    @include('includes.partials.messages')



    @stack('before-scripts')
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/frontend.js') }}"></script>
    <!--Banner js-->
    <script>
        function parallax_height() {
            var scroll_top = $(this).scrollTop();
            var sample_section_top = $(".sample-section").offset().top;
            var header_height = $(".sample-header-section").outerHeight();
            $(".sample-section").css({
                "margin-top": header_height
            });
            $(".sample-header").css({
                height: header_height - scroll_top
            });
        }
        parallax_height();
        $(window).scroll(function() {
            parallax_height();
        });
        $(window).resize(function() {
            parallax_height();
        });
    </script>
    <!-- End Banner -->
    @stack('after-scripts')
</body>

</html>
