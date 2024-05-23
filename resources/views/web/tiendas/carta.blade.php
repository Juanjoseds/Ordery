<div class="card" id="main-carta">
    <div class="card-body">
        <h5 class="carta-titulo mb-75">NUESTROS PRODUCTOS</h5>
        <p>Buscador</p>

        <div id="carta">
            <div class="categoria">
                <p class="categoria-titulo">PANADERIA</p>
            </div>

            @foreach(range(1,4) as $producto)
                <div class="producto">
                    <div class="row ms-25 align-items-center">

                        <div class="col-10">
                            <div class="row">
                                <div class="col-2 p-50">
                                    <img class="producto-imagen" src="https://img.freepik.com/vector-gratis/logotipo_23-2148144447.jpg?w=826&t=st=1716155478~exp=1716156078~hmac=224f427cd591aa17fe5f35b164951263c799a48028335729f85a3f3ac56c27e2" alt="">
                                </div>
                                <div class="col-10">
                                    <p class="producto-titulo mb-50 mt-1">Pan</p>
                                    <p class="producto-precio mb-0">0,40 €</p>
                                </div>

                                <div class="row">
                                    <p class="producto-descripcion mb-0">Pan fresco de puño</p>
                                </div>
                            </div>

                        </div>

                        <div class="col-2">
                            <button type="button" class="btn rounded-pill btn-icon btn-primary waves-effect waves-light btn-add-carrito box-shadow-1">
                                <span class="ti ti-plus"></span>
                            </button>
                        </div>



                    </div>


                    @if(!$loop->last)
                        <hr>
                    @endif
{{--                    <p class="producto-titulo">Pan</p>--}}
                </div>
            @endforeach

        </div>
    </div>
</div>
