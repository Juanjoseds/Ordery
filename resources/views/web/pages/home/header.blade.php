<div id="main-header" class="hero-anime">

    <div class="navigation-wrap start-header start-style">
        <div class="px-4">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-md navbar-gray pb-0">

                        <a class="navbar-brand" href="{{route('home')}}" target="_blank">Ordery</a>

                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav justify-content-center w-100">
                                <li class="nav-item no-effects">
{{--                                    <div class="input-group input-group-merge">--}}
{{--                                        <span class="input-group-text"><i class="ti ti-search"></i></span>--}}
{{--                                        <input type="text" id="buscador" class="form-control" placeholder="Verduras" aria-label="Verduras">--}}
{{--                                    </div>--}}
{{--                                    <input class="form-control" type="text" name="buscador" id="buscador">--}}
                                    @include('web.pages.home.buscador')
                                </li>
                            </ul>

                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                                <li class="nav-item">
                                    @if(!isset($user_auth))
                                    <a class="nav-link" href="/login"><i class="ti ti-user ti-md"></i></a>
                                    @else
                                        <a class="nav-link dropdown-toggle d-flex" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                            <div class="user-nav d-sm-flex d-none flex-column text-end me-1">
                                              <span class="user-name fw-bolder">
                                                  {{$user_auth->nombre}}
                                              </span>
                                                @if($user_auth->tipo == 'tienda')
                                                    <span class="user-status">{{$user_auth->tienda->nombre}}</span>
                                                @else
                                                    <span class="user-status">Cliente</span>
                                                @endif
                                            </div>
                                            <span class="avatar">
                                                <img class="round" src="@if(isset($user_auth->avatar)){{$user_auth->avatar}} @else {{Avatar::create($user_auth->nombre)->toBase64()}} @endif" alt="avatar" height="40" width="40">
                                              <span class="avatar-status-online"></span>
                                            </span>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="/{{$user_auth->tipo}}/dashboard">Ir al panel</a>
                                            <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{route('logout')}}">Cerrar sesión</a>
                                            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                                @csrf
                                            </form>
                                        </div>
                                    @endif
                                </li>
                                <li class="nav-item ms-2 d-flex align-items-center">
                                    <a class="nav-link" href="/login"><i class="ti ti-heart ti-md"></i></a>
                                </li>


                                    <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1 ms-1">
                                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                            <i class="ti ti-shopping-cart ti-md"></i>
                                            <span class="badge bg-danger rounded-pill badge-notifications"><span class="carrito-cantidad">0</span></span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end py-0">
                                            <li class="dropdown-menu-header border-bottom">
                                                <div class="dropdown-header d-flex align-items-center py-1">
                                                    <h5 class="text-body mb-0 me-auto cart-title">Tu carrito (<span class="carrito-cantidad">0</span>)</h5>
                                                </div>
                                            </li>


                                            <li class="dropdown-notifications-list scrollable-container">
                                                <ul class="list-group list-group-flush" id="main-carrito-productos"></ul>
                                            </li>
                                            @if(isset($user_auth) && isset($tienda))
                                            <li class="dropdown-menu-footer border-top p-1">
                                                <button class="form-control btn btn-success" onclick="window.location.href='/checkout/{{$tienda->id}}'">¡Realizar el pedido!</button>
                                            </li>
                                            @else
                                                <li class="dropdown-menu-footer border-top p-1">
                                                    <button class="form-control btn btn-primary" onclick="window.location.href='/login'"><i class="ti ti-login me-50"></i>Inicia sesión para pedir</button>
                                                </li>
                                            @endif

                                        </ul>
                                    </li>
                            </ul>
                        </div>

                    </nav>
                </div>
            </div>
        </div>
    </div>

</div>

<script>

</script>
