@extends('web/layouts/webLayoutMaster')

@section('title', $tienda->nombre . ' | Ordery')

@section('meta-description', 'Gestiona pedidos de tus clientes o realiza tu pedido a tu tienda favorita de una forma rápida y eficaz.')

@section('meta-keywords', $tienda->nombre. ', Order Manager, Realizar pedido, Online')

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/core.css')) }}"/>
    <link href="{{ asset(mix('css/web/pages/tienda/tienda.css')) . '?v=' . $APP_VERSION }}" rel="stylesheet">
    <link href="{{ asset(mix('css/web/pages/header.css')) . '?v=' . $APP_VERSION }}" rel="stylesheet">
    <link href="{{ asset(mix('css/web/pages/partials/footer.css')) . '?v=' . $APP_VERSION }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
@endsection

@section('content')
    @include('web.pages.home.header')

    <div id="user-profile" class="m-2">
        <div class="row">
            <div class="col-12">
                @include('web.tiendas.perfil')
            </div>
        </div>

        <section id="profile-info">
            <div class="row">

                <div class="col-lg-4 col-12 order-2 order-lg-1">
                    @include('web.tiendas.carta')
                </div>

                <div class="col-lg-4 col-12 order-1 order-lg-2">
                    @include('web.tiendas.notas-compra')
                    @include('web.tiendas.texto-compra')
                    @include('web.tiendas.valoraciones')
                </div>

                <div class="col-lg-4 col-12 order-3 order-lg-3">
                    @include('web.tiendas.promociones')
                </div>


            </div>


        </section>

    </div>
    @include('web.pages.home.footer')

@endsection

@section('page-script')
    <script async defer src="{{ asset('js/web/pages/tienda.js') }}"></script>
    <script async defer src="{{ asset('js/web/pages/buscador.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
@endsection
