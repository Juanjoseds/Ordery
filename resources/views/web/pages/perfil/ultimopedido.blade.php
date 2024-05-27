<div id="ultimopedido">
    <div class="card">
        <div class="card-body">
            <div class="main-title d-flex align-items-center">
                <p class="ultimopedido-title m-0">Tu último pedido</p>
            </div>

            <div class="main-direccion ps-2">
                <p class="mt-25 mb-25">{{$ultimoPedido->tienda->nombre}}</p>
                <div class="d-flex align-items-center">
                    <i class="ti ti-map-pin-filled me-50"></i>
                    <span>{{$ultimoPedido->tienda->direccion}}</span>
                </div>
                <p class="mt-25 mb-25">{{$ultimoPedido->tienda->ciudad}}</p>
                {{--                <p class="mt-25 mb-25">{{$tienda->provincia}}</p>--}}
                <p class="mt-25 mb-25">{{$ultimoPedido->tienda->codigo_postal}}</p>
                <div class="d-flex align-items-center mt-25">
                    <i class="ti ti-phone me-50"></i>
                    <span>{{$ultimoPedido->tienda->telefono}}</span>
                </div>
                <div class="d-flex align-items-center mt-25">
                    <i class="ti ti-mail me-50"></i>
                    <span>{{$ultimoPedido->tienda->email}}</span>
                </div>
            </div>

            <div class="main-map mt-1">
                <iframe src="https://maps.google.com/maps?q={{$urlEncode}}&z=15&output=embed" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </div>
</div>

