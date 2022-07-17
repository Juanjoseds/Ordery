<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
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
        return view('/content/tienda/carta/pizarra', compact('nameCrud'));
    }

    // Guardamos la carta
    public function store(Request $request){
        TiendaHasCarta::query()->where('tienda_id', $this->user->tienda_id)->delete();
        $carta = new TiendaHasCarta();
        $carta->tienda_id = $this->user->tienda_id;
        $carta->carta = $request->carta;
        $carta->save();
    }

//    public function new() {
//        $method = 'Nuevo';
//        $permisos = Permiso::query()
//            ->where('rol', $this->user->tipo)
//            ->get();
//        return view('/content/carta/formulario', ['nameCrud' => $this->nameCrud, 'method' => $method, 'permisos'=>$permisos]);
//    }


}
