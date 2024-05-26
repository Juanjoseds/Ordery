<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('doc');
            $table->longText('info_pago');
            $table->longText('pedido');
            $table->float('precio');
            $table->longText('observaciones');
            $table->dateTime('fecha_entrega')->nullable();
            $table->string('estado');
            $table->timestamps();

            $table->foreignId('id_user')->nullable()->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreignId('id_tienda')->nullable()->references('id')->on('tiendas')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
