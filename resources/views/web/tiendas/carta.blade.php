<div class="card" id="main-carta">
    <div class="card-body">
        <h5 class="carta-titulo mb-75">NUESTROS PRODUCTOS</h5>
{{--        <p>Buscador</p>--}}

        <div id="carta">
            @if(isset($tienda->categorias) && sizeof($tienda->categorias) > 0)
                @foreach($tienda->categorias as $categoria)
                    <div class="categoria">
                        <p class="categoria-titulo">{{$categoria->nombre}}</p>
                    </div>

                    @foreach($categoria->productos as $producto)
                        @include('web.tiendas.producto')
                    @endforeach
                @endforeach
            @else
            <div class="d-flex align-items-center">
                <i class="ti ti-info-circle me-50"></i>
                <p class="m-0">Este establecimiento no tiene productos</p>
            </div>
                <p class="m-0 mt-1">Recuerda que puedes pedir productos haciendo a una foto a tu nota de la nevera o escribir que es lo que quieres 🍇🍉</p>
            @endif




        </div>
    </div>
</div>
