<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Sale @yield('title')</title>

        <!-- Bootstrap CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <style>
            body {
                background: linear-gradient(-45deg, #282828, #373737, #242424, #2f2f2f);
                background-size: 400% 400%;
                animation: gradient 20s ease infinite;
                height: 100vh;
            }

            @keyframes gradient {
                0% {
                    background-position: 0 50%;
                }
                50% {
                    background-position: 100% 50%;
                }
                100% {
                    background-position: 0 50%;
                }
            }
        </style>

        @yield('style')
    </head>
    <body>
        <div class="container-fluid m-0 p-0">
            <div class="row m-0 p-0">
                <div class="col-2 p-0">
                    @include('layouts.admin-navigation')
                </div>
                <div class="col-10 p-0">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        @yield('script')
    </body>
</html>

