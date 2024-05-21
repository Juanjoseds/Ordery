let dragulaCard, dragulaList;

$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    initCardsDraggable();
    loadCategoriesAndProducts();
    // initListsDraggable();
    // console.log('ready', $('.btn-add-categoria'));
});

// Editar categorías
function initCardsDraggable(){
    destroyListsDraggable();
    dragulaCard = dragula([document.getElementById('card-drag-area')]);

    $('#card-drag-area .card-body, .btn-add-producto').fadeOut(function (){
        $('.btn-edit-producto, .btn-delete-producto').fadeOut(function (){
            $('.list-group').fadeOut();
            $('.btn-add-categoria').fadeIn();
            $('.btn-delete-categoria').fadeIn();
            $('.btn-edit-categoria').fadeIn();
        });
    });

}

// EDITAR PRODUCTOS
function initListsDraggable(){
    destroyCardsDraggable();
    dragulaList = dragula([document.getElementById('lista-productos')]);

    $('.btn-delete-categoria, .btn-edit-categoria, .btn-add-categoria').fadeOut(function (){
        $('.btn-add-producto').fadeIn();
        $('.btn-edit-producto').fadeIn();
        $('.btn-delete-producto').fadeIn();
        $('#card-drag-area .card-body').fadeIn();
        $('.list-group').fadeIn();
    });

    // $('.btn-delete-categoria').fadeOut(function (){

    // });
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

function abrirOffcanvasNuevoProducto(e, idProducto=null){

    $('#offcanvas-carta').offcanvas('show');

    if(idProducto != null){
        let producto = $(`.producto[data-id=${idProducto}]`);

        $('#producto-form #nombre').val(producto.find('.producto-titulo').text());
        $('#producto-form #descripcion').val(producto.find('.producto-descripcion').text());
        $('#producto-form #precio').val(producto.find('.producto-precio').val());
        $('#producto-form #producto_display_uploaded').attr('src', producto.find('.producto-imagen').attr('src'));
        $('#producto-form #id_producto').val(idProducto);
    }else{
        $('#producto-form #id_producto').val('')
    }

    let idCategoria = $(e).parents('.categoria').data('id');
    $('#categoriaId').val(idCategoria);

    initInputFile('producto', 2000);
}

function abrirOffcanvasNuevaCategoria(idCategoria=null){

    if(idCategoria != null){
        // Se está editando
        let categoria = $(`.categoria[data-id=${idCategoria}]`);
        let nombre = categoria.find('.categoria-titulo').text();
        let descripcion = categoria.find('.categoria-descripcion').text();

        console.log(categoria, nombre, descripcion);
        $('#nueva-categoria-form #nombre').val(nombre);
        $('#nueva-categoria-form #descripcion').val(descripcion);
        $('#nueva-categoria-form #idCategoria').val(idCategoria);
    }else{
        $('#nueva-categoria-form #nombre').val('');
        $('#nueva-categoria-form #descripcion').val('');
        $('#nueva-categoria-form #idCategoria').val('');
    }

    $('#offcanvas-carta-categoria').offcanvas('show');
}

function nuevaCategoria(id=null, nombre=null, descripcion=null){
    let cardnew = $('.categoria-new').clone();
    cardnew.removeClass('hidden').removeClass('categoria-new');

    // Seteamos correctamente la categoría
    if(nombre==null && descripcion == null){
        let form = $('#nueva-categoria-form').serializeArray();
        // id = $('.categoria:not(.categoria-new)').length+1;
        nombre = form[0].value;
        descripcion = form[1].value;

        activarGuardado();
    }

    let isEditing = $('#nueva-categoria-form #idCategoria').val();
    if(isEditing != null && isEditing != ''){
        // Se está editando
        let categoria = $(`.categoria[data-id=${isEditing}]`);
        categoria.find('.categoria-titulo').text($('#nueva-categoria-form #nombre').val());
        categoria.find('.categoria-descripcion').text($('#nueva-categoria-form #descripcion').val());
    }else{
        // Se está creando
        cardnew.find('.categoria-titulo').text(nombre);
        cardnew.find('.id_categoria').val(id);
        cardnew.find('.categoria-descripcion').text(descripcion);
        // Ocultamos el botón de Nuevo producto
        cardnew.find('.btn-add-producto').hide();
        cardnew.closest('.categoria').attr('data-id', id);

        $('#card-drag-area').append(cardnew);
    }

    // $('.categoria:not(.categoria-new):last').attr('data-id',id);
    let canvasModal =  $('#offcanvas-carta-categoria');
    canvasModal.offcanvas('hide');
    canvasModal.find('input').val('');

}

function nuevoProducto(nombre=null, descripcion=null, precio=null, imagen=null, idCategoria=null, idProducto=null){

    // Seteamos correctamente el producto
    if(nombre==null && descripcion == null) {
        let form = $('#producto-form').serializeArray();
        imagen = form[0].value == null || form[0].value == '' ? '/images/assets/product.png' : form[0].value;
        nombre = form[1].value;
        descripcion = form[2].value;
        precio = form[3].value;
        idProducto = form[4].value;

        activarGuardado();
    }

    let isEditing = $('#producto-form #id_producto').val();
    if(isEditing != null && isEditing != '' && isEditing != undefined){
        let producto = $(`.producto[data-id=${isEditing}]`);
        producto.find('.producto-titulo').text($('#producto-form #nombre').val());
        producto.find('.producto-descripcion').text($('#producto-form #descripcion').val());
        producto.find('.producto-precio-text').text($('#producto-form #precio').val() + ' €');
        producto.find('.producto-precio').val($('#producto-form #precio').val());
        producto.find('.producto-imagen').attr('src', $('#producto-form #producto_display_uploaded').attr('src'));
    }else{
        let productoNew = $('.producto-new').clone();
        productoNew.removeClass('hidden').removeClass('producto-new');
        productoNew.find('.producto-imagen').attr('src', imagen);
        productoNew.find('.producto-titulo').text(nombre);
        productoNew.find('.producto-descripcion').text(descripcion);
        productoNew.find('.producto-precio').val(precio);
        productoNew.find('.producto-precio-text').text(precio + ' €');
        productoNew.find('.id_producto').val(idProducto);
        productoNew.closest('.producto').attr('data-id',idProducto);

        if(idCategoria == null){
            idCategoria = $('#categoriaId').val();
        }
        $(`.categoria[data-id='${idCategoria}']`).find('.lista-productos').append(productoNew);
    }


    $('#offcanvas-carta-producto').offcanvas('hide');
    // activarGuardado();
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
        let idCategoria = $(this).find('.id_categoria').val();
        let categoriaDescripcion = $(this).find('.categoria-descripcion').text();
        let productos = $(this).find('.producto');
        let cartaProductos = [];

        productos.each(function (index){
            let arrayProductos = {
                'titulo': $(this).find('.producto-titulo').text(),
                'descripcion': $(this).find('.producto-descripcion').text(),
                'precio': $(this).find('.producto-precio').val(),
                'imagen': $(this).find('img').attr('src'),
                'id_producto': $(this).find('.id_producto').val()
            };
            cartaProductos.push(arrayProductos);
        });

        let categoria = {
            "id": idCategoria,
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
                nuevoProducto(value2.nombre, value2.descripcion, value2.precio,'/images/productos/' + value2.imagen, value.id, value2.id);
            });
        }

    });

}

function deleteCategory(e){
    let idCategoria = $(e).parents('.categoria').data('id');

    if(idCategoria != null && idCategoria != '') {
        $('#spinner-loading').fadeIn();
        $.ajax({
            url: 'deleteCategoria',
            method: 'POST',
            data: {
                id: idCategoria
            },
        }).done(response => {
            standardAjaxResponse('¡Borrado!', response.mensaje);
            $(`.categoria[data-id=${idCategoria}]`).remove();
        }).fail(errores => {
            customFormAjaxResponse(errores);
        }).always(() => {
            $('#spinner-loading').fadeOut();
        })
    }else{
        $(e).parents('.categoria').remove();
    }



}

function deleteProducto(e){
    let idProducto = $(e).parents('.producto').data('id');

    if(idProducto != null && idProducto != ''){
        $('#spinner-loading').fadeIn();
        $.ajax({
            url: 'deleteProducto',
            method: 'POST',
            data: {
                id: idProducto
            },
        }).done(response => {
            standardAjaxResponse('¡Borrado!', response.mensaje);
            $(`.producto[data-id=${idProducto}]`).remove();
        }).fail(errores => {
            customFormAjaxResponse(errores);
        }).always(() => {
            $('#spinner-loading').fadeOut();
        })
    }else{
        // Es un producto que no se ha guardado en BBDD aún, por lo que únicamente destruimos la fila.
        $(e).parents('.producto').remove();
    }
}

function editProducto(e) {
    let idProducto = $(e).parents('.producto').data('id');

    abrirOffcanvasNuevoProducto(e, idProducto);
}

function editCategory(e){
    let idCategoria = $(e).parents('.categoria').data('id');

    abrirOffcanvasNuevaCategoria(idCategoria);
    console.log(idCategoria)
}
