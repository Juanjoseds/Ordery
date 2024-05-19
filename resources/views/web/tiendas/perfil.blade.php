<div class="card profile-header mb-2">
    <!-- Foto banner -->
    <img class="card-img-top" src="https://resources.perkinelmer.com/lab-solutions/resources/images_for_resize/Yogurt1920x300.jpg" alt="User Profile Image"/>

    <div class="position-relative">
        <!-- Foto de perfil -->
        <div class="profile-img-container d-flex align-items-center">
            <div class="profile-img">
                <img src="https://img.freepik.com/vector-gratis/logotipo_23-2148144447.jpg?w=826&t=st=1716155478~exp=1716156078~hmac=224f427cd591aa17fe5f35b164951263c799a48028335729f85a3f3ac56c27e2" class="rounded img-fluid" alt="Card image"/>
            </div>
        </div>
    </div>

    <div class="profile-header-nav">

        <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="profile-tabs d-flex flex-column mt-1 mt-md-0">
                    <p class="fw-bolder mb-0">{{$tienda->nombre}}</p>
                    <p class="mb-0">{{$tienda->direccion}}</p>
                    <p class="mb-0">{{$tienda->descripcion}}</p>
                </div>

            </div>

        </nav>

    </div>
</div>
