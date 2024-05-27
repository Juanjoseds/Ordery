<div id="pedidos">
    <div class="card">
        <div class="card-body">
            <div class="main-title d-flex align-items-center">
                <i class="ti ti-invoice"></i>
                <p class="pedidos-title m-0">Últimos pedidos</p>
            </div>

            <div class="main-pedidos mt-1 ms-50">
                @foreach($pedidos as $pedido)
                <div class="row align-items-center">
                    <div class="col-4 text-start">
                        <p>{{$pedido->tienda->nombre}}</p>
                    </div>
                    <div class="col-3 text-center">
                        <p>{{\Carbon\Carbon::parse($pedido->tienda->created_at)->format('d/m/Y')}}</p>
                    </div>
                    <div class="col-3 text-center">
                        <p>{{$pedido->estado}}</p>
                    </div>
                    <div class="col-2">
                        <p>{{$pedido->precio}} €</p>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

