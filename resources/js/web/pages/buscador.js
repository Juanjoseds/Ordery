function initBuscador(){
    let buscador = $('#search');
    let button = $('#button');
    let input = $('#input');

    // button.addEventListener('click', search);
    function search() {
        buscador.addClass('loading');
        window.open(`/shops?busqueda=${input.val()}`, '_self')
    }

    input.on('keydown', function() {
        if(event.keyCode === 13){
            search();
        }
    });
}


