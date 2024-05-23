<div class="card" id="main-carta">
    <div class="card-body">
        <h5 class="carta-titulo mb-75">NUESTROS PRODUCTOS</h5>
        <p>Buscador</p>

        <div id="carta">
            <div class="categoria">
                <p class="categoria-titulo">PANADERIA</p>
            </div>

            @foreach(range(1,4) as $producto)
                @include('web.tiendas.producto')
            @endforeach

        </div>
    </div>
</div>
