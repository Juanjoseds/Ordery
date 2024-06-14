<div class="col-xl-8 col-md-6 col-12">
    <div class="card card-statistics">
        <div class="card-header">
            <h4 class="card-title">Resumen</h4>
        </div>
        <div class="card-body statistics-body" style="padding: 0rem 2.4rem 1.8rem !important;">
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12 mb-xl-0">
                    <div class="d-flex flex-row">
                        <div class="avatar bg-light-primary me-2">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up avatar-icon"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                            </div>
                        </div>
                        <div class="my-auto">
                            <h4 class="fw-bolder mb-0">{{$numeroTiendas}}</h4>
                            <p class="card-text font-small-3 mb-0">Tiendas totales</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                    <div class="d-flex flex-row">
                        <div class="avatar bg-light-info me-2">
                            <div class="avatar-content">
                                <i class="ti ti-shopping-cart ti-sm"></i>
                            </div>
                        </div>
                        <div class="my-auto">
                            <h4 class="fw-bolder mb-0">{{$numeroPedidos}}</h4>
                            <p class="card-text font-small-3 mb-0">Pedidos totales</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                    <div class="d-flex flex-row">
                        <div class="avatar bg-light-danger me-2">
                            <div class="avatar-content">
                                <i class="ti ti-box ti-sm"></i>
                            </div>
                        </div>
                        <div class="my-auto">
                            <h4 class="fw-bolder mb-0">{{$pedidosHoy}}</h4>
                            <p class="card-text font-small-3 mb-0">Pedidos hoy</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="d-flex flex-row">
                        <div class="avatar bg-light-success me-2">
                            <div class="avatar-content">
                                <i class="ti ti-currency-dollar ti-sm"></i>
                            </div>
                        </div>
                        <div class="my-auto">
                            <h4 class="fw-bolder mb-0">{{$totalPedidosHoy}} €</h4>
                            <p class="card-text font-small-3 mb-0">Total hoy</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
