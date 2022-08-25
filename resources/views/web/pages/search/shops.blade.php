<section id="ecommerce-header">
    <div class="row">
        <div class="col-sm-12">
            <div class="ecommerce-header-items">
                <div class="result-toggler">
                    <button class="navbar-toggler shop-sidebar-toggler" type="button" data-bs-toggle="collapse">
                        <span class="navbar-toggler-icon d-block d-lg-none"><i data-feather="menu"></i></span>
                    </button>
                    <div class="search-results">16285 results found</div>
                </div>
                <div class="view-options d-flex">
                    <div class="btn-group dropdown-sort">
                        <button
                            type="button"
                            class="btn btn-outline-primary dropdown-toggle me-1"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <span class="active-sorting">Featured</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Featured</a>
                            <a class="dropdown-item" href="#">Lowest</a>
                            <a class="dropdown-item" href="#">Highest</a>
                        </div>
                    </div>
                    <div class="btn-group" role="group">
                        <input type="radio" class="btn-check" name="radio_options" id="radio_option1" autocomplete="off" checked />
                        <label class="btn btn-icon btn-outline-primary view-btn grid-view-btn" for="radio_option1"
                        ><i data-feather="grid" class="font-medium-3"></i
                            ></label>
                        <input type="radio" class="btn-check" name="radio_options" id="radio_option2" autocomplete="off" />
                        <label class="btn btn-icon btn-outline-primary view-btn list-view-btn" for="radio_option2"
                        ><i data-feather="list" class="font-medium-3"></i
                            ></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="body-content-overlay"></div>

<section id="ecommerce-searchbar" class="ecommerce-searchbar">
    <div class="row mt-1">
        <div class="col-sm-12">
            <div class="input-group input-group-merge">
                <input
                    type="text"
                    class="form-control search-product"
                    id="shop-search"
                    placeholder="Search Product"
                    aria-label="Search..."
                    aria-describedby="shop-search"
                />
                <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
            </div>
        </div>
    </div>
</section>

<section id="ecommerce-products" class="grid-view">
    @foreach($tiendas as $tienda)
        <div class="card ecommerce-card">
            <div class="item-img text-center">
                <a href="{{url('app/ecommerce/details')}}">
                    <img
                        class="img-fluid card-img-top"
                        src="{{asset('images/pages/eCommerce/1.png')}}"
                        alt="img-placeholder"
                    /></a>
            </div>
            <div class="card-body">
                <div class="item-wrapper">
                    <div class="item-rating">
                        <ul class="unstyled-list list-inline">
                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                        </ul>
                    </div>
{{--                    <div>--}}
{{--                        <h6 class="item-price">$339.99</h6>--}}
{{--                    </div>--}}
                </div>
                <h6 class="item-name">
                    <a class="text-body" href="{{url('app/ecommerce/details')}}">{{$tienda->nombre}}</a>
                    <span class="card-text item-company">By <a href="#" class="company-name">{{$tienda->direccion}}</a></span>
                </h6>
                <p class="card-text item-description">
                    {{$tienda->descripcion}}
                </p>
            </div>
            <div class="item-options text-center">
{{--                <div class="item-wrapper">--}}
{{--                    <div class="item-cost">--}}
{{--                        <h4 class="item-price">$339.99</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <a href="#" class="btn btn-light btn-wishlist">--}}
{{--                    <i data-feather="heart"></i>--}}
{{--                    <span>Wishlist</span>--}}
{{--                </a>--}}
                <a href="#" class="btn btn-primary btn-cart">
                    <i data-feather="shopping-cart"></i>
                    <span class="add-to-cart">Ver tienda</span>
                </a>
            </div>
        </div>
    @endforeach
</section>

<section id="ecommerce-pagination">
    <div class="row">
        <div class="col-sm-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center mt-2">
                    <li class="page-item prev-item"><a class="page-link" href="#"></a></li>
                    @foreach(range(1,ceil($tiendas->total() / $tiendas->perPage())) as $index)
                        <li @class([
                            'page-item',
                            'active' => $tiendas->currentPage() == $index])>
                            <a class="page-link" href="?page={{$index}}">{{$index}}</a></li>
                    @endforeach
                    <li class="page-item next-item"><a class="page-link" href="#"></a></li>
                </ul>
            </nav>
        </div>
    </div>
</section>
