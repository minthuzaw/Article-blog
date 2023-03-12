<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('favicon/blog.png') }}">
    <title>{{ config('app.name', 'Blog') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app_.css') }}">
    <link rel="stylesheet" href="{{ asset('css/btn.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    @yield('css-content')
</head>
<body>
<div id="app">

    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "1994245577329999");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                xfbml: true,
                version: 'v15.0'
            });
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!--nav-bar-->
    <x-nav-bar/>
    <div class="container-fluid g-0">
        <main class="pb-4">
            @yield('content')

            <button type="button"
                    id="btn-back-to-top">
                <i class="fa-solid fa-angle-up"></i>
            </button>
        </main>

        <x-footer/>
    </div>


</div>

<script src="{{ asset('js/btn-back-to-top.js') }}"></script>
<script src="{{ asset('js/isotope.pkgd.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
@stack('js-content')
{{--<script>--}}
{{--    /* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */--}}
{{--    var prevScrollpos = window.pageYOffset;--}}
{{--    window.onscroll = function () {--}}
{{--        var currentScrollPos = window.pageYOffset;--}}
{{--        if (prevScrollpos > currentScrollPos) {--}}
{{--            document.getElementById("navbar").style.top = "0";--}}
{{--        } else {--}}
{{--            document.getElementById("navbar").style.top = "-60px";--}}
{{--        }--}}
{{--        prevScrollpos = currentScrollPos;--}}
{{--    }--}}
{{--</script>--}}
</body>
</html>
