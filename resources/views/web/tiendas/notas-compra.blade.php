<div id="notas-compra">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <div class="form-group col-12">
                        <div class="w-100 text-center">
                            <img id="display_uploaded" class="img-fluid cursor-pointer p-50"
                                 style="width: 7em; color: #D3D2D7"
                                 alt="Imagen tienda"
                                 src="{{asset('images/assets/uploadimage.svg')}}"
                            >
                            <br>
                        </div>
                        <input type="text" id="image_uploaded" name="imagen" style="position: absolute;z-index: -1;opacity: 0">
                        <input type="file" hidden id="image_upload" accept="image/*">
                    </div>
                </div>

{{--                <i class="notas-icon ti ti-photo-filled"></i>--}}
                <div class="texto ms-1">
                    <p class="mb-0 notas-title">Envía una foto de tus notas de compra</p>
                    <p class="mb-0 notas-subtitle mt-25">¡Haz clic y pídelo!</p>
                    <button class="btn btn-success mb-0 btn-foto mt-25" style="display: none" onclick="addImageCart()">¡Pedir con mi foto!</button>
                </div>
            </div>
            <i class="ti ti-click icon-click"></i>
        </div>
    </div>
</div>

