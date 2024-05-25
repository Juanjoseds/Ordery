<?php

namespace App\Http\Controllers;

use App\Helpers\propiedades;
use App\Models\Cabecera;
use App\Models\Noticia;
use App\Models\Servicio;
use App\Models\Tienda;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Exception;


class WebpagesController extends Controller
{

    // HOMEPAGE
    public function home()
    {
        //$agent = new Agent();
        //$isMobile = ($agent->isMobile() || $agent->isTablet()) ? false : true;
        //$isMobile = false;

        $tiendas = Tienda::query()->inRandomOrder()->limit(10)->get();

        return view('/web/pages/home/index', compact('tiendas'));
    }

    //SEARCH - BUSQUEDA
    public function search(Request $request){
        $tiendas = Tienda::query()
            ->where('nombre', 'LIKE', "%$busqueda%")
            ->orWhereHas('categorias', function ($q) use ($request) {
                $q->whereHas('productos', function ($q2) use ($request) {
                    $q2->where('nombre', 'LIKE', "%$busqueda%");
                });
            })
            ->paginate(5);

        $pageConfigs = [
            'contentLayout' => "content-detached-left-sidebar",
            'pageClass' => 'ecommerce-application',
        ];
        return view('/web/pages/search/index', [
            'pageConfigs' => $pageConfigs,
            'tiendas' => $tiendas,
        ]);
    }

    // COOKIES
    public function cookies(Request $request)
    {
        return view('/web/pages/politicas/cookies');
    }

    // PRIVACIDAD
    public function privacidad(Request $request)
    {
        return view('/web/pages/politicas/privacidad');
    }

    // AVISO LEGAL
    public function aviso()
    {
        return view('/web/pages/politicas/aviso-legal');
    }

    // MANTENIMIENTO
    public function maintenance(Request $request){
        return view('errors.maintenance');
    }

    public function busqueda(Request $request){

        if(!isset($request->search) || $request->search == ""){
            return view('/web/pages/home/index');
        }

        $busqueda = $request->search;

        $tiendas = Tienda::query()
            ->where(function ($query) use ($busqueda) {
                $query->where('nombre', 'LIKE', "%$busqueda%")
                    ->orWhereHas('categorias', function ($q) use ($busqueda) {
                        $q->whereHas('productos', function ($q2) use ($busqueda) {
                            $q2->where('nombre', 'LIKE', "%$busqueda%");
                        });
                    });
            })
            ->where('is_blocked', '=', 0)
            ->with(['productos'=>function($q) use ($busqueda){
                $q->where('nombre', 'LIKE', "%$busqueda%")->select('id', 'nombre', 'id_tienda');
            }])

            ->paginate(8);


        return view('/web/pages/search/index', [
            'busqueda' => $busqueda,
            'tiendas' => $tiendas,
        ]);
    }

    public function checkout(Request $request, $id){
        $tienda = Tienda::query()->where('id', $id)->first();
        $direccion = $tienda->direccion . ' ' . $tienda->ciudad . ', ' . $tienda->provincia . ', ' . $tienda->pais . ', ' . $tienda->codigo_postal;

        return view('/web/pages/checkout/index', [
            'tienda' => $tienda,
            'urlEncode' => urlEncode($direccion),
        ]);
    }


    // APPEND VIEW PARA SEO
//    public function appendViews(){
//        // Servicios
//        $servicios = Servicio::query()->whereNotNull('nombre')->get();
//
//        $vServicios = view('web.pages.home.services', compact('servicios'))->render();
////        $vDivider = view('web.pages.home.divider', ['title' => 'SERVED PORTS'])->render();
//        $vMapa = view('web.pages.home.mapa')->render();
//        $vTeam = view('web.pages.home.team')->render();
//
//        return response([
//            'vServicios'=>$vServicios,
////            'vDivider'=>$vDivider,
//            'vMapa'=>$vMapa,
//            'vTeam'=>$vTeam,
//        ],200);
//
//    }

}
