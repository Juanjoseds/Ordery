
@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard Ecommerce')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
{{--  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">--}}
@endsection
@section('page-style')
  {{-- Page css files --}}
{{--  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">--}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
{{--  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">--}}
@endsection

@section('content')
    <input type="hidden" id="pedidos" value="{{json_encode($pedidos)}}">
    <div class="row match-height">
        @include('content.dashboard.admin.welcome')
    </div>

    <div class="row match-height">
        @include('content.dashboard.tienda.orders')
    </div>

    <div class="row match-height">
        @include('content.dashboard.tienda.profit')
    </div>
@endsection

@section('vendor-script')
  {{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/dashboard/tienda/dashboard.js')) }}"></script>
@endsection
