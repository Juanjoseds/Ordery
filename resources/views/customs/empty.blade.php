@extends('layouts/contentLayoutMaster')

@section('title', 'Gestionar ' . $nameCrud)

@section('vendor-style')

@endsection

@section('page-style')

    @yield('crud-styles')
@endsection

@section('content')
    <!-- users list start -->
    <section class="app-user-list">
        <!-- list section start -->
        @yield('content')

        <!-- list section end -->
    </section>
    <!-- users list ends -->
    @yield('modales')
@endsection

@section('vendor-script')
    {{-- Vendor js files --}}
{{--    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.colVis.min.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>--}}

{{--    <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>--}}
{{--    --}}{{-- Quill Editor js files --}}
{{--    <script src="{{ asset(mix('vendors/js/editors/quill/katex.min.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/editors/quill/quill.min.js')) }}"></script>--}}
{{--     Sweet Alert --}}
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
{{--    --}}{{-- Flatpicker --}}
{{--    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>--}}
@endsection

@section('page-script')
    {{-- Page js files --}}
{{--    <script src="{{ asset(mix('js/scripts/custom/custom-datatable.js')) }}"></script>--}}
    <script src="{{ asset(mix('js/scripts/custom/custom-form.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/custom/custom-form-ajax-response.js')). '?v='.$APP_VERSION }}"></script>
    <script src="{{ asset('lang/es/backpanel/alertas.js') }}"></script>
{{--    <script src="{{ asset(('lang/es/backpanel/datatable.js')) }}"></script>--}}
    @yield('crud-scripts')
@endsection
