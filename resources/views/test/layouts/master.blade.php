<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title', 'Testing Page For Ups')</title>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="csrf" content="{{ csrf_token() }}"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{--    <link rel="canonical" href="{{ URL::current() ?? '/' }}"/>--}}

        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/css/home.css') }}">
        {{ $styles ?? '' }}
{{--        <link rel="stylesheet" href="{{ mix('/css/app.min.css') }}"/>--}}

        <!-- Global site tag (gtag.js) - Google Analytics -->

        @yield('head-content')
        @livewireStyles
    </head>


    <body>
        <header>
            @include('test.layouts.header')
        </header>
        <main class="test">
            @yield('content')
        </main>
        <footer>
            @include('test.layouts.footer')
        </footer>


    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/assets/js/home.js') }}"></script>
    {{ $script ?? '' }}
    @yield('footer-content')
    @livewireScripts
    </body>
</html>
