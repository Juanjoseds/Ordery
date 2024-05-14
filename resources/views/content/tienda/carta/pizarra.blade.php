@extends('customs.empty')

@section('content')
    <input type="hidden" id="categorias" name="categorias" value="{{@$categorias}}">
    @include('content.tienda.carta.banner')
    @include('content.tienda.carta.botones')
    @include('content.tienda.carta.cards')
    @include('content.tienda.carta.bases')

@endsection

@section('crud-styles')
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/ui-feather.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-drag-drop.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/dragula.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/web/panel/carta/pizarra.css')) }}">
@endsection

@section('crud-scripts')
    <script src="{{ asset(mix('js/scripts/pages/carta/pizarra.js')). '?v='.$APP_VERSION }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>

    {{-- DRAG & DROP --}}
    <script src="{{ asset(mix('vendors/js/extensions/dragula.min.js')) }}"></script>
@endsection

@section('modales')
        @include('modales.carta.offcanvas-carta-producto')
        @include('modales.carta.offcanvas-carta-categoria')
@endsection
