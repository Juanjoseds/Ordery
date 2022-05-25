@extends('customs.empty')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card knowledge-base-bg" style="background-image: url('/../../../../images/illustration/banner.png');background-size: cover; background-position: center; background-color: rgba(115, 103, 240, 0.12) !important;">
                <div class="card-header text-center justify-content-center">
                    <h4 class="card-title font-large-1">Tu carta</h4>
                </div>
                <div class="card-body">
                    <p class="card-text font-medium-2" style="text-align: center">
                        La carta es una herramienta muy importante tanto como para los nuevos clientes para que
                        conozcan los productos que vendes pero, además, para aquellos clientes habituales que
                        quieren consultar y realizar un pedido de forma rápida.
                    </p>
                    <p class="card-text font-medium-2" style="text-align: center">
                        Crea categorías donde dentro tendrás aquellos productos relacionados con la misma. ¡De esta manera será
                        rápido encontrar un producto para tus clientes! :)
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="card-drag-area">
        <div class="col-12 draggable">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Draggable Card 1</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group" id="basic-list-group">
                        <li class="list-group-item draggable">
                            <div class="d-flex">
                                <img src="http://vuexy.test/images/portrait/small/avatar-s-12.jpg" class="rounded-circle me-2" alt="img-placeholder" height="50" width="50">
                                <div class="more-info">
                                    <h5>Mary S. Navarre</h5>
                                    <span>Chupa chups tiramisu apple pie biscuit sweet roll bonbon macaroon toffee icing.</span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item draggable">
                            <div class="d-flex">
                                <img src="http://vuexy.test/images/portrait/small/avatar-s-1.jpg" class="rounded-circle me-2" alt="img-placeholder" height="50" width="50">
                                <div class="more-info">
                                    <h5>Samuel M. Ellis</h5>
                                    <span>Toffee powder marzipan tiramisu. Cake cake dessert danish.</span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item draggable">
                            <div class="d-flex">
                                <img src="http://vuexy.test/images/portrait/small/avatar-s-2.jpg" class="rounded-circle me-2" alt="img-placeholder" height="50" width="50">
                                <div class="more-info">
                                    <h5>Sandra C. Toney</h5>
                                    <span>Sugar plum fruitcake gummies marzipan liquorice tiramisu. Pastry liquorice chupa chupsake</span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item draggable">
                            <div class="d-flex">
                                <img src="http://vuexy.test/images/portrait/small/avatar-s-3.jpg" class="rounded-circle me-2" alt="img-placeholder" height="50" width="50">
                                <div class="more-info">
                                    <h5>Cleveland C. Goins</h5>
                                    <span>Toffee powder marzipan tiramisu. Cake cake dessert danish.</span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item draggable">
                            <div class="d-flex">
                                <img src="http://vuexy.test/images/portrait/small/avatar-s-4.jpg" class="rounded-circle me-2" alt="img-placeholder" height="50" width="50">
                                <div class="more-info">
                                    <h5>Linda M. English</h5>
                                    <span>Chupa chups tiramisu apple pie biscuit sweet roll bonbon macaroon toffee icing.</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 draggable">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Draggable Card 2</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Jelly beans sugar plum cheesecake cookie oat cake soufflé.Tootsie roll bonbon liquorice tiramisu pie
                        powder.Donut sweet roll marzipan pastry cookie cake tootsie roll oat cake cookie.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 draggable">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Draggable Card 3</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Jelly beans sugar plum cheesecake cookie oat cake soufflé.Tootsie roll bonbon liquorice tiramisu pie
                        powder.Donut sweet roll marzipan pastry cookie cake tootsie roll oat cake cookie.
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('crud-styles')
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/ui-feather.css')) }}">
    {{-- Flatpicker --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">

    {{-- DRAG & DROP --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-drag-drop.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/dragula.min.css')) }}">
@endsection

@section('crud-scripts')
    <script src="{{ asset(mix('js/scripts/pages/pedidos/pizarra.js')). '?v='.$APP_VERSION }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>

    {{-- DRAG & DROP --}}
    <script src="{{ asset(mix('vendors/js/extensions/dragula.min.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/extensions/ext-component-drag-drop.js')) }}"></script>
@endsection

@section('modales')
    {{--    @include('modales.pedidos.offcanvas-pedidos')--}}
@endsection
