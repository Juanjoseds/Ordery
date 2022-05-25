<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
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

//    public function new() {
//        $method = 'Nuevo';
//        $permisos = Permiso::query()
//            ->where('rol', $this->user->tipo)
//            ->get();
//        return view('/content/carta/formulario', ['nameCrud' => $this->nameCrud, 'method' => $method, 'permisos'=>$permisos]);
//    }


}
