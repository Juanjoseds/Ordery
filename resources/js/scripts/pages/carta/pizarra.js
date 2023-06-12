let dragulaCard, dragulaList;

$(function () {

    initCardsDraggable();
    // initListsDraggable();
    console.log('ready', $('.btn-add-categoria'));
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
    destroyCardsDraggable();
    dragulaList = dragula([document.getElementById('basic-list-group')]);

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

function nuevaCategoria(){
    let cardnew = $('.categoria-new').clone();
    cardnew.removeClass('hidden').removeClass('categoria-new');

    // Seteamos correctamente la categoría
    let form = $('#nueva-categoria-form').serializeArray();
    let id = $('.categoria:not(.categoria-new)').length+1; // TODO: Cambiar al último ID +1
    let nombre = form[0].value;
    let descripcion = form[1].value;

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

function nuevoProducto(){
    let productoNew = $('.producto-new').clone();
    productoNew.removeClass('hidden').removeClass('producto-new');

    // Seteamos correctamente el producto
    let form = $('#producto-form').serializeArray();
    let nombre = form[1].value;
    let descripcion = form[2].value;
    let precio = form[3].value;

    productoNew.find('.producto-titulo').text(nombre);
    productoNew.find('.producto-descripcion').text(descripcion);
    productoNew.find('.producto-precio').text(precio);

    let idCategoria = $('#categoriaId').val();
    console.log(idCategoria, $(`.categoria[data-id=${idCategoria}]`));
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
    let carta = {};
    let categorias = $('.categoria:not(.categoria-new)');

    categorias.each(function (index) {

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

        carta[$(this).find('.categoria-titulo').text()] = cartaProductos;
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
