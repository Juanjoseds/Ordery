<div id="tusdatos">
    <div class="card">
        <div class="card-body">
            <div class="main-title d-flex align-items-center">
                <i class="ti ti-address-book"></i>
                <p class="tusdatos-title m-0">Tus datos</p>
            </div>

            <div class="main-datos mt-1 ms-50">
                <div class="d-flex align-items-center">
                    <i class="ti ti-user me-50"></i>
                    <span>{{$user_auth->nombre}}</span>
                </div>
                <div class="d-flex align-items-center">
                    <i class="ti ti-mail me-50"></i>
                    <span>{{$user_auth->email}}</span>
                </div>
                <div class="d-flex align-items-center">
                    <i class="ti ti-phone me-50"></i>
                    <span>{{$user_auth->telefono}}</span>
                </div>
            </div>

        </div>
    </div>
</div>

