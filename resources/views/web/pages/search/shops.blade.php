<section id="main-shops">


        @if(isset($tiendas) && sizeof($tiendas) > 0)
            <div class="d-flex resultados-title align-items-center mt-2 mb-2">
                <i class="ti ti-search"></i>
                <p class="m-0">Hay <b>{{$busqueda}}</b> en estos {{sizeof($tiendas)}} establecimientos</p>
            </div>


            <div class="row match-height">
                @foreach($tiendas as $tienda)
                    <div class="col-3">

                            <div class="card card-developer-meetup cursor-pointer" onclick="window.open('/shops/{{$tienda->url}}', '_self')">
                                <div class="bg-light-primary rounded-top text-center">
                                    <img src="/images/illustration/api.svg" alt="Meeting Pic" height="170" class="">
                                </div>
                                <div class="card-body">
                                    <div class="meetup-header d-flex align-items-center">

                                        <div class="my-auto">
                                            <h4 class="card-title mb-25">{{$tienda->nombre}}</h4>
                                            <p class="tienda-descripcion card-text mb-0">{{$tienda->descripcion}}</p>
                                        </div>
                                    </div>
                                    <div class="media d-flex">
                                        <div class="media-aside me-1 align-self-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-map-pin">
                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                <circle cx="12" cy="10" r="3"></circle>
                                            </svg>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-0">
                                                {{$tienda->direccion}}
                                            </h6>
                                            <small>{{$tienda->ciudad}}</small>
                                        </div>
                                    </div>
                                </div>

                            </div>


                    </div>
                @endforeach
            </div>

        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item prev">
                    <a class="page-link waves-effect" href="javascript:void(0);"><i class="ti ti-chevrons-left ti-xs"></i></a>
                </li>
                @foreach(range(1, $tiendas->lastPage()) as $pagina)
                <li class="page-item @if($tiendas->currentPage() == $pagina)active @endif">
                    <a class="page-link waves-effect" href="/busqueda?search={{$busqueda}}&page={{$pagina}}">{{$pagina}}</a>
                </li>
                @endforeach
                <li class="page-item next">
                    <a class="page-link waves-effect" href="javascript:void(0);"><i class="ti ti-chevrons-right ti-xs"></i></a>
                </li>
            </ul>
        </nav>
        @else
            <div class="row sin-resultados mt-3">
                <div class="col-12">
                    <p class="sin-resultados-title">Nuestra despensa está vacía...</p>
                    <p class="sin-resultados-subtitle">No hemos encontrado nada para "{{$busqueda}}" :(</p>
                </div>
            </div>

            @include('web.pages.home.necesitas')
        @endif

</section>
