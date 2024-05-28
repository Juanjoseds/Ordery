<div class="card profile-header mb-2">
    <!-- Foto banner -->
    <img class="card-img-top" src="@if(isset($tienda->imagenes)) /images/tiendas/{{$tienda->imagenes}} @else /images/web/tiendas/default.jpg @endif" alt="User Profile Image"/>

    <div class="position-relative">
        <!-- Foto de perfil -->
        <div class="profile-img-container d-flex align-items-center">
            <div class="profile-img">
                <img src="@if(isset($tienda->imagen_logo)) /images/tiendas/{{$tienda->imagen_logo}} @else /images/web/tiendas/default.jpg @endif" class="rounded img-fluid" alt="Card image"/>
            </div>
        </div>
    </div>

    <div class="main-perfil">

        <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">

            <div class="collapse navbar-collapse">
                <div class="profile-tabs d-flex flex-column mt-1 mt-md-0">
                    <p class="perfil-nombre">{{$tienda->nombre}}</p>
                    <p class="perfil-direccion"><i class="ti ti-map-pin-filled me-25"></i>{{$tienda->direccion}}</p>
                    <p class="perfil-descripcion mb-0">{{$tienda->descripcion}}</p>
                </div>

            </div>

        </nav>

    </div>
</div>
