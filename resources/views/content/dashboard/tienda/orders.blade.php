@if(isset($pedidos) && $pedidos != [])
<div class="col-xl-8 col-lg-7 col-12">
    <div class="card h-100">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="card-title mb-0">Estadísticas</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row gy-3">
                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center">
                        <div class="badge rounded-pill bg-label-primary me-2 p-1"><i class="ti ti-box ti-sm"></i></div>
                        <div class="card-info">
                            <h5 class="mb-0">{{$pedidos['totalPedidos']}}</h5>
                            <small>Total pedidos</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center">
                        <div class="badge rounded-pill bg-label-primary me-2 p-1"><i class="ti ti-currency-dollar ti-sm"></i></div>
                        <div class="card-info">
                            <h5 class="mb-0">{{$pedidos['totalPrecio']}} €</h5>
                            <small>Total vendido</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center">
                        <div class="badge rounded-pill bg-label-primary me-2 p-1"><i class="ti ti-shopping-cart ti-sm"></i></div>
                        <div class="card-info">
                            <h5 class="mb-0">{{$productos}}</h5>
                            <small>Productos</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center">
                        <div class="badge rounded-pill bg-label-primary me-2 p-1"><i class="ti ti-clock ti-sm"></i></div>
                        <div class="card-info">
                            <h5 class="mb-0">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ultimoPedido->created_at)->format('d/m/Y H:i')}}</h5>
                            <small>Último pedido</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
