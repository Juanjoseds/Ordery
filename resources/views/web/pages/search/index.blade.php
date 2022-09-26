@extends('layouts/searchlayoutMaster')

@section('title', 'Shop')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/nouislider.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sliders.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-ecommerce.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content-sidebar')
    @include('web.pages.search.sidebar')
@endsection

@section('content')
    @include('web.pages.search.shops')
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/extensions/wNumb.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/nouislider.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')
    <script src="{{ asset(mix('js/scripts/pages/app-ecommerce.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/buscador/buscador.js')) }}"></script>
@endsection
