@php
    $customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/fullLayoutMaster')

@section('title', 'Register Basic - Pages')

@section('vendor-style')
    <!-- Vendor -->
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
@endsection

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('css/base/pages/page-auth-tienda.css')}}">
    {{-- TABLER --}}
    <link rel="stylesheet" href="{{asset(mix('fonts/tabler/tabler-icons.min.css'))}}">
@endsection


@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-1">

                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
{{--                        <div class="app-brand justify-content-center mb-1 mt-1">--}}
{{--                            <a href="{{url('/')}}" class="app-brand-link gap-2">--}}
{{--                                <span class="app-brand-logo demo"></span>--}}
{{--                                <span class="app-brand-text demo text-body fw-bold ms-1">{{config('variables.templateName')}}</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
                        <!-- /Logo -->
                        <h4 class="mb-50 pt-50">Incrementa tus ventas con Ordery 🚀</h4>
                        <p class="mb-2">Tus productos estarán visibles para todo el mundo. ¡Solo ventajas!</p>

                        <form id="formAuthentication" class="mb-2" action="{{url('/tienda/register')}}" method="POST">
                             @csrf
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre" autofocus>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="apellidos" class="form-label">Apellidos</label>
                                        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Tu apellido" autofocus>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="dni" class="form-label">DNI</label>
                                        <input type="text" class="form-control" id="dni" name="dni" placeholder="Introduce tu DNI" autofocus>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="telefono" class="form-label">Teléfono</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="+34 699123111" autofocus>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Introduce tu email">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <label class="form-label" for="password">Contraseña</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    </div>
                                </div>
                            </div>

                            <h5 class="card-header ps-0"><i class="ti ti-building-store me-1"></i> Información sobre tu tienda</h5>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="nombretienda" class="form-label">Nombre de la tienda</label>
                                        <input type="text" class="form-control" id="nombretienda" name="nombretienda" placeholder="Mi tiendita">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="nombretiendalegal" class="form-label">Nombre Legal</label>
                                        <input type="text" class="form-control" id="nombretiendalegal" name="nombretiendalegal" placeholder="Mi tiendita S.L.">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="cif" class="form-label">CIF</label>
                                        <input type="text" class="form-control" id="cif" name="cif" placeholder="12345678X">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="descripcion" class="form-label">Descripción breve</label>
                                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="¡Vendemos los mejores panes!">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="direccion" class="form-label">Dirección</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="C/ Tomás Miller, 115">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="ciudad" class="form-label">Ciudad</label>
                                        <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Las Palmas de Gran Canaria">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="provincia" class="form-label">Provincia</label>
                                        <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Las Palmas">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="codigo_postal" class="form-label">Código postal</label>
                                        <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="35002">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="nombre_contacto" class="form-label">Nombre de persona de contacto</label>
                                        <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto" placeholder="RECEPCIÓN">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-1">
                                        <label for="url" class="form-label">URL que los clientes visitarán</label>
                                        <input type="text" class="form-control" id="url" name="url" placeholder="mi-tienda">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                                    <label class="form-check-label" for="terms-conditions">
                                        Acepto los
                                        <a href="javascript:void(0);">términos y condiciones</a>
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-primary d-grid w-100">
                                Registrarme
                            </button>
                        </form>



{{--                        <div class="d-flex justify-content-center w-100 flex-column align-items-center">--}}
{{--                                <span class="mb-50">¿Eres una tienda?</span>--}}
{{--                                <a href="{{url('/login')}}">--}}
{{--                                    <button class="btn btn-success">¡Registrate y empieza a vender!</button>--}}
{{--                                </a>--}}
{{--                        </div>--}}
{{--                        <p class="text-center">--}}

{{--                        </p>--}}

                        <p class="text-center">
                            <span>¿Ya tienes cuenta?</span>
                            <a href="{{url('/login')}}">
                                <span>Acceder</span>
                            </a>
                        </p>


                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>
@endsection
