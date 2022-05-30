$(function () {

    initCardsDraggable()
    initListsDraggable()

});

let dragulaCard, dragulaList;

function initCardsDraggable(){
    dragulaCard = dragula([document.getElementById('card-drag-area')]);
    destroyListsDraggable();
}

function initListsDraggable(){
    dragulaList = dragula([document.getElementById('basic-list-group')]);
    destroyCardsDraggable();
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

function nuevoProductoCarta(){
    $('#offcanvas-carta').offcanvas('show');
}
