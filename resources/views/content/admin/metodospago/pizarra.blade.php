@extends('customs.empty')

@section('content')

    <div id="main-metodos">
        <div class="row match-height">
            @foreach($metodos as $metodo)
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="w-100 text-center d-flex align-items-center" style="height: 12rem;">
                                <img class="img-fluid m-auto" src="{{asset('images/pages/metodos-pago/'.strtolower($metodo->nombre).'.png')}}" style="width: auto; height: 100%;" alt="Card image cap" />
                            </div>
                            <div class="d-flex justify-content-between mt-3 align-items-center">
                                <h6 class="card-text font-weight-bold">{{$metodo->nombre}}</h6>
                                <div class="d-flex flex-row align-items-center" style="height: 2em">
                                    @if($metodo->nombre != 'Efectivo')
                                        <button type="button" class="btn btn-flat-primary waves-effect cursor-pointer me-50">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    @endif
                                    <div class="custom-control custom-control-primary custom-switch">
                                        <div class="form-check form-check-primary form-switch">
                                            <input type="checkbox" class="form-check-input cursor-pointer" id="customSwitch3" @if($metodo->estado === 1) checked="" @endif>
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
{{--    <link href="{{ asset(mix('fonts/font-awesome/css/fontawesome.min.css')) }}"--}}
{{--          rel="stylesheet" media="print" onload="this.media='all'; this.onload=null;">--}}
{{--    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">--}}
{{--    <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">--}}
{{--    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-file-uploader.css')) }}">--}}
{{--    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/ui-feather.css')) }}">--}}
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
