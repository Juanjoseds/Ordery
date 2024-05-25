<div id="ubicacion">
    <div class="card">
        <div class="card-body p-0">
            <div class="main-title d-flex align-items-center mb-1 pt-1 ps-1">
                <i class="ti ti-map-2"></i>
                <p class="ubicacion-title m-0">¿Dónde recoger el pedido?</p>
            </div>

            <div class="main-direccion ps-2">
                <div class="d-flex align-items-center">
                    <i class="ti ti-map-pin-filled me-50"></i>
                    <span>{{$tienda->direccion}}</span>
                </div>
                <p class="mt-25 mb-25">{{$tienda->ciudad}}</p>
                <p class="mt-25 mb-25">{{$tienda->provincia}}</p>
                <p class="mt-25 mb-25">{{$tienda->codigo_postal}}</p>
                <div class="d-flex align-items-center mt-25">
                    <i class="ti ti-phone me-50"></i>
                    <span>{{$tienda->telefono}}</span>
                </div>
                <div class="d-flex align-items-center mt-25">
                    <i class="ti ti-mail me-50"></i>
                    <span>{{$tienda->email}}</span>
                </div>
            </div>

            <div class="main-map mt-1">
                <iframe src="https://maps.google.com/maps?q={{$urlEncode}}&z=15&output=embed" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </div>
</div>

