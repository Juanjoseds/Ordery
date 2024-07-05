
@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{asset(mix('fonts/tabler/tabler-icons.min.css'))}}">
{{--  <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">--}}
  <link rel="stylesheet" href="{{ asset(mix('css/web/pages/dashboard/dashboard.css')) }}">
{{--  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">--}}
@endsection
@section('page-style')
  {{-- Page css files --}}
{{--  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">--}}
{{--  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">--}}
  {{-- TABLER --}}

{{--  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">--}}
@endsection

@section('content')
    <input type="hidden" id="pedidos" value="{{json_encode($pedidos)}}">
    <div class="row match-height">
        @include('content.dashboard.admin.welcome')
        @include('content.dashboard.tienda.orders')
    </div>

    <div class="row match-height">

    </div>

{{--    <div class="row match-height">--}}
{{--        @include('content.dashboard.tienda.profit')--}}
{{--    </div>--}}
@endsection

@section('vendor-script')
  <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>
@endsection
@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/dashboard/tienda/dashboard.js')) }}"></script>

@endsection
