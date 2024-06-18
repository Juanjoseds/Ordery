$(() =>{
    initRankingEstrellas();
    loadCartProducts();
    initImageUpload('display_uploaded','image_uploaded','image_upload');
    initOnChangeImage();
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
        tipo: 'producto',
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

function initOnChangeImage(){
    console.log('init');

    $('#image_upload').on('change',function(e){
        let img = $('#image_uploaded').val()
        $('.notas-subtitle').fadeOut(function (){
            $('.btn-foto').fadeIn();
        })
    });
}
function addImageCart(){
    let img = $('#image_uploaded').val();
    let tiendaId = $('#id_tienda').val();

    let productos = localStorage.getItem('productos') ? JSON.parse(localStorage.getItem('productos')) : [];

    let productoNew = {
        id: getRandomNumberBetween(200,100000),
        imagen: img,
        precio: 0,
        tipo: 'imagen'
    }

    // console.log(productos, Object.hasOwn(productos, 'id_tienda'))
    if(!Object.hasOwn(productos, 'id_tienda') || (Object.hasOwn(productos, 'id_tienda') && productos.id_tienda != tiendaId)){
        productos = {
            id_tienda: tiendaId,
            productos: [productoNew]
        };
    }else{
        productos.productos.push(productoNew);
    }


    localStorage.setItem('productos', JSON.stringify(productos));
    addCartLine(productoNew);
}

function addTextCart(){
    let texto = $('#textoPedido').val();
    let tiendaId = $('#id_tienda').val();

    let productos = localStorage.getItem('productos') ? JSON.parse(localStorage.getItem('productos')) : [];

    let productoNew = {
        id: getRandomNumberBetween(200,100000),
        texto: texto,
        precio: 0,
        tipo: 'texto'
    }

    // console.log(productos, Object.hasOwn(productos, 'id_tienda'))
    if(!Object.hasOwn(productos, 'id_tienda') || (Object.hasOwn(productos, 'id_tienda') && productos.id_tienda != tiendaId)){
        productos = {
            id_tienda: tiendaId,
            productos: [productoNew]
        };
    }else{
        productos.productos.push(productoNew);
    }


    localStorage.setItem('productos', JSON.stringify(productos));
    addCartLine(productoNew);
}

function getRandomNumberBetween(min,max){
    return Math.floor(Math.random()*(max-min+1)+min);
}



function loadCartProducts(){
    if(localStorage.getItem('productos') != null){
        let productos = JSON.parse(localStorage.getItem('productos'));

        if(Object.hasOwn(productos, 'productos') && typeof(productos.productos) == 'object' && productos.productos.length > 0){
            productos.productos.forEach((producto, index)=>{
                addCartLine(producto)
            })
        }
    }

}

function showTextArea(){
    $('.main-textarea').fadeIn();
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
