@extends('web/layouts/webLayoutMaster')

@section('title', '')

{{--@section('meta-description', 'Gestiona pedidos de tus clientes o realiza tu pedido a tu tienda favorita de una forma rápida y eficaz.')--}}

@section('meta-keywords', 'Order Manager, Realizar pedido, Online')

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/core.css')) }}" />
    <link href="{{ asset(mix('css/web/pages/search/search.css')) . '?v=' . $APP_VERSION }}" rel="stylesheet" media="print" onload="this.media='all'; this.onload=null;">
    <link href="{{ asset(mix('css/web/pages/header.css')) . '?v=' . $APP_VERSION }}" rel="stylesheet" media="print" onload="this.media='all'; this.onload=null;">
@endsection

@section('content')
    @include('web.pages.home.header')
    <div class="main-content">
        @include('web.pages.search.shops')
    </div>
    @include('web.pages.home.footer')
@endsection

@section('page-script')
    <script async defer src="{{ asset('js/web/pages/buscador.js') }}"></script>
    <script async defer src="{{ asset('js/web/pages/search.js') }}"></script>
{{--    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>--}}
@endsection
