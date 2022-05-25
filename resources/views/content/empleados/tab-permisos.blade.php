 <div class="row">
     <div class="col-12">
         <div class="table-responsive border rounded mt-1">
             <h6 class="py-1 mx-1 mb-0 font-medium-2">
                 <i data-feather="lock" class="font-medium-3 mr-25"></i>
                 <span class="align-middle">Lista de permisos</span>
             </h6>
             <table class="table table-striped table-borderless">
                 <thead class="thead-light">
                     <tr>
                         <th>Módulo</th>
                         <th class="text-center">Ver</th>
                         <th class="text-center">Editar</th>
                         <th class="text-center">Borrar</th>
                         <th>
                             <div class="form-check custom-checkbox">
                                 <input type="checkbox" class="form-check-input select-all-modulo"
                                     id="permiso-select" />
                                 <label class="custom-control-label" for="permiso-select">Seleccionar todos</label>
                             </div>
                         </th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($permisos as $permiso)
                         <tr>
                             <td>{{ $permiso['display'] }}</td>
                             @foreach (['leer', 'editar', 'borrar'] as $tipo_permiso)
                                 <td>

                                     @if ($permiso[$tipo_permiso] == 1)
                                         <div class="form-check d-flex justify-content-center">
                                             <input type="checkbox"
                                                 class="form-check-input {{ $permiso['modulo'] }}-check permiso-check user-permiso"
                                                 data-modulo="{{ $permiso['modulo'] }}" data-id="{{ $permiso['id'] }}"
                                                 data-tipo="{{ $tipo_permiso }}"
                                                 id="{{ $permiso['modulo'] }}-{{ $tipo_permiso }}"
                                                 @if ($method != 'Nuevo' && isset($permiso['users'][0]['pivot']) && $permiso['users'][0]['pivot'][$tipo_permiso] == 1) checked @endif />
                                             <label class="custom-control-label"
                                                 for="{{ $permiso['modulo'] }}-{{ $tipo_permiso }}"></label>
                                         </div>
                                     @endif
                                 </td>
                             @endforeach
                             <td>
                                 <div class="form-check">
                                     <input type="checkbox"
                                         class="form-check-input select-all-modulo permiso-check "
                                         data-modulo="permiso" id="{{ $permiso['modulo'] }}-select" />
                                     <label class="custom-control-label" for="{{ $permiso['modulo'] }}-select"></label>
                                 </div>
                             </td>
                         </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>

     </div>

 </div>

