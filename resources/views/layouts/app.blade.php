<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/line-awesome.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/line-awesome-font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.mCustomScrollbar.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/slick/slick.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/slick/slick-theme.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
        @livewireStyles

        @if (auth()->user())
        {{-- START PUSHER --}}
        <script src="{{ asset('assets/js/pusher.min.js') }}"></script>
        <script src="{{ asset('assets/js/echo.iife.js') }}"></script>
        <script>
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;
            window.Echo = new Echo({
                broadcaster: 'pusher',
                key: '{{ env('PUSHER_APP_KEY') }}',
                cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
                encrypted: 'true',
                authEndpoint: '{{ asset('broadcasting/auth') }}',
                auth: {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    }
                }
            })
        </script>
        {{-- END PUSHER --}}
        @endif
    </head>

    <body class="{{ (Route::is('login') || Route::is('register')) ? 'sign-in' : '' }}">
        <!--theme-layout start-->
        <div class="wrapper">
            @if (auth()->user())
                <livewire:header/>
            @endif
            @yield('content')
        </div>
        <!--theme-layout end-->
    </body>

    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.mCustomScrollbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/lib/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/scrollbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>
    @livewireScripts
</html>