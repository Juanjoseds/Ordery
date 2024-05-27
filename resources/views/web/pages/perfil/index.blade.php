@extends('web/layouts/webLayoutMaster')

@section('title', 'Tu perfil | Ordery')

@section('meta-description', 'Gestiona pedidos de tus clientes o realiza tu pedido a tu tienda favorita de una forma rápida y eficaz.')

@section('meta-keywords', 'Tu perfil , Order Manager, Realizar pedido, Online')

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/core.css')) }}"/>
{{--    <link href="{{ asset(mix('css/web/pages/tienda/tienda.css')) . '?v=' . $APP_VERSION }}" rel="stylesheet">--}}
    <link href="{{ asset(mix('css/web/pages/header.css')) . '?v=' . $APP_VERSION }}" rel="stylesheet">
    <link href="{{ asset(mix('css/web/pages/partials/footer.css')) . '?v=' . $APP_VERSION }}" rel="stylesheet">
    <link href="{{ asset(mix('css/web/pages/partials/tusdatos.css')) . '?v=' . $APP_VERSION }}" rel="stylesheet">
    <link href="{{ asset(mix('css/web/pages/perfil/perfil.css')) . '?v=' . $APP_VERSION }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">--}}
@endsection

@section('content')
    @include('web.pages.home.header')

    <div id="perfil" class="m-2">
        <div class="row">
            <div class="col-lg-4 col-12 order-2 order-lg-1">
                @include('web.pages.perfil.ultimopedido')
            </div>

            <div class="col-lg-5 col-12 order-2 order-lg-1">
                @include('web.pages.perfil.pedidos')
            </div>

            <div class="col-lg-3 col-12 order-2 order-lg-1">
                @include('web.layouts.tusdatos')
                @include('web.pages.perfil.ayuda')
            </div>

        </div>

<div class="p-3">
    @include('web.pages.home.establecimientos')
</div>



    </div>
    @include('web.pages.home.footer')

@endsection

@section('page-script')
    <script async defer src="{{ asset('js/web/pages/perfil.js') }}"></script>
    <script async defer src="{{ asset('js/web/pages/buscador.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>--}}
@endsection
