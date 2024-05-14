let dragulaCard, dragulaList;

$(function () {

    initCardsDraggable();
    loadCategoriesAndProducts();
    // initListsDraggable();
    // console.log('ready', $('.btn-add-categoria'));
});

// Editar categorías
function initCardsDraggable(){
    destroyListsDraggable();
    dragulaCard = dragula([document.getElementById('card-drag-area')]);

    $('#card-drag-area .card-body').fadeOut();
    $('.list-group').fadeOut();
    $('.btn-add-producto').fadeOut();
    $('.btn-add-categoria').fadeIn();
}

function initListsDraggable(){
    console.log('produtossss drag');
    destroyCardsDraggable();
    dragulaList = dragula([document.getElementById('lista-productos')]);

    $('#card-drag-area .card-body').fadeIn();
    $('.list-group').fadeIn();
    $('.btn-add-producto').fadeIn();
    $('.btn-add-categoria').fadeOut();
}

function destroyCardsDraggable(){
    if(typeof(dragulaCard) != 'undefined') {
        dragulaCard.destroy();
    }
}

function destroyListsDraggable(){
    if(typeof(dragulaList) != 'undefined'){
        dragulaList.destroy();
    }
}

function destroyAllDraggables(){
    destroyCardsDraggable();
    destroyListsDraggable();

    $('.btn-add-categoria').fadeOut();
    $('.btn-add-producto').fadeOut();
}

function abrirOffcanvasNuevoProducto(e){
    $('#offcanvas-carta').offcanvas('show');

    let idCategoria = $(e).parents('.categoria').data('id');
    $('#categoriaId').val(idCategoria);
}

function abrirOffcanvasNuevaCategoria(){
    $('#offcanvas-carta-categoria').offcanvas('show');
}

function nuevaCategoria(id, nombre=null, descripcion=null){
    let cardnew = $('.categoria-new').clone();
    cardnew.removeClass('hidden').removeClass('categoria-new');

    // Seteamos correctamente la categoría
    if(nombre==null && descripcion == null){
        let form = $('#nueva-categoria-form').serializeArray();
        id = $('.categoria:not(.categoria-new)').length+1; // TODO: Cambiar al último ID +1
        nombre = form[0].value;
        descripcion = form[1].value;
    }

    // Seteamos la información
    cardnew.find('.categoria-titulo').text(nombre);
    cardnew.find('.categoria-descripcion').text(descripcion);

    // Ocultamos el botón de Nuevo producto
    cardnew.find('.btn-add-producto').hide();

    $('#card-drag-area').append(cardnew);
    $('.categoria:not(.categoria-new):last').attr('data-id',id);
    $('#offcanvas-carta-categoria').offcanvas('hide');
    activarGuardado();
}

function nuevoProducto(nombre=null, descripcion=null, precio=null, idCategoria=null){
    let productoNew = $('.producto-new').clone();
    productoNew.removeClass('hidden').removeClass('producto-new');

    // Seteamos correctamente el producto
    if(nombre==null && descripcion == null) {
        let form = $('#producto-form').serializeArray();
        nombre = form[1].value;
        descripcion = form[2].value;
        precio = form[3].value;
    }

    console.log(precio);
    productoNew.find('.producto-titulo').text(nombre);
    productoNew.find('.producto-descripcion').text(descripcion);
    productoNew.find('.producto-precio').text(precio);

    if(idCategoria == null){
        idCategoria = $('#categoriaId').val();
        console.log(idCategoria, $(`.categoria[data-id=${idCategoria}]`));
    }

    $(`.categoria[data-id='${idCategoria}']`).find('.lista-productos').append(productoNew);

    $('#offcanvas-carta-producto').offcanvas('hide');
    activarGuardado();
}

function activarGuardado(activo = true){
    activo ? $('.btn-guardar').fadeIn() : $('.btn-guardar').fadeOut();
}

/**
 * let carta = {
 *     'categoria1': [
 *         [titulo: pepe, desc: pepe, precio: 2]
 *     ]
 * }
 *
 *
 */

function guardarCarta(){
    let carta = [];
    let categorias = $('.categoria:not(.categoria-new)');

    categorias.each(function (index) {
        console.log($(this));
        let categoriaNombre = $(this).find('.categoria-titulo').text();
        let categoriaDescripcion = $(this).find('.categoria-descripcion').text();
        let productos = $(this).find('.producto');
        let cartaProductos = [];

        productos.each(function (index){
            let arrayProductos = {
                'titulo': $(this).find('.producto-titulo').text(),
                'descripcion': $(this).find('.producto-descripcion').text(),
                'precio': $(this).find('.producto-precio').text(),
                'imagen': $(this).find('img').attr('src')
            };
            cartaProductos.push(arrayProductos);
        });

        let categoria = {
            "titulo": categoriaNombre,
            "descripcion": categoriaDescripcion,
            "productos": [
                ...cartaProductos
            ]

        }

        carta[index] = categoria;
    });

    // Aquí debería validar que todo está bien

    // Se guarda
    $('#spinner-loading').fadeIn();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'guardarCarta',
        method: 'POST',
        data: {
            carta: JSON.stringify(carta)
        },
    }).done(response => {
        standardAjaxResponse('¡Actualizado/a!', response.mensaje);
    }).fail(errores => {
        customFormAjaxResponse(errores);
    }).always(() => {
        $('#spinner-loading').fadeOut();
    })
    activarGuardado(false);
}

function loadCategoriesAndProducts(){
    let categorias = $('#categorias').val();
    if(categorias == null || categorias == ''){
        return false;
    }

    categorias = JSON.parse(categorias);

    $.each(categorias, function( index, value ){
        // CATEGORÍAS
        nuevaCategoria(value.id, value.nombre, value.descripcion);

        if(value.productos != null && value.productos != []){
            $.each(value.productos, function( index2, value2 ){
                // console.log(value2.precio);
                nuevoProducto(value2.nombre, value2.descripcion, value2.precio, value.id);
            });
        }

    });

}
