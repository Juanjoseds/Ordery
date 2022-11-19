<div id="main-info">
    <div class="row m-0 main-foto-buscador">
        <div class="col-6">
            <img class="mt-3 main-image" src="/images/web/home/food.png" alt="comida">
        </div>
        <div class="col-6 d-flex flex-column text-center justify-content-center mt-2 main-buscador">
            <div class="texto">
                ¿Qué te apetece pedir hoy?
            </div>
            @include('web.pages.home.buscador')
        </div>
    </div>
    <div class="row m-0">
        <div class="col-3"></div>
        <div id="mainTiendas-recomendadas" class="col-9 p-4">
            <div class="row text-end">
                <span class="text-muted texto-tienda">Tiendas que encontrarás en Ordery</span>
            </div>
            @include('web.pages.home.slider-tiendas')
        </div>
    </div>
</div>

