<?php

use App\Http\Controllers\CartaController;
use App\Http\Controllers\MetodosPagoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebpagesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Auth::routes();

Route::get('/maintenance', [WebpagesController::class, 'maintenance'])->name('maintenance');
Route::get('/', [WebpagesController::class, 'home'])->name('home');
Route::get('/shops/{url}', [TiendaController::class, 'tienda'])->name('tienda');
Route::get('/shops', [WebpagesController::class, 'search'])->name('search');

Route::get('/busqueda', [WebpagesController::class, 'busqueda'])->name('buscador');
Route::get('/logout', function (Request $request) {
    Auth::logout();

    return redirect('/login');
});
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/user/register', [UserController::class, 'createUser']);

Route::group(['middleware'=> ['auth']], function () {
    Route::get('/checkout/{id}', [WebpagesController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/pedido', [PedidoController::class, 'store']);
    Route::get('/checkout/pedido-finalizado/{doc}', [PedidoController::class, 'finalizado']);
    Route::get('/perfil', [WebpagesController::class, 'perfil']);

    Route::group(['prefix' => 'admin', 'as'=>'admin.', 'middleware'=> ['rol:admin']], function () {
        Route::get('dashboard', [DashboardController::class, 'indexAdmin'])->name('dashboard');
        Route::get('perfil', [UserController::class, 'perfil'])->name('perfil');

        /** EMPLEADOS **/
        Route::prefix('empleados')->group(function () {
            Route::group(['middleware' => ['permission:Empleados,Leer']], function () {
                Route::get('pizarra', [UserController::class, 'index'])->name('pizarraEmpleados');
                Route::post('json', [UserController::class, 'getDataJson']);
                Route::get('show/{id}', [UserController::class, 'show']);
            });

            Route::group(['middleware' => ['permission:Empleados,Editar']], function () {
                Route::get('new', [UserController::class, 'new'])->name('createEmpleado');
                Route::post('store', [UserController::class, 'store']);
                Route::put('store/{id?}', [UserController::class, 'store']);
                Route::get('edit/{id}', [UserController::class, 'edit']);
                Route::post('block/{id}', [UserController::class, 'block']);
            });


        });

        /** TIENDAS */
        Route::prefix('tiendas')->group(function () {
            Route::group(['middleware' => ['permission:Tiendas,Leer']], function () {
                Route::get('pizarra', [TiendaController::class, 'index'])->name('pizarraTiendas');
                Route::post('json', [TiendaController::class, 'getDataJson']);
                Route::get('show/{id}', [TiendaController::class, 'show']);
            });

            Route::group(['middleware' => ['permission:Tiendas,Editar']], function () {
                Route::get('new', [TiendaController::class, 'new'])->name('createTiendas');
                Route::post('store', [TiendaController::class, 'store']);
                Route::put('store/{id?}', [TiendaController::class, 'store']);
                Route::get('edit/{id}', [TiendaController::class, 'edit']);
                Route::post('block/{id}', [TiendaController::class, 'block']);
            });

            Route::group(['middleware' => ['permission:Tiendas,Borrar']], function () {
                Route::delete('delete/{id}', [TiendaController::class, 'destroy']);
                Route::delete('delete-multiple', [TiendaController::class, 'destroyAll']);
            });


        });

        /** MÉTODOS DE PAGO */
        Route::prefix('metodospago')->group(function () {
            Route::group(['middleware' => ['permission:Metodos de pago,Leer']], function () {
                Route::get('pizarra', [MetodosPagoController::class, 'index'])->name('pizarraMetodosPago');
            });

            Route::group(['middleware' => ['permission:Metodos de pago,Editar']], function () {
                Route::post('cambiarestado', [MetodosPagoController::class, 'cambiarestado']);
                Route::get('get-configuracion/{id}', [MetodosPagoController::class, 'getConfig']);

                Route::prefix('cambiar-configuracion')->group(function () {
                    Route::post('{metodo}', [MetodosPagoController::class, 'configurar']);
                });
            });



        });
    });

    /** ROL TIENDA */

    Route::group(['prefix' => 'tienda', 'as'=>'tienda.', 'middleware'=> ['rol:tienda']], function () {
        Route::get('dashboard', [DashboardController::class, 'indexTienda'])->name('dashboard');

        /** PEDIDOS */
        Route::prefix('pedidos')->group(function () {
            Route::group(['middleware' => ['permission:Pedidos,Leer']], function () {
                Route::get('pizarra', [PedidoController::class, 'index'])->name('pizarraPedidos');
                Route::post('json', [PedidoController::class, 'getDataJson']);
                Route::get('showPedido', [PedidoController::class, 'showPedido']);

            });

            Route::group(['middleware' => ['permission:Pedidos,Editar']], function () {
                Route::post('changeState', [PedidoController::class, 'changeState']);
                Route::post('changeTotal', [PedidoController::class, 'changeTotal']);
            });

            Route::group(['middleware' => ['permission:Pedidos,Borrar']], function () {
                Route::delete('delete/{id}', [PedidoController::class, 'destroy']);
                Route::delete('delete-multiple', [PedidoController::class, 'destroyAll']);
            });
        });

        /** EMPLEADOS */
        Route::prefix('empleados')->group(function () {
            Route::group(['middleware' => ['permission:Empleados,Leer']], function () {
                Route::get('pizarra', [UserController::class, 'index'])->name('pizarraEmpleados');
                Route::post('json', [UserController::class, 'getDataJson']);
                Route::get('show/{id}', [UserController::class, 'show']);
            });

            Route::group(['middleware' => ['permission:Empleados,Editar']], function () {
                Route::get('new', [UserController::class, 'new'])->name('createEmpleado');
                Route::post('store', [UserController::class, 'store']);
                Route::put('store/{id?}', [UserController::class, 'store']);
                Route::get('edit/{id}', [UserController::class, 'edit']);
                Route::post('block/{id}', [UserController::class, 'block']);
            });

        });

        /** CARTA */
        Route::prefix('carta')->group(function () {
            Route::group(['middleware' => ['permission:Carta,Leer']], function () {
                Route::get('pizarra', [CartaController::class, 'index'])->name('pizarraCarta');
                Route::post('guardarCarta', [CartaController::class, 'store']);
                Route::post('deleteCategoria', [CartaController::class, 'deleteCategoria']);
                Route::post('deleteProducto', [CartaController::class, 'deleteProducto']);
    //            Route::post('json', [UserController::class, 'getDataJson']);
    //            Route::get('show/{id}', [UserController::class, 'show']);
            });

            Route::group(['middleware' => ['permission:Empleados,Editar']], function () {
                Route::get('new', [UserController::class, 'new'])->name('createEmpleado');
    //            Route::post('store', [UserController::class, 'store']);
    //            Route::put('store/{id?}', [UserController::class, 'store']);
    //            Route::get('edit/{id}', [UserController::class, 'edit']);
    //            Route::post('block/{id}', [UserController::class, 'block']);
            });

        });

    });
});
