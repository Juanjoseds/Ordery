<div class="producto" data-id="{{@$producto->id}}">
    <div class="row">
        <div class="col-10">
            <div class="d-flex">
                <img class="producto-imagen" src="@if(isset($producto->imagen))/images/productos/{{@$producto->imagen}}@else /images/assets/product.png @endif" alt="{{@$producto->nombre}}">
                <div class="ms-1">
                    <p class="producto-titulo mb-50 mt-75">{{@$producto->nombre}}</p>
                    <p class="producto-precio mb-0">{{@$producto->precio}} €</p>
                </div>
            </div>
            <div class="row align-items-center">
                <p class="producto-descripcion mb-0 mt-50">{{@$producto->descripcion}}</p>
            </div>
        </div>
        <div class="col-2 d-flex justify-content-center align-items-center">
            <button type="button" class="btn rounded-pill btn-icon btn-primary waves-effect waves-light btn-add-carrito box-shadow-1" onclick="addProductCart(`{{@$producto}}`)">
                <span class="ti ti-plus"></span>
            </button>
        </div>
    </div>

    @if(!$loop->last)
        <hr>
    @endif
</div>
