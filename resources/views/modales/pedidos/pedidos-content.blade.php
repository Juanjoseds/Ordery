<div id="card-estado" class="card mb-2 bg-{{strtolower($pedido->estado)}}">
    <div class="card-body">
        <p class="card-text">
            <b>Estado:</b> <span class="pedido-estado">{{$pedido->estado}}</span>
        </p>
    </div>
</div>

<h4 class="card-title">Productos</h4>

<div id="pedido-productos">
    @if(isset($pedido->pedido) && isset($pedido->pedido->productos) && sizeof($pedido->pedido->productos) > 0)
        <div class="accordion accordion-margin" id="accordionMargin" data-toggle-hover="true">
            @foreach($pedido->pedido->productos as $i=>$producto)
                @if(isset($producto->precio))
                    {{--Es un producto normal guardado en la BBDD--}}
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingMarginOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMargin{{$i}}" aria-expanded="false" aria-controls="accordionMargin{{$i}}">
                            <div class="d-flex justify-content-between w-100 me-1">
                                <div>
                                    {{$producto->nombre}}
                                </div>
                                <div>
                                    {{$producto->cantidad}}x <b>{{$producto->precio}}€</b>
                                </div>
                            </div>

                        </button>
                    </h2>
                    <div id="accordionMargin{{$i}}" class="accordion-collapse collapse" aria-labelledby="headingMargin{{$i}}" data-bs-parent="#accordionMargin" style="">
                        <div class="accordion-body">
                            <div>
                                <div><b>Unidades: </b> {{$producto->cantidad}} uds.</div>
                                <div><b>Precio unidad: </b> {{$producto->precio}} €</div>
                                <div><b>Observaciones: </b> {{$pedido->observaciones}}</div>
                                <div class="text-primary font-medium-3"><b>Total: </b> {{$producto->precio * $producto->cantidad}} €</div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    {{--Es un una imagen--}}
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingMarginOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMargin{{$i}}" aria-expanded="false" aria-controls="accordionMargin{{$i}}">
                                <div class="d-flex justify-content-between w-100 me-1">
                                    <div>
                                        Imagen subida por el usuario
                                    </div>
                                    <div>
                                        <b>0€</b>
                                    </div>
                                </div>

                            </button>
                        </h2>
                        <div id="accordionMargin{{$i}}" class="accordion-collapse collapse" aria-labelledby="headingMargin{{$i}}" data-bs-parent="#accordionMargin" style="">
                            <div class="accordion-body">
                                <div>
                                    <a href="javascript:;" onclick='openImagen("{{$producto->imagen}}")'><img src="{{$producto->imagen}}" alt="imagen" style="width: 100%" ></a>
                                    <div class="mt-25">Recuerda actualizar el total del pedido acorde a lo solicitado por el cliente</div>
{{--                                    <div><b>Precio unidad: </b> {{$producto->precio}} €</div>--}}
{{--                                    <div><b>Observaciones: </b> {{$pedido->observaciones}}</div>--}}
{{--                                    <div class="text-primary font-medium-3"><b>Total: </b> {{$producto->precio * $producto->cantidad}} €</div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <h4 class="card-title text-primary mt-2 mb-0">Total: <b class="precioTotal">{{$pedido->precio}} €</b></h4>
        @if(isset($pedido->pedido->precio) && ($pedido->pedido->precio != $pedido->precio))
            <small><i class="ti ti-info-circle me-25"></i>El precio ha sido modificado por la tienda</small>
        @endif

        <div class="main-cambiartotales mb-1">
            <button type="button" class="btn-cambiar-totales btn rounded-pill bg-gradient-warning waves-effect w-100" onclick="showCambiarTotales()">Cambiar total del pedido</button>

            <div class="bloque-totales input-group rounded-pill mt-50" style="display: none">
                <input id="nuevoTotal" type="text" class="form-control" placeholder="Nuevo total">
                <span class="input-group-text">€</span>
            </div>

            <button type="button" class="btn-guardar-total btn rounded-pill bg-gradient-success waves-effect w-100 mt-50" onclick='showCambiarTotales("{{$pedido->id}}")' style="display: none;"><i class="ti ti-receipt-2"></i> Actualizar precio</button>

        </div>

        <div class="row main-estados">
            @if($pedido->estado != "Pendiente")
                <div class="col-6">
                    <button type="button" class="btn bg-pendiente waves-effect mb-1 w-100" onclick='changeEstado("{{$pedido->id}}", "Pendiente")'>Pendiente</button>
                </div>
            @endif
            @if($pedido->estado != "Preparado")
            <div class="col-6">
                <button type="button" class="btn bg-preparado waves-effect mb-1 w-100" onclick='changeEstado("{{$pedido->id}}", "Preparado")'>Preparado</button>
            </div>
            @endif
            @if($pedido->estado != "Preparacion")
            <div class="col-6">
                <button type="button" class="btn bg-preparacion waves-effect mb-1 w-100" onclick='changeEstado("{{$pedido->id}}", "Preparacion")'>En preparación</button>
            </div>
            @endif
            @if($pedido->estado != "Cancelado")
            <div class="col-6">
                <button type="button" class="btn bg-cancelado waves-effect mb-1 w-100" onclick='changeEstado("{{$pedido->id}}", "Cancelado")'>Cancelado</button>
            </div>
            @endif
            @if($pedido->estado != "Finalizado")
            <div class="col-6">
                <button type="button" class="btn bg-finalizado waves-effect mb-1 w-100" onclick='changeEstado("{{$pedido->id}}", "Finalizado")'>Finalizado</button>
            </div>
            @endif
        </div>
    @else
        <p class="text-danger"> <i class="fa-solid fa-circle-exclamation"></i> Parece que hay un error en este pedido. Por favor, contacte con el cliente.</p>
    @endif

</div>
