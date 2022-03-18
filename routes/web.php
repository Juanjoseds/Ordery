<?php

use App\Http\Controllers\TiendaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebpagesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/maintenance', [WebpagesController::class, 'maintenance'])->name('maintenance');
Route::get('/', [WebpagesController::class, 'home'])->name('home');

// 'middleware'=> ['rol:admin']
Route::group(['prefix' => 'admin', 'as'=>'admin.' ], function () {
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

    /** TIENDAS **/
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

        Route::group(['middleware' => ['permission:Empleados,Borrar']], function () {
            Route::delete('delete/{id}', [TiendaController::class, 'destroy']);
            Route::delete('delete-multiple', [TiendaController::class, 'destroyAll']);
        });


    });
});
