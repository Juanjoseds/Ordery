<section id="main-shops">
    <div class="container-fluid px-2">


    @if(isset($tiendas))
        <div class="row match-height">
        @foreach($tiendas as $tienda)
            <div class="col-3">

                <div class="card card-developer-meetup">
                <div class="bg-light-primary rounded-top text-center">
                    <img src="/images/illustration/api.svg" alt="Meeting Pic" height="170" class="">
                </div>
                <div class="card-body"><!----><!---->
                    <div class="meetup-header d-flex align-items-center">
{{--                        <div class="meetup-day">--}}
{{--                            <h6 class="mb-0">THU</h6>--}}
{{--                            <h3 class="mb-0">24</h3>--}}
{{--                        </div>--}}
                        <div class="my-auto">
                            <h4 class="card-title mb-25">{{$tienda->nombre}}</h4>
                            <p class="tienda-descripcion card-text mb-0">{{$tienda->descripcion}}</p>
                        </div>
                    </div>
                    <div class="media d-flex">
                        <div class="media-aside me-1 align-self-start">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        </div>
                        <div class="media-body">
                            <h6 class="mb-0">
                                Central Park
                            </h6>
                            <small>Manhattan, New york City</small>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        @endforeach
        </div>
    @else
    <p>We don't have any shops yet :(</p>
    @endif

    </div>
</section>
