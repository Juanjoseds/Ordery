@extends('customs.empty')

@section('content')

    <div id="main-metodos">
        <div class="row">
            @foreach($metodos as $metodo)
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="w-100 text-center d-flex align-items-center" style="height: 10rem;">
                                <img class="img-fluid m-auto" src="{{asset('images/pages/metodos-pago/'.strtolower($metodo->nombre).'.png')}}" style="width: auto; height: 100%;" alt="Card image cap" />
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <h6 class="card-text font-weight-bold">{{$metodo->nombre}}</h6>
                                <div class="d-flex flex-column align-items-end">
                                    <div class="custom-control custom-control-primary custom-switch">
{{--                                        @if($metodo->nombre != 'Efectivo en tienda')--}}
{{--                                            <button type="button" id="btn-{{$metodo->id}}" data-tipo="{{$metodo->nombre}}"--}}
{{--                                                    onclick="editMetodo('btn-{{$metodo->id}}')" class="btn p-0 mr-2"--}}
{{--                                                    @if(!$permiso_editar) disabled @endif><i class="far fa-edit"></i></button>--}}
{{--                                        @endif--}}
                                        <div class="form-check form-check-primary form-switch">
                                            <input type="checkbox" checked="" class="form-check-input" id="customSwitch3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>

@endsection

@section('crud-styles')
{{--    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">--}}
{{--    <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">--}}
{{--    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-file-uploader.css')) }}">--}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/ui-feather.css')) }}">
    {{-- Flatpicker --}}
{{--    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">--}}
{{--    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">--}}
@endsection

@section('crud-scripts')
{{--    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/extensions/dropzone.min.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('js/scripts/pages/tiendas/pizarra.js')). '?v='.$APP_VERSION }}"></script>--}}
{{--<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>--}}
{{--    <script src="{{asset(mix('js/scripts/ui/ui-feather.js'))}}"></script>--}}

@endsection

@section('form')
{{--    @include('content.expedientes.expedientesForm')--}}
@endsection

@section('modales')
{{--    @include('modal.modalFirma')--}}
@endsection
