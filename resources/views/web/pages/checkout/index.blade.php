@extends('web/layouts/webLayoutMaster')

@section('title', 'Ordery | Checkout | Haz tu pedido y recógelo')

@section('meta-description', 'Gestiona pedidos de tus clientes o realiza tu pedido a tu tienda favorita de una forma rápida y eficaz.')

@section('meta-keywords', 'Order Manager, Realizar pedido, Online')

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/core.css')) }}" />
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/vendors.min.css')) }}" />
    <link rel="stylesheet" href="{{ asset(mix('css/overrides.css')) }}" />
    <link href="{{ asset(mix('css/web/pages/partials/footer.css')) . '?v=' . $APP_VERSION }}" rel="stylesheet">
    <link href="{{ asset(mix('css/web/pages/checkout/checkout.css')) . '?v=' . $APP_VERSION }}" rel="stylesheet" media="print" onload="this.media='all'; this.onload=null;">
    <link href="{{ asset(mix('css/web/pages/header.css')) . '?v=' . $APP_VERSION }}" rel="stylesheet" media="print" onload="this.media='all'; this.onload=null;">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>

@endsection

@section('content')
    @include('web.pages.home.header')
    <div id="user-profile" class="m-2">
        <section id="profile-info">
            <div class="row">

                <div class="col-lg-4 col-12 order-1 order-lg-1">
                    @include('web.pages.checkout.detalles')
                    @include('web.pages.checkout.instrucciones')
                </div>
                <div class="col-lg-3 col-12 order-2 order-lg-2">
                    @include('web.pages.checkout.ubicacion')
                </div>

                <div class="col-lg-4 col-12 order-1 order-lg-2">
                    @include('web.pages.checkout.tusdatos')
                    @include('web.pages.checkout.tiempopreparacion')
                    @include('web.pages.checkout.finalizarpedido')
    {{--                @include('web.tiendas.texto-compra')--}}
    {{--                @include('web.tiendas.valoraciones')--}}
                </div>

    {{--            <div class="col-lg-4 col-12 order-3 order-lg-3">--}}
    {{--                @include('web.tiendas.promociones')--}}
    {{--            </div>--}}


            </div>


        </section>
    </div>

    @include('web.pages.home.footer')
@endsection

@section('page-script')
    <script async defer src="{{ asset('js/web/pages/checkout.js') }}"></script>
    <script async defer src="{{ asset('js/web/pages/buscador.js') }}"></script>
{{--    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>--}}


@endsection
