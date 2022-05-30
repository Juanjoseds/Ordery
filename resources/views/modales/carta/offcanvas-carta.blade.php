<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas-carta" aria-labelledby="offcanvas-cartaLabel" style="visibility: visible;" aria-modal="true" role="dialog">
    <div class="offcanvas-header">
        <h5 id="offcanvas-pedidosLabel" class="offcanvas-title">Nuevo producto en <span id="nombre-categoria"></span></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div id="formulario-carta" class="offcanvas-body mx-0 flex-grow-0">
        <form class="{{$nameCrud}}-form pt-0">
            <div class="row">

                <div class="col-12">
                    <div class="form-group col-12">
                        <label for="nombre">Imagen del producto</label>
                        <div class="w-100 text-center">
                            <img id="display_uploaded" class="img-fluid cursor-pointer"
                                 style="width: 10em;"
                                 alt="Imagen agente"
                                 src="{{asset('images/assets/upload.svg')}}"
                            >
                            <br>
                            <small class="w-100"><i class="mr-50" data-feather="info"></i>Tamaño recomendado: 600 x 700</small>
                        </div>
                        <input type="text" hidden id="image_uploaded" name="imagen" style="position: absolute;z-index: -1;">
                        <input type="file" hidden id="image_upload">
                    </div>
                </div>

                <div class="row align-content-start">

                    <div class="col-12 mb-1 mt-1">
                        <div class="form-group">
                            <label for="nombre">Nombre del producto</label>
                            <input id="nombre" name="nombre" type="text" class="form-control"
                                   data-required="El campo nombre es requerido"
                                   data-minlength="3"
                            />
                        </div>
                    </div>
                    <div class="col-12 mb-1">
                        <div class="form-group">
                            <label for="nombre_legal">Descripción</label>
                            <input id="nombre_legal" name="nombre_legal" type="text" class="form-control"
                                   data-required="El campo nombre legal es requerido"
                                   data-minlength="3"
                            />
                        </div>
                    </div>
                    <div class="col-12 mb-1">
                        <div class="form-group">
                            <label for="cif">Precio</label>
                            <input id="cif" name="cif" type="text" class="form-control"
                                   data-required="El campo cif es requerido"
                                   data-minlength="3"
                            />
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
