<div id="main-establecimientos">
    <div class="row">
        <div class="col-12">
            <p class="establecimientos-title">Establecimientos cerca de tí</p>
        </div>
        <div class="col-12">
            <!-- Swiper -->
            <div class="swiper-container mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($tiendas as $tienda)
                        <a class="swiper-slide tarjeta-tienda" href="/shops/{{@$tienda->url}}">

                            <div class="card mb-0 w-100">
                                <img class="card-img-top" src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/img/elements/2.jpg" alt="Card image cap">
                                <div class="card-body ps-0 pe-0 pb-0">
                                    <div class="ps-2">
                                        <h5 class="card-subtitle">BAZAR</h5>
                                        <h5 class="card-title mt-25 mb-0">{{@$tienda->nombre}}</h5>
                                    </div>

                                    <hr>
                                    <div class="row ps-2">
                                        <div class="col-6">
                                            <div class="d-flex align-items-center">
                                                <i class="ti ti-shopping-cart me-25"></i>
                                                <div>
                                                    <span class="cantidad">+500</span>
                                                    Compras
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="d-flex align-items-center">
                                                <i class="ti ti-star me-25"></i>
                                                <div>
                                                    <span class="cantidad">4.2</span>
                                                    Valoración
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mb-0">
                                    <div class="contacto ps-2 pt-1 pb-1" style="background-color: #f5f8fa">
                                        <div class="row">
                                            <p class="contacto-title mb-0">CONTACTO</p>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-2">
                                                <img class="contacto-avatar" src="/images/assets/profile.svg" alt="avatar">
                                            </div>
                                            <div class="col-10  ps-0">
                                                <p class="contacto-nombre mb-0">{{@$tienda->nombre_contacto}}</p>
                                                <p class="contacto-telefono">{{@$tienda->telefono}}</p>
                                            </div>
                                        </div>

                                    </div>
                                    {{--                                <p class="card-text">--}}
                                    {{--                                    Some quick example text to build on the card title and make up the bulk of the card's content.--}}
                                    {{--                                </p>--}}
                                    {{--                                <a href="javascript:void(0)" class="btn btn-outline-primary waves-effect">Go somewhere</a>--}}
                                </div>
                            </div>

                        </a>
                    @endforeach
                </div>
                <div class="swiper-button-next"><i class="ti ti-square-rounded-arrow-right-filled"></i></div>
                <div class="swiper-button-prev"><i class="ti ti-square-rounded-arrow-left-filled"></i></div>
            </div>
        </div>
    </div>
</div>

