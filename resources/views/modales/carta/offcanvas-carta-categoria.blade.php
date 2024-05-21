<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas-carta-categoria" aria-labelledby="offcanvas-cartaLabel" style="visibility: visible;" aria-modal="true" role="dialog">
    <div class="offcanvas-header">
        <h5 id="offcanvas-pedidosLabel" class="offcanvas-title">Nueva categoría</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div id="formulario-carta" class="offcanvas-body mx-0 flex-grow-0">
        <div class="alert alert-primary p-1 alert-dismissible" role="alert">
            Las categorías son importantes para clasificar tus productos o servicios.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <form id="nueva-categoria-form" class="pt-0">
            <input type="hidden" name="idCategoria" id="idCategoria">
            <div class="row">

                <div class="col-12 align-content-start">

                    <div class="mb-1 mt-1">
                        <div class="form-group">
                            <label for="nombre">Nombre de la categoría</label>
                            <input id="nombre" name="nombre" type="text" class="form-control"
                                   data-required="El nombre es requerido"
                                   data-minlength="3"
                            />
                        </div>
                    </div>
                    <div class="mb-1">
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input id="descripcion" name="descripcion" type="text" class="form-control"
                                   data-required="La descripción es requerida"
                                   data-minlength="6"
                            />
                        </div>
                    </div>

                </div>

                <div class="botones d-grid">
                    <button type="button" class="btn btn-success waves-effect waves-float waves-light btn-sm-block" onclick="nuevaCategoria()">Guardar</button>
                </div>
            </div>

        </form>
    </div>
</div>
