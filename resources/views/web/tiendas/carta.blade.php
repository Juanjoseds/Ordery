<div class="card" id="main-carta">
    <div class="card-body">
        <h5 class="carta-titulo mb-75">NUESTROS PRODUCTOS</h5>
        <p>Buscador</p>

        <div id="carta">
            @foreach($tienda->categorias as $categoria)
                <div class="categoria">
                    <p class="categoria-titulo">{{$categoria->nombre}}</p>
                </div>

                @foreach($categoria->productos as $producto)
                    @include('web.tiendas.producto')
                @endforeach

            @endforeach




        </div>
    </div>
</div>
