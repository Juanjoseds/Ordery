<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Permiso;
use App\Models\Producto;
use App\Models\TiendaHasCarta;
use Illuminate\Http\Request;

class CartaController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->nameCrud = 'carta';
    }

    public function index()
    {
        $nameCrud = 'carta';

        $categorias = Categoria::query()->where('id_tienda', $this->user->tienda_id)
            ->with('productos')
            ->orderBy('orden')
            ->get();

        return view('/content/tienda/carta/pizarra', compact('nameCrud', 'categorias'));
    }

    // Guardamos la carta
    public function store(Request $request){
        try{


            $carta = json_decode($request->carta);
            $tiendaId = $this->user->tienda_id;

            // Borramos
            Categoria::query()->where('id_tienda', $tiendaId)->delete();
            Producto::query()->where('id_tienda', $tiendaId)->delete();

            //Creamos
            foreach ($carta as $index => $categoria) {
                $newCategoria = new Categoria();
                $newCategoria->id_tienda = $tiendaId;
                $newCategoria->nombre = $categoria->titulo;
                $newCategoria->descripcion = $categoria->descripcion;
                $newCategoria->orden = $index;
                $newCategoria->save();

                foreach ($categoria->productos as $index => $producto) {
                    $newProducto = new Producto();
                    $newProducto->nombre = $producto->titulo;
                    $newProducto->descripcion = $producto->descripcion;
                    $newProducto->precio = $producto->precio;
                    $newProducto->imagen = isset($producto->imagen) ? $producto->imagen : '/images/assets/product.png';
                    $newProducto->orden = $index;
                    $newProducto->id_categoria = $newCategoria->id;
                    $newProducto->id_tienda = $tiendaId;
                    $newProducto->save();
                }
            }
        }catch (\Exception $e){
            return response('Ha ocurrido un error durante la creación de la carta', 500);
        }

        return response('La carta se ha creado correctamente', 200);
    }

//    public function new() {
//        $method = 'Nuevo';
//        $permisos = Permiso::query()
//            ->where('rol', $this->user->tipo)
//            ->get();
//        return view('/content/carta/formulario', ['nameCrud' => $this->nameCrud, 'method' => $method, 'permisos'=>$permisos]);
//    }


}
