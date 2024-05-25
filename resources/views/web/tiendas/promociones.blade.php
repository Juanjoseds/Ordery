<div id="promociones">
    <div class="card">
        <div class="card-body">
            <div class="main-title d-flex align-items-center mb-1">
                <p class="valoraciones-title m-0">PROMOCIONES</p>
                <img src="{{asset('/images/pages/iconos/confeti.png')}}" alt="confeti">
            </div>

            <div class="productos-promociones">
                @if(isset($promociones) && sizeof($promociones) > 0)
                    @foreach(range(1,4) as $producto)
                        @include('web.tiendas.producto')
                    @endforeach
                @else
                    <div class="alerta">
                        <i class="ti ti-shopping-bag-exclamation"></i> No hay promociones actualmente
                    </div>

                @endif
            </div>

        </div>
    </div>
</div>

