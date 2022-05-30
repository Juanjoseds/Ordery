$(function () {

    initCardsDraggable()
    initListsDraggable()

});

let dragulaCard, dragulaList;

function initCardsDraggable(){
    dragulaCard = dragula([document.getElementById('card-drag-area')]);
}

function initListsDraggable(){
    dragulaList = dragula([document.getElementById('basic-list-group')]);
}

function destroyCardsDraggable(){
    dragulaCard.destroy();
}

function destroyListsDraggable(){
    dragulaList.destroy();
}
