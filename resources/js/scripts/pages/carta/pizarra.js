$(function () {

    initCardsDraggable()
    initListsDraggable()

});

let dragulaCard, dragulaList;

// Editar categorías
function initCardsDraggable(){
    dragulaCard = dragula([document.getElementById('card-drag-area')]);
    destroyListsDraggable();

    $('.list-group').fadeOut();
    $('.btn-add-producto').fadeOut();
}

function initListsDraggable(){
    dragulaList = dragula([document.getElementById('basic-list-group')]);
    destroyCardsDraggable();

    $('.list-group').fadeIn();
    $('.btn-add-producto').fadeIn();
}

function destroyCardsDraggable(){
    dragulaCard.destroy();
}

function destroyListsDraggable(){
    dragulaList.destroy();
}

function destroyAllDraggables(){
    destroyCardsDraggable();
    destroyListsDraggable();
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
    let imagen = form[0].value;
    let nombre = form[1].value;
    let descripcion = form[2].value;

    cardnew.find('.categoria-titulo').text(nombre);
    $('#card-drag-area').append(cardnew);
    $('.categoria:not(.categoria-new):last').data('id',id);
    $('#offcanvas-carta-categoria').offcanvas('hide');
}

function nuevoProducto(){
    let productoNew = $('.producto-new').clone();
    productoNew.removeClass('hidden').removeClass('producto-new');

    // Seteamos correctamente el producto
    let form = $('#producto-form').serializeArray();
    let nombre = form[1].value;
    productoNew.find('.producto-titulo').text(nombre);

    let idCategoria = $('#categoriaId').val();
    console.log(idCategoria, $(`.categoria[data-id=${idCategoria}]`));
    $(`.categoria[data-id='${idCategoria}']`).find('.lista-productos').append(productoNew);

    $('#offcanvas-carta-producto').offcanvas('hide');
}
