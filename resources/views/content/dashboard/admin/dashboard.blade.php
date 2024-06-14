
@extends('layouts/contentLayoutMaster')

@section('title', 'Administración')

@section('vendor-style')
  {{-- vendor css files --}}
{{--  <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">--}}
{{--  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">--}}
  <link rel="stylesheet" href="{{asset(mix('fonts/tabler/tabler-icons.min.css'))}}">
  <link rel="stylesheet" href="{{ asset(mix('css/web/pages/dashboard/dashboard.css')) }}">


@endsection
@section('page-style')
  {{-- Page css files --}}
{{--  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">--}}
{{--  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">--}}
{{--  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">--}}
@endsection

@section('content')
    <div class="row match-height">
        @include('content.dashboard.admin.welcome')
        @include('content.dashboard.admin.resumen')
    </div>
@endsection

@section('vendor-script')
  {{-- vendor files --}}
{{--  <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>--}}
{{--  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>--}}
{{--  <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>--}}
@endsection
@section('page-script')
  {{-- Page js files --}}
@endsection
