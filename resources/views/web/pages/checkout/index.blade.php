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
    <link href="{{ asset(mix('css/web/pages/partials/tusdatos.css')) . '?v=' . $APP_VERSION }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>

@endsection

@section('content')
    @include('web.pages.home.header')
    <input type="hidden" name="id_tienda" id="id_tienda" value="{{$tienda->id}}">
    <div id="user-profile" class="m-2">
        <section id="profile-info">
            <div class="row">

                <div class="col-lg-4 col-12 order-1 order-lg-1">
                    @include('web.pages.checkout.detalles')
                    @include('web.pages.checkout.instrucciones')
                </div>
                <div class="col-lg-4 col-12 order-2 order-lg-2">
                    @include('web.pages.checkout.ubicacion')
                </div>

                <div class="col-lg-4 col-12 order-1 order-lg-2">
                    @include('web.layouts.tusdatos')
                    @include('web.pages.checkout.tiempopreparacion')
                    @include('web.pages.checkout.finalizarpedido')
                </div>


            </div>


        </section>
    </div>

    @include('web.pages.home.footer')
@endsection

@section('page-script')
    <script async defer src="{{ asset('js/web/pages/checkout.js') . '?v='.$APP_VERSION }}"></script>
    <script async defer src="{{ asset('js/web/pages/buscador.js') . '?v='.$APP_VERSION }}"></script>
    <script src="{{ asset(mix('js/scripts/custom/custom-form-ajax-response.js')). '?v='.$APP_VERSION }}"></script>
    {{-- Sweet Alert --}}
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
{{--    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>--}}


@endsection
