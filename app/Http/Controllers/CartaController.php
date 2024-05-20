<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
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

//            // Borramos
//            Categoria::query()->where('id_tienda', $tiendaId)->delete();
//            Producto::query()->where('id_tienda', $tiendaId)->delete();


            //Creamos
            foreach ($carta as $index => $categoria) {
                if(isset($categoria->id) && $categoria->id != ''){
                    $newCategoria = Categoria::query()->find($categoria->id);
                }else{
                    $newCategoria = new Categoria();
                }

                $newCategoria->id_tienda = $tiendaId;
                $newCategoria->nombre = $categoria->titulo;
                $newCategoria->descripcion = $categoria->descripcion;
                $newCategoria->orden = $index;
                $newCategoria->save();

                foreach ($categoria->productos as $index => $producto) {

                    //TODO: Controlar ID para no haer new
                    if(isset($producto->id_producto) && $producto->id_producto != ''){
                        $newProducto = Producto::query()->where('id', $producto->id_producto)->first();
                    }else{
                        $newProducto = new Producto();
                    }

                    $newProducto->nombre = $producto->titulo;
                    $newProducto->descripcion = $producto->descripcion;
                    $newProducto->precio = $producto->precio;
                    $newProducto->orden = $index;
                    $newProducto->id_categoria = $newCategoria->id;
                    $newProducto->id_tienda = $tiendaId;
                    $newProducto->save();

                    $path = public_path('/images/productos/');
                    if (str_contains($producto->imagen,'data:image') && $producto->imagen != '' && $producto->imagen != null && $producto->imagen != $newProducto->imagen) {

                        if (!(file_exists($path) && is_dir($path))) {
                            mkdir($path, 777, true);
                        }

                        $file = Helper::base64ToFile($producto->imagen);

                        $filename = $newProducto->id . '-' . Helper::randomString() . '.' . $file['extension'];

                        $this->base64_to_image($producto->imagen,$path.$filename);

                        $newProducto->imagen = $filename;
                        $newProducto->save();
                    }

                }
            }
        }catch (\Exception $e){
            return response('Ha ocurrido un error durante la creación de la carta', 500);
        }

        return response('La carta se ha creado correctamente', 200);
    }


    public function base64_to_image($base64_string, $output_file) {
        // open the output file for writing
        $ifp = fopen($output_file , 'a');
        // dd($output_file);
        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode( ',', $base64_string );

        // we could add validation here with ensuring count( $data ) > 1
        fwrite( $ifp, base64_decode( $data[ 1 ] ) );

        // clean up the file resource
        fclose( $ifp );

        return $output_file;
    }

    public function deleteCategoria(Request $request){
        Categoria::query()->where('id', $request->id)->delete();
        return response('La categoría se ha eliminado correctamente', 200);
    }

    public function deleteProducto(Request $request){
        Producto::query()->where('id', $request->id)->delete();
        return response('El producto se ha eliminado correctamente', 200);
    }
//    public function new() {
//        $method = 'Nuevo';
//        $permisos = Permiso::query()
//            ->where('rol', $this->user->tipo)
//            ->get();
//        return view('/content/carta/formulario', ['nameCrud' => $this->nameCrud, 'method' => $method, 'permisos'=>$permisos]);
//    }


}
