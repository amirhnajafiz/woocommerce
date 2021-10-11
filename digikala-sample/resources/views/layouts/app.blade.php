<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Digikala @yield('title')</title>

        <!-- Bootstrap CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @yield('style')

        <style>
            html {
                height: 100%;
            }

            body {
                margin: 0;
            }

            .bg {
                animation: slide 3s ease-in-out infinite alternate;
                background-image: linear-gradient(-60deg, #fd5a24 50%, #cbcbcb 50%);
                bottom: 0;
                left: -50%;
                opacity: .5;
                position: fixed;
                right: -50%;
                top: 0;
                z-index: -1;
            }

            .bg2 {
                animation-direction: alternate-reverse;
                animation-duration: 4s;
            }

            .bg3 {
                animation-duration: 5s;
            }

            @keyframes slide {
                0% {
                    transform: translateX(-25%);
                }
                100% {
                    transform: translateX(25%);
                }
            }
        </style>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            <div style="margin-bottom: 100px !important;">
                @include('layouts.navigation')
            </div>

        <!-- Page Content -->
            <div class="bg"></div>
            <div class="bg bg2"></div>
            <div class="bg bg3"></div>
            <div>
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @yield('script')
    </body>
</html>
