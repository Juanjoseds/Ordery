@extends('customs.empty')

@section('content')

    @include('content.tienda.carta.banner')
    @include('content.tienda.carta.botones')
    @include('content.tienda.carta.cards')

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
    <script src="{{ asset(mix('js/scripts/pages/carta/pizarra.js')). '?v='.$APP_VERSION }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>

    {{-- DRAG & DROP --}}
    <script src="{{ asset(mix('vendors/js/extensions/dragula.min.js')) }}"></script>
{{--    <script src="{{ asset(mix('js/scripts/extensions/ext-component-drag-drop.js')) }}"></script>--}}
@endsection

@section('modales')
        @include('modales.carta.offcanvas-carta')
@endsection
