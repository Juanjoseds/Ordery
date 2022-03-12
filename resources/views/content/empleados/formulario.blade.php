@extends('layouts/contentLayoutMaster')

@section('title', 'Empleado')

@section('vendor-style')
    {{-- Vendor Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
{{--    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">--}}
@endsection

@section('content')
    <!-- users edit start -->
    <section class="app-user-edit">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <input type="hidden" id="tipoUsuario" value="{{ $user_auth->tipo }}">
                    <input type="hidden" id="method" value="{{ $method }}">
                    <!-- informacion Tab starts -->
                    <div class="tab-pane active" id="informacion" aria-labelledby="informacion-tab" role="tabpanel">
                        @include('content.empleados.tab-informacion')

                    </div>
                    <!-- informacion Tab ends -->

                </div>
            </div>
        </div>
    </section>
    <!-- users edit ends -->
@endsection

@section('vendor-script')
    {{-- Vendor js files --}}
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/custom/custom-form.js')). '?v='.$APP_VERSION }}"></script>
    <script src="{{ asset(mix('js/scripts/custom/custom-form-ajax-response.js')). '?v='.$APP_VERSION }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/empleados/formulario.js')). '?v='.$APP_VERSION }}"></script>
    <script src="{{ asset(mix('js/scripts/components/components-navs.js')) . '?v='.$APP_VERSION}}"></script>
    {{-- Sweet Alert --}}
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@endsection
