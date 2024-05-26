<div id="detalles">
    <div class="card">
        <div class="card-body">
            <div class="main-title d-flex align-items-center mb-1">
                <p class="detalles-title m-0">Detalles del pedido</p>
                <img src="{{asset('/images/pages/iconos/confeti.png')}}" alt="confeti">
            </div>


            <table class="w-100" id="tabla-pedido">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Los productos y resumen del pedido se cargarán por JS --}}
                </tbody>

            </table>
        </div>
    </div>
</div>

