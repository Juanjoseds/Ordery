@extends('web/layouts/webLayoutMaster')

@section('title', '')

@section('meta-description', 'Gestiona pedidos de tus clientes o realiza tu pedido a tu tienda favorita de una forma rápida y eficaz.')

@section('meta-keywords', 'Order Manager, Realizar pedido, Online')

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/core.css')) }}" />
{{--    <link href="{{ asset(mix('css/web/pages/home/home.css')) . '?v=' . $APP_VERSION }}" rel="stylesheet" media="print" onload="this.media='all'; this.onload=null;">--}}
@endsection

@section('content')
    SEARCH
    @include('web.pages.search.shops')
{{--    @include('web.pages.home.info')--}}
@endsection

@section('page-script')
{{--    <script async defer src="{{ asset('js/web/pages/home.js') }}"></script>--}}
@endsection
