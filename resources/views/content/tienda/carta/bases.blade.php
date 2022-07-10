<div class="hidden">
    {{-- Nueva categoría --}}
    <div class="col-12 draggable categoria hidden categoria-new" data-id>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-capitalize categoria-titulo">Nueva categoría</h4>
                <div>
                    <button type="button" class="btn btn-outline-primary waves-effect btn-add-producto" onclick="abrirOffcanvasNuevoProducto(this)">
                        <i class="fa-solid fa-plus"></i>
                        <span>Nuevo producto</span>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group lista-productos"></ul>
            </div>
        </div>
    </div>

    {{-- Nuevo producto --}}
    <li class="list-group-item draggable producto producto-new hidden">
        <div class="d-flex">
            <img src="http://vuexy.test/images/portrait/small/avatar-s-12.jpg" class="rounded-circle me-2" alt="img-placeholder" height="50" width="50">
            <div class="more-info">
                <h5 class="producto-titulo">Mary S. Navarre</h5>
                <span>Chupa chups tiramisu apple pie biscuit sweet roll bonbon macaroon toffee icing.</span>
            </div>
        </div>
        <div class="d-flex precio">
            10€
        </div>
    </li>
</div>
