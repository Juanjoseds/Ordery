<!DOCTYPE html>
<html lang="@if (session()->has('locale')){{ session()->get('locale') }}@else es @endif">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="title" content="Ordery — Pide a tu tienda favorita">
    <meta name="description" content="@yield('meta-description')">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo/favicon.ico') }}">
    <meta name="theme-color" content="#2b338d">
    {{-- INDEXAR (si se desea) LAS PÁGINAS SOLO SI ESTOY EN PRODUCCIÓN --}}
    @if (config('app.env') == 'production')
        @yield('meta-robots')
    @else
        <meta name="robots" content="noindex">
    @endif
    <meta name="keywords" content="@yield('meta-keywords')">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{env('app_url')}}">
    <meta property="og:title" content="Ordery - Pide a tu tienda favorita">
    <meta property="og:description" content="Ordery - Pide a tu tienda favorita">
    <meta property="og:image" content="{{asset('/images/logos/image-meta.png')}}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{env('app_url')}}">
    <meta property="twitter:title" content="Ordery - Pide a tu tienda favorita">
    <meta property="twitter:description" content="Ordery - Pide a tu tienda favorita">
    <meta property="twitter:image" content="{{asset('/images/logos/image-meta.png')}}">
    {{-- Include Styles --}}
     <link rel="stylesheet" href="{{ asset('fonts/font-awesome/css/all.min.css')}}" crossorigin="anonymous">

    {{-- FUENTES --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&family=Fauna+One&family=Fira+Mono:wght@400;500;700&family=Indie+Flower&display=swap" rel="stylesheet">

    {{-- TABLER --}}
    <link rel="stylesheet" href="fonts/tabler/tabler-icons.min.css">

    @yield('page-style')
    @stack('extra-css')
</head>

<body class="@yield('body-class')">
        @yield('content')

    {{-- @include('panels/loading') --}}
    <!-- JavaScript Bundle with Popper -->
    <script src="{{ asset('js/web/core/jquery2.min.js') }}"></script>
    <script async defer src="{{ asset('js/web/core/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>
{{--    <script async defer src="{{ asset(mix('js/web/layout/global.js')) . '?v=' . $APP_VERSION }}"></script>--}}
{{--    <script async defer src="{{ asset(mix('js/web/layout/navbar.js')) . '?v=' . $APP_VERSION }}"></script>--}}
{{--    <script async src="{{ asset('js/scripts/banner.js') }}" data-cookiefirst-key="{{config('app.cookie_key')}}"></script>--}}
    @yield('page-script')
    @stack('extra-js')


    {{-- COOKIE FIRST SCRIPT--}}
{{--    <script>--}}
{{--       document.addEventListener('load',()=>{--}}
{{--           alert--}}
{{--           var script = document.createElement("script");--}}
{{--           script.setAttribute('src','https://consent.cookiefirst.com/banner.js');--}}
{{--           script.setAttribute('async',true);--}}
{{--           script.setAttribute('data-cookiefirst-key',"bf5e9761-fe6e-4c17-ba5a-7c8bb008ec6a");--}}
{{--           document.body.appendChild(script);--}}
{{--       })--}}

{{--    </script>--}}

{{--    <script async src="/js/scripts/banner.js" data-cookiefirst-key="bf5e9761-fe6e-4c17-ba5a-7c8bb008ec6a"></script>--}}
    <!-- Global site tag (gtag.js) - Google Analytics -->



</body>

</html>
