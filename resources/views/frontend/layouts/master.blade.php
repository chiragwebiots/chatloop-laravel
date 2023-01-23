<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    style="{{ isset($theme->primary_color) ? "--primary-color:$theme->primary_color;" : null }}
    {{ isset($theme->secondary_color) ? "--secondary-color:$theme->secondary_color;" : null }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon"
        href="{{ isset($theme->favic_icon) ? url(\App\Helpers\Helpers::media($theme->favic_icon)->url) : asset('favicon.png') }}"type="image/x-icon">

    <link rel="shortcut icon"
        href="{{ isset($theme->favic_icon) ? url(\App\Helpers\Helpers::media($theme->favic_icon)->url) : asset('favicon.png') }}"
        type="image/x-icon">

    <meta name="title" content="{{ isset($theme->meta_title) ? $theme->meta_title : '' }}">
    <meta name="description" content="{{ isset($theme->meta_description) ? $theme->meta_description : null }}">
    <meta name="keywords" content="{{ isset($theme->meta_keywords) ? $theme->meta_keywords : null }}">
    <meta name="author" content="{{ isset($theme->meta_author_name) ? $theme->meta_author_name : null }}">
    <meta name="image" content="{{ isset($theme->meta_image) ? $theme->meta_image : null }}">

    @if (!is_null($settings))
        @foreach ($settings as $setting)
            <title> {{ $setting->site_name }} - {{ $setting->site_tagline }}</title>

            @if (!is_null($setting->google_analytics))
                <!-- Global site tag - Google Analytics -->
                <script async src="https://www.googletagmanager.com/gtag/js?id={{ $setting->google_analytics }}"></script>
                <script>
                    window.dataLayer = window.dataLayer || [];

                    function gtag() {
                        dataLayer.push(arguments);
                    }
                    gtag('js', new Date());

                    gtag('config', {{ $setting->google_analytics }});
                </script>
            @endif

            @if (!is_null($setting->facebook_pixel))
                <!-- Facebook Pixel -->
                <script>
                    ! function(f, b, e, v, n, t, s) {
                        if (f.fbq) return;
                        n = f.fbq = function() {
                            n.callMethod ?
                                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                        };
                        if (!f._fbq) f._fbq = n;
                        n.push = n;
                        n.loaded = !0;
                        n.version = '2.0';
                        n.queue = [];
                        t = b.createElement(e);
                        t.async = !0;
                        t.src = v;
                        s = b.getElementsByTagName(e)[0];
                        s.parentNode.insertBefore(t, s)
                    }(window,
                        document, 'script', '//connect.facebook.net/en_US/fbevents.js');

                    fbq('init', {{ $setting->facebook_pixel }});
                    fbq('track', "PageView");
                </script>

                <noscript>
                    <img height="1" width="1" style="display:none"
                        src="https://www.facebook.com/tr?id={{ $setting->facebook_pixel }}&ev=PageView&noscript=1" />
                </noscript>
                <!-- End Facebook Pixel -->
            @endif
        @endforeach
    @endif
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendors/fontawesome.css') }}">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendors/bootstrap.css') }}">
    <!-- Animated css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendors/animate.css') }}">
    <!-- Owl carousel .css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendors/owlcarousel.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/vendors/swiper.css') }}" />

    @yield('style')


    {{-- Boostrap css min --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Color 1-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/color1.css') }}">


</head>

<body data-spy="scroll" data-bs-target=".navbar" data-offset="75" class="inner-page">

    <!-- loader-->
    <div class="loader-wrapper">
        <div id="loader">
            <div id="shadow"></div>
            <div id="box"></div>
        </div>
    </div>
    <!-- loader end-->

    @includeIf('frontend.layouts.partials.header')

    @yield('content')

    @includeIf('frontend.layouts.partials.footer')

    <!-- Latest jquery -->
    {{-- <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Bootstrap js -->
    {{-- <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
        <!-- Popper js 
        -->
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <!-- Owl carousel js -->
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <!-- Tilt js js -->
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <!-- Slider js js -->
    <script src="{{ asset('frontend/js/slider.js') }}"></script>

    <script src="{{ asset('frontend/js/swiper.min.js') }}"></script>

    @yield('js')

    <!-- script js file-->
    <script src="{{ asset('frontend/js/script.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".comment-reply").click(function() {
                $("#message").focus();
                $("#parent_id").val(this.id);
                console.log(this.id);
            });
        });
    </script>

</body>

</html>
