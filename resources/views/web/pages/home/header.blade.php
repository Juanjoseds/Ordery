<div id="main-header" class="hero-anime">

    <div class="navigation-wrap bg-gray start-header start-style">
        <div class="px-4">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-md navbar-gray pb-0">

                        <a class="navbar-brand" href="" target="_blank">Ordery</a>

                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav justify-content-center w-100">
                                <li class="nav-item ps-4 ps-md-0 ms-md-4">
                                    <input class="form-control" type="text" name="buscador" id="buscador">
                                </li>
                            </ul>
{{--                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">--}}
{{--                                @php $routeName = Route::current()->getName()@endphp--}}
{{--                                <li class="nav-item ps-4 ps-md-0 ms-md-4">--}}
{{--                                    <a class="nav-link @if($routeName == 'home') active @endif" href="/">Home</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item ps-4 ps-md-0 ms-0 ms-md-4">--}}
{{--                                    <a class="nav-link @if($routeName == 'search') active @endif" href="/shops">Shops</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item ps-4 ps-md-0 ms-0 ms-md-4">--}}
{{--                                    <a class="nav-link" href="#">Contact</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    @if(!isset($user_auth))
                                    <a class="nav-link" href="/login"><i class="ti ti-user ti-md"></i></a>
                                    @else
                                        <a class="nav-link dropdown-toggle d-flex" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                            <div class="user-nav d-sm-flex d-none flex-column text-end me-1">
                                              <span class="user-name fw-bolder">
                                                  {{$user_auth->nombre . ' ' . $user_auth->apellidos}}
                                              </span>
                                                <span class="user-status">{{$user_auth->tipo}}</span>
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
                                <li class="nav-item ms-2">
                                    <a class="nav-link" href="/login"><i class="ti ti-heart ti-md"></i></a>
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
