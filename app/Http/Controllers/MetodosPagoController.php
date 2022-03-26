<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\TiendaRequest;
use App\Models\MetodoPago;
use App\Models\Permiso;
use App\Models\Tienda;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravolt\Avatar\Avatar;
use Yajra\DataTables\Facades\DataTables;

class MetodosPagoController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->nameCrud = 'métodos de pago';
        //$this->crudTranslated = __('backpanel/pizarra.empleados');
    }

    public function index()
    {
        $metodos = MetodoPago::all();
        $permiso_editar = $this->user->hasPermiso('Tiendas','Editar');
        return view('/content/admin/metodospago/pizarra', ['nameCrud' => $this->nameCrud, 'metodos' => $metodos, 'permiso_editar' => $permiso_editar]);
    }

    public function edit(Request $request, $id) {
        $method = 'Editar';
        $tienda = Tienda::query()->where('id', $id)->first();
        $tienda->imagenes = isset($tienda->imagenes) ? Helper::getStoredImage($tienda->imagenes) : null;
        return view('/content/admin/tiendas/formulario', ['nameCrud' => $this->nameCrud, 'method' => $method, 'tienda' => $tienda]);
    }

    public function store(TiendaRequest $request, $id = null) {
        try {
            DB::beginTransaction();

            if ($id === null) {
                $tienda = new Tienda();
                $mensaje = 'creado';
            } else {
                $tienda = Tienda::find($id);
                if ($tienda === null) {
                    return response('No se pudo encontrar la tienda', 400);
                }
                $mensaje = 'editado';
            }

            $fields = $request->only($tienda->getFillable());
            $tienda->fill($fields);

            // Borramos la imagen si ya tenía una
            Storage::disk('tiendas')->delete($tienda->imagenes);

            // Guardamos la imagen
            $img = Helper::base64toStore($request->imagen);
            Storage::disk('tiendas')->put($img[0], base64_decode($img[2]));
            $tienda->imagenes = $img[0];
            $tienda->save();

            DB::commit();
            return response(['mensaje' => 'La tienda se ha ' . $mensaje . ' correctamente', 'tienda' => $tienda], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json("Se ha producido un error al guardar la tienda", 500);
        }
    }

    public function block(Request $request, $id)
    {
        try {
            $tienda = Tienda::find($id);
            $tienda->is_blocked = $request->estado == '0' ? 1 : 0;
            $tienda->save();
            return response('La tienda se ha bloqueado correctamente', 200);
        } catch (\Exception $e) {
            dd($e);
        }
    }

}
