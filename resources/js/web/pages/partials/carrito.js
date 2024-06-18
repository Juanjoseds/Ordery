function addCartLine(producto){
    let mainCarrito = $('#main-carrito-productos');
    let html = ``;

    if(producto.tipo == 'producto'){
        let imagen = producto.imagen == null || producto.imagen == '' ? '/images/assets/product.png' : '/images/productos/' + producto.imagen;
        html = `
    <li class="list-group-item list-group-item-action dropdown-notifications-item producto-linea" data-id="${producto.id}">
        <div class="d-flex">
            <div class="avatar">
                <img src="${imagen}" alt class="h-auto rounded-circle">
            </div>
            <div class="producto ms-1 d-flex align-items-center justify-content-between w-100">
                <p class="m-0 producto-nombre">${producto.nombre}</p>
                <div class="main-precios">
                    <div class="d-flex align-content-center">
                        <div class="producto-precio">${producto.precio} €</div>
                        <i class="ti ti-trash ti-md text-danger producto-remove ms-1 mt-25" onclick="deleteProductCart('${producto.id}')"></i>
                    </div>
                </div>
            </div>
        </div>

    </li>
    `;
    }else if(producto.tipo == 'imagen'){
        html = `
        <li class="list-group-item list-group-item-action dropdown-notifications-item producto-linea" data-id="${producto.id}">
        <div class="d-flex">
            <div class="avatar">
                <img src="${producto.imagen}" alt class="h-auto rounded-circle">
            </div>
            <div class="producto ms-1 d-flex align-items-center justify-content-between w-100">
                <p class="m-0 producto-nombre">Imagen subida por tí</p>
                <div class="main-precios">
                    <div class="d-flex align-content-center">
                        <div class="producto-precio"></div>
                        <i class="ti ti-trash ti-md text-danger producto-remove ms-1 mt-25" onclick="deleteProductCart('${producto.id}')"></i>
                    </div>
                </div>
            </div>
        </div>

    </li>
        `;
    }else if(producto.tipo == 'texto'){
        html = `
        <li class="list-group-item list-group-item-action dropdown-notifications-item producto-linea" data-id="${producto.id}">
        <div class="d-flex">
            <div class="avatar">
                <img src="/images/web/tiendas/notas.jpg" alt class="h-auto rounded-circle">
            </div>
            <div class="producto ms-1 d-flex align-items-center justify-content-between w-100">
                <p class="m-0 producto-nombre">Texto subido por tí</p>
                <div class="main-precios">
                    <div class="d-flex align-content-center">
                        <div class="producto-precio"></div>
                        <i class="ti ti-trash ti-md text-danger producto-remove ms-1 mt-25" onclick="deleteProductCart('${producto.id}')"></i>
                    </div>
                </div>
            </div>
        </div>

    </li>
        `;
    }


    let totalProductos = parseInt($('.dropdown-header .carrito-cantidad').text(), 10) + 1;
    $('.carrito-cantidad').text(totalProductos);
    mainCarrito.append(html);

}
