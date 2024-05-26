$(() =>{
    initRankingEstrellas();
    loadCartProducts();
});

function initRankingEstrellas(){
    $(".valoracion-estrellas").rateYo({
        rating: 3.6,
        starWidth: "14px",
        spacing: "10px"
    });
}

function addProductCart(producto, tiendaId){
    producto = JSON.parse(producto);
    let productos = localStorage.getItem('productos') ? JSON.parse(localStorage.getItem('productos')) : [];

    let productoNew = {
        id: producto.id,
        nombre: producto.nombre,
        descripcion: producto.descripcion,
        precio: producto.precio,
        cantidad: 1,
        imagen: producto.imagen,
        id_tienda: tiendaId,
    }

    console.log(productos, Object.hasOwn(productos, 'id_tienda'))
    if(!Object.hasOwn(productos, 'id_tienda') || (Object.hasOwn(productos, 'id_tienda') && productos.id_tienda != tiendaId)){
        productos = {
            id_tienda: tiendaId,
            productos: [productoNew]
        };
    }else{
        productos.productos.push(productoNew);
    }


    localStorage.setItem('productos', JSON.stringify(productos));
    addCartLine(producto);
}

function addCartLine(producto){
    let mainCarrito = $('#main-carrito-productos');

    let html = `
    <li class="list-group-item list-group-item-action dropdown-notifications-item producto-linea" data-id="${producto.id}">
        <div class="d-flex">
            <div class="avatar">
                <img src="/images/productos/${producto.imagen}" alt class="h-auto rounded-circle">
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

    let totalProductos = parseInt($('.dropdown-header .carrito-cantidad').text(), 10) + 1;
    $('.carrito-cantidad').text(totalProductos);
    mainCarrito.append(html);

}

function loadCartProducts(){
    let productos = JSON.parse(localStorage.getItem('productos'));

    if(Object.hasOwn(productos, 'productos') && typeof(productos.productos) == 'object' && productos.productos.length > 0){
        productos.productos.forEach((producto, index)=>{
            addCartLine(producto)
        })
    }
}

function deleteProductCart(id){
    let productos = JSON.parse(localStorage.getItem('productos'));

    if(Object.hasOwn(productos, 'productos') && typeof(productos.productos) == 'object' && productos.productos.length > 0){
        productos.productos.forEach((producto, index)=>{
            if(producto.id == id){
                productos.productos.splice(index, 1);
                localStorage.setItem('productos', JSON.stringify(productos));
                deleteCartLine(id);
            }
        })
    }
}

function deleteCartLine(id){
    $(`.producto-linea[data-id=${id}]`).remove();
    let totalProductos = parseInt($('.dropdown-header .carrito-cantidad').text(), 10) - 1;
    $('.carrito-cantidad').text(totalProductos);
}
