$(() =>{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    loadCartProducts();
    initCheckTerminos();
});


function addCartLine(producto){
    let mainCarrito = $('#main-carrito-productos');
    let html = ``;

    if(producto.hasOwnProperty('precio')){
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
    }else if(producto.hasOwnProperty('imagen')){
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
    }else if(producto.hasOwnProperty('texto')){
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

function addDetallesLine(producto){
    let mainCarrito = $('#tabla-pedido tbody');
    let html = '';

    if(producto.hasOwnProperty('precio')){
        let imagen = producto.imagen == null || producto.imagen == '' ? '/images/assets/product.png' : '/images/productos/' + producto.imagen;
        html = `
        <tr class="producto-linea" data-id="${producto.id}">
            <td>
                <div class="d-flex align-items-center">
                    <div class="avatar">
                        <img src="${imagen}" alt="${producto.nombre}">
                    </div>
                    <p class="producto-nombre m-0 ms-1">${producto.nombre}</p>
                </div>
            </td>
            <td>1</td>
            <td>${producto.precio} €</td>
            <td><i class="ti ti-trash ti-md text-danger producto-remove cursor-pointer" onclick="deleteProductCart('${producto.id}')"></i></td>
        </tr>
        `;
    }else if(producto.hasOwnProperty('imagen')){
        html = `
        <tr class="producto-linea" data-id="${producto.id}">
            <td>
                <div class="d-flex align-items-center">
                    <div class="avatar">
                        <img src="${producto.imagen}" alt="Imagen subida por el usuario">
                    </div>
                    <p class="producto-nombre m-0 ms-1">Imagen subida por tí</p>
                </div>
            </td>
            <td>1</td>
            <td>0 € *</td>
            <td><i class="ti ti-trash ti-md text-danger producto-remove cursor-pointer" onclick="deleteProductCart('${producto.id}')"></i></td>
        </tr>
        `;
    }else if(producto.hasOwnProperty('texto')){
        html = `
        <tr class="producto-linea" data-id="${producto.id}">
            <td>
                <div class="d-flex align-items-center">
                    <div class="avatar">
                        <img src="/images/web/tiendas/notas.jpg" alt="Texto subido por el usuario">
                    </div>
                    <p class="producto-nombre m-0 ms-1">Texto subido por tí</p>
                </div>
            </td>
            <td>1</td>
            <td>0 € *</td>
            <td><i class="ti ti-trash ti-md text-danger producto-remove cursor-pointer" onclick="deleteProductCart('${producto.id}')"></i></td>
        </tr>
        `;
    }


    mainCarrito.append(html);
}

subtotal = 0;
impuestos = 0;
total = 0;
function loadCartProducts(){
    if(localStorage.getItem('productos') != null) {
        let productos = JSON.parse(localStorage.getItem('productos'));

        if (Object.hasOwn(productos, 'productos') && typeof (productos.productos) == 'object' && productos.productos.length > 0) {
            productos.productos.forEach((producto, index) => {
                subtotal += producto.hasOwnProperty('precio') ? producto.precio : 0;
                addCartLine(producto)
                addDetallesLine(producto)
            })

            total = (subtotal * 1.07).toFixed(2);
            impuestos = (total - subtotal).toFixed(2);
        }
        calcularTotal();
    }
}

function calcularTotal(){
    $('.detalles-resumen').remove();
    let html = `
    <tr class="detalles-resumen resumen-subtotal">
        <td colspan="2">
            Subtotal
        </td>
        <td colspan="1">
            ${subtotal} €
        </td>
    </tr>

    <tr class="detalles-resumen resumen-impuestos">
        <td colspan="2">
            Impuestos (7%)
        </td>
        <td colspan="1">
            ${impuestos} €
        </td>
    </tr>

    <tr class="detalles-resumen resumen-total">
        <td colspan="2">
            TOTAL
        </td>
        <td class="precio-total" colspan="1">
            ${total} €
        </td>
    </tr>
    `;

    let mainCarrito = $('#tabla-pedido tbody');
    mainCarrito.append(html);
}

function deleteProductCart(id){
    subtotal = 0;
    impuestos = 0;
    total = 0;

    let productos = JSON.parse(localStorage.getItem('productos'));

    if(Object.hasOwn(productos, 'productos') && typeof(productos.productos) == 'object' && productos.productos.length > 0){
        productos.productos.forEach((producto, index)=>{
            if(producto.id == id){
                productos.productos.splice(index, 1);
                localStorage.setItem('productos', JSON.stringify(productos));
                deleteCartLine(id);
            }else{
                subtotal += producto.precio;
            }
        })
        total = (subtotal * 1.07).toFixed(2);
        impuestos = (total - subtotal).toFixed(2);
        calcularTotal()
    }
}

function deleteCartLine(id){
    $(`.producto-linea[data-id=${id}]`).remove();
    let totalProductos = parseInt($('.dropdown-header .carrito-cantidad').text(), 10) - 1;
    $('.carrito-cantidad').text(totalProductos);
    calcularTotal()
}

function initCheckTerminos() {
    $('#checkterminos').on('change', function (){
        if(this.checked) {
            $('#btn-realizarpedido').prop('disabled', false);
        }else{
            $('#btn-realizarpedido').prop('disabled', true);
        }
    })
}


function createOrder(){
    let tiendaId = $('#id_tienda').val();
    let productos = JSON.parse(localStorage.getItem('productos'));

    $.ajax({
        url: 'pedido',
        method: 'POST',
        data: {
            productos: productos,
            tiendaId: tiendaId
        },
    }).done(response => {
        if(response.hasOwnProperty('pedidoDoc')){
            window.location.href=`/checkout/pedido-finalizado/${response.pedidoDoc}`
        }
    }).fail(errores => {
        customFormAjaxResponse(errores);
    }).always(() => {
        $('#spinner-loading').fadeOut();
    })
}
