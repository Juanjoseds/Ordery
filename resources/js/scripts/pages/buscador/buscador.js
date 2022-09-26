$(() => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

function filtrar(page = 1){
    let formData = new FormData();
    let formulario = $('#filtros-form').serializeArray();

    $.each(formulario, function (key, input) {
        formData.append(input.name,input.value);
    });

    $.ajax({
        url: `/buscador`,
        method: 'POST',
        contentType: false,
        processData: false,
        data: formData,
    }).done(response => {
        $('#main-buscador').html(response);
    }).fail(error => {

    }).always(() => {
        $('#spinner-loading').fadeOut();
    })
}
