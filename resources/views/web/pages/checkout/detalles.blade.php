<div id="detalles">
    <div class="card">
        <div class="card-body">
            <div class="main-title d-flex align-items-center mb-1">
                <p class="detalles-title m-0">Detalles del pedido</p>
                <img src="{{asset('/images/pages/iconos/confeti.png')}}" alt="confeti">
            </div>


            <table class="w-100">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="detalle-producto">
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <img src="/images/productos/5-bGR9k.jpeg" alt="Pan">
                                </div>
                                <p class="producto-nombre m-0 ms-1">Pan</p>
                            </div>
                        </td>
                        <td>1</td>
                        <td>5.99 €</td>
                        <td><i class="ti ti-trash ti-md text-danger producto-remove cursor-pointer" onclick="deleteProductCart('${producto.id}')"></i></td>
                    </tr>

                    <tr class="detalles-resumen resumen-subtotal">
                        <td colspan="2">
                            Subtotal
                        </td>
                        <td colspan="1">
                            2 €
                        </td>
                    </tr>

                    <tr class="detalles-resumen resumen-impuestos">
                        <td colspan="2">
                            Impuestos (7%)
                        </td>
                        <td colspan="1">
                            0.14 €
                        </td>
                    </tr>

                    <tr class="detalles-resumen resumen-total">
                        <td colspan="2">
                            TOTAL
                        </td>
                        <td class="precio-total" colspan="1">
                            2.14 €
                        </td>
                    </tr>

                </tbody>

            </table>
        </div>
    </div>
</div>

