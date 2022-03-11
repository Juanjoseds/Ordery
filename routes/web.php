<?php

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

Route::group(['prefix' => 'admin', 'as'=>'admin.', 'middleware'=> ['rol:admin'] ], function () {
    Route::get('dashboard', [DashboardController::class, 'indexAdmin'])->name('dashboard');

    Route::prefix('empleados')->group(function () {
        Route::get('pizarra', [UserController::class, 'index'])->name('pizarraEmpleados');
        Route::post('json', [UserController::class, 'getDataJson']);
        Route::get('new', [UserController::class, 'new'])->name('createEmpleado');
        Route::post('store', [UserController::class, 'store']);
        Route::put('store/{id?}', [UserController::class, 'store']);
        Route::get('edit/{id}', [UserController::class, 'edit']);
        Route::get('show/{id}', [UserController::class, 'show']);
    });
});
