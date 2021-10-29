<!DOCTYPE html>
<html lang="en" xmlns:livewire="http://www.w3.org/1999/html">
    <head>
        <title>@yield('title', 'Home')</title>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="csrf" content='@csrf'/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Start PayPal JS  -->
{{--        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->--}}
{{--        <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->--}}
        <!-- End PayPal JS  -->

        {{--    <link rel="canonical" href="{{ URL::current() ?? '/' }}"/>--}}

        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/css/home.css') }}">
        <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
        {{ $styles ?? '' }}
        <!-- Global site tag (gtag.js) - Google Analytics -->
        @yield('head-content')
        <livewire:styles />
    </head>


    <body>
        <header>
            <livewire:home.layouts.header />
        </header>
        <main>
            {{ $slot }}
        </main>
        <footer>
            @if( Route::currentRouteName() != 'home.index')
                <livewire:home.layouts.footer />
            @endif
        </footer>
        <script src="{{ asset('/plugins/select2/select2.min.js') }}"></script>
        <script src="{{ asset('/plugins/swiper/swiper.min.js') }}"></script>
        <script src="{{ mix('/assets/js/home.js') }}"></script>
{{--        <script--}}
{{--            src="https://www.paypal.com/sdk/js?client-id=ARFGbhnIa8KxcRiPD5VqsAip52D7xzAb_vPHn7-r25NaW99L5GRahsD_cYfCI-GwmhpqLM3Xlv711-7w--}}{{--&currency=CAD--}}{{--">--}}
{{--        </script>--}}
        <script src="{{ mix('/js/app.js') }}"></script>
        @yield('footer-content')

{{--        <livewire:livewire-ui-modal />--}}
{{--        @livewireUIScripts--}}
        {{ $script ?? '' }}
        {{ $scan ?? '' }}
        {{ $fax ?? '' }}
        {{ $print ?? '' }}
        {{ $parcel ?? '' }}
        {{ $envelop ?? '' }}
        {{ $select2_script ?? '' }}
    <livewire:scripts />
    </body>
</html>
