@extends('customs.crud')

@section('columns')
    <th>Documento</th>
    <th>Cliente</th>
    <th>Pedido</th>
    <th>Observaciones</th>
    <th>Fecha entrega</th>
    <th>Fecha creación</th>
    <th>Estado</th>
    <th>Acciones</th>
@endsection

@section('crud-styles')
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/ui-feather.css')) }}">
    {{-- Flatpicker --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('crud-scripts')
    <script src="{{ asset(mix('js/scripts/pages/pedidos/pizarra.js')). '?v='.$APP_VERSION }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('form')
@endsection

@section('modales')
    @include('modales.pedidos.offcanvas-pedidos')

    <div class="modal fade" id="modalUsuarioImagen" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Imagen del cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <img src="" alt="imgUsuarioModal" id="imgUsuarioModal">
                    </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-label-secondary" data-bs-dismiss="modal">Close</button>
{{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
