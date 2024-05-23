<div id="promociones">
    <div class="card">
        <div class="card-body">
            <div class="main-title d-flex align-items-center mb-1">
                <p class="valoraciones-title m-0">PROMOCIONES</p>
                <img src="{{asset('/images/pages/iconos/confeti.png')}}" alt="confeti">
            </div>

            <div class="productos-promociones">
                @foreach(range(1,4) as $producto)
                    @include('web.tiendas.producto')
                @endforeach
            </div>

        </div>
    </div>
</div>

