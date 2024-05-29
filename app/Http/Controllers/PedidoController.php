<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\TiendaRequest;
use App\Models\Pedido;
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

class PedidoController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->nameCrud = 'pedidos';
        //$this->crudTranslated = __('backpanel/pizarra.empleados');
    }

    public function index()
    {
        return view('/content/tienda/pedidos/pizarra', ['nameCrud' => $this->nameCrud]);
    }

    public function new() {
        $method = 'Nuevo';
        return view('/content/tienda/pedidos/formulario', ['nameCrud' => $this->nameCrud, 'method' => $method]);
    }

    public function edit(Request $request, $id) {
        $method = 'Editar';
        $tienda = Tienda::query()->where('id', $id)->first();
        $tienda->imagenes = isset($tienda->imagenes) ? Helper::getStoredImage($tienda->imagenes) : null;
        return view('/content/admin/tiendas/formulario', ['nameCrud' => $this->nameCrud, 'method' => $method, 'tienda' => $tienda]);
    }

    public function show(Request $request, $id)
    {
        $tienda = Tienda::query()->where('id', $id)->first();
        $tienda->imagenes = isset($tienda->imagenes) ? Helper::getStoredImage($tienda->imagenes) : null;

        return view('content.admin.tiendas.formulario', [
            'method' => 'Ver',
            'nameCrud' => $this->nameCrud,
            'tienda' => $tienda,
        ]);

    }

    public function store(Request $request) {

        try {
            DB::beginTransaction();
            $userId = $this->user->id;

            $precioTotal = $this->calcularPrecioTotal($request->productos['productos']);
            $pedido = new Pedido();
            $pedido->doc = uniqid($request->tiendaId . '-' . $userId . '-');
            $pedido->info_pago = "Sin pago";
            $pedido->pedido = json_encode($request->productos);
            $pedido->precio = $precioTotal;
            $pedido->observaciones = '';
            $pedido->estado = 'Pendiente';
            $pedido->id_user = $this->user->id;
            $pedido->id_tienda = $request->tiendaId;
            $pedido->save();

            DB::commit();
            return response(['pedidoDoc' => $pedido->doc], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response(['errors' => ['errores' => ['No se ha podido generar el pedido.']]], 500);
        }
    }

    public function calcularPrecioTotal($productos) {
        $total = 0;
        foreach ($productos as $producto) {
            if(isset($producto['precio'])){
                $total += (floatval($producto['precio']) * intval($producto['cantidad']));
            }
        }
        $impuesto = 1.07;
        return $total * $impuesto;
    }


//    public function store(TiendaRequest $request, $id = null) {
//        try {
//            DB::beginTransaction();
//
//            if ($id === null) {
//                $tienda = new Tienda();
//                $mensaje = 'creado';
//            } else {
//                $tienda = Tienda::find($id);
//                if ($tienda === null) {
//                    return response('No se pudo encontrar la tienda', 400);
//                }
//                $mensaje = 'editado';
//            }
//
//            $fields = $request->only($tienda->getFillable());
//            $tienda->fill($fields);
//
//            // Borramos la imagen si ya tenía una
//            Storage::disk('tiendas')->delete($tienda->imagenes);
//
//            // Guardamos la imagen
//            $img = Helper::base64toStore($request->imagen);
//            Storage::disk('tiendas')->put($img[0], base64_decode($img[2]));
//            $tienda->imagenes = $img[0];
//            $tienda->save();
//
//            DB::commit();
//            return response(['mensaje' => 'La tienda se ha ' . $mensaje . ' correctamente', 'tienda' => $tienda], 200);
//        } catch (\Exception $e) {
//            DB::rollBack();
//            return response()->json("Se ha producido un error al guardar la tienda", 500);
//        }
//    }


    public function destroy(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $pedido = Pedido::find($id);
            if ($pedido === null) {
                return response(['errores' => __('No se pudo encontrar el pedido')], 400);
            }

            // Borramos la imagen si tenía una
//            if(isset($tienda->imagenes)){
//                Storage::disk('tiendas')->delete($tienda->imagenes);
//            }

            $pedido->delete();
            DB::commit();
            return response('El pedido se ha borrado correctamente', 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json("No se ha podido borrar el pedido", 500);
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            DB::beginTransaction();
            Pedido::query()->whereIn('id', $request->ids)->delete();
            DB::commit();
            return response('Los pedidos se han borrado correctamente', 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response('No se ha podido borrar los pedidos', 500);
        }
    }

    public function getDataJson(Request $request) {
        // Traemos todos los pedidos para la tienda
        $pedidos = Pedido::query()->where('id_tienda', $this->user->tienda_id)->with(['cliente' => function($q){
            $q->select('id', 'nombre', 'apellidos');
        }]);

        $permisoLeer = $this->user->hasPermiso('Pedidos','Leer');
        $permisoEditar = $this->user->hasPermiso('Pedidos','Editar');
        $permisoBorrar = $this->user->hasPermiso('Pedidos','Borrar');

        return DataTables::eloquent($pedidos)
            ->addColumn('permiso_leer', function ($model) use($permisoLeer){
                return $permisoLeer;
            })
            ->addColumn('permiso_borrar', function ($model) use($permisoBorrar){
                return $permisoBorrar;
            })
            ->addColumn('permiso_editar', function ($model) use($permisoEditar){
                return $permisoEditar;
            })
            ->editColumn('user_id', function ($model){
                return $model->cliente->nombre . ' ' . (isset($model->cliente->apellidos) ? $model->cliente->apellidos : '');
            })
            ->editColumn('fecha_entrega', function ($model){
                if(isset($model->fecha_entrega)){
                    return Carbon::createFromFormat('Y-m-d H:i:s', $model->fecha_entrega)->format('d/m/Y H:i');
                }
                return '-';
            })
            ->editColumn('created_at', function ($model){
                return Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at)->format('d/m/Y H:i');
            })
            ->toJson();
    }

    public function showPedido(Request $request){

        $pedido = Pedido::query()->find($request->pedidoId);
        if(!isset($pedido)){
            return response(['errores' => 'Lo sentimos, no se pudo encontrar el pedido'], 400);
        }
        $pedido->pedido = json_decode($pedido->pedido);
        return view('modales.pedidos.pedidos-content', [
            'pedido' => $pedido,
        ])->render();
    }

    public function changeState(Request $request){
        $pedido = Pedido::query()->where('id', $request->pedidoId)->first();
        if(!isset($pedido)){
            return response(['errores' => 'El pedido no existe'], 400);
        }

        $pedido->estado = $request->estado;
        $pedido->update();
    }

    public function changeTotal(Request $request){
        $pedido = Pedido::query()->where('id', $request->pedidoId)->first();
        if(!isset($pedido)){
            return response(['errores' => 'El pedido no existe'], 400);
        }
        $pedido->precio = $request->total;
        $pedido->update();
        return response('Actualizado!', 200);
    }

    public function finalizado(Request $request, $doc){
        return view('/web/pages/compra/index', [
            'doc' => $doc,
        ]);
    }

}
