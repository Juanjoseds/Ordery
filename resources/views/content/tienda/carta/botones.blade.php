<div id="botones" class="d-flex justify-content-between">
    <div class="btn-group mb-2" role="group" aria-label="Basic radio toggle button group">
        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked="">
        <label class="btn btn-outline-primary waves-effect" for="btnradio1" onclick="initCardsDraggable()">Editar categorías</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
        <label class="btn btn-outline-primary waves-effect" for="btnradio2" onclick="initListsDraggable()">Editar productos</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
        <label class="btn btn-outline-primary waves-effect" for="btnradio3" onclick="destroyAllDraggables()">Desactivar</label>
    </div>
    <div class="d-flex">
        <div class="btn-guardar" style="display: none;">
            <button type="button" class="btn btn-success waves-effect waves-float waves-light" onclick="guardarCarta()"><i class="fa-solid fa-save"></i> Guardar cambios</button>
        </div>
        <div class="btn-add-categoria ms-1">
            <button type="button" class="btn btn-primary waves-effect waves-float waves-light" onclick="abrirOffcanvasNuevaCategoria()"><i class="fa-solid fa-plus"></i> Nueva categoría</button>
        </div>
    </div>

</div>

