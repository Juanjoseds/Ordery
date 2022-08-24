@extends('web/layouts/webLayoutMaster')

@section('title', '')

@section('meta-description', 'Gestiona pedidos de tus clientes o realiza tu pedido a tu tienda favorita de una forma rápida y eficaz.')

@section('meta-keywords', 'Order Manager, Realizar pedido, Online')

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/core.css')) }}" />
    <link href="{{ asset(mix('css/web/pages/home/home.css')) . '?v=' . $APP_VERSION }}" rel="stylesheet" media="print" onload="this.media='all'; this.onload=null;">

    {{-- FUENTES --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
@endsection

@section('content')
    @include('web.pages.home.header')
    @include('web.pages.home.info')
@endsection

@section('page-script')
    <script async defer src="{{ asset('js/web/pages/home.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
@endsection
