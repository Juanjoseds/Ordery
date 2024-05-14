<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->float('precio');
            $table->integer('orden')->nullable();
            $table->longText('imagen')->nullable();

            $table->timestamps();

            $table->foreignId('id_categoria')->nullable()->references('id')->on('categorias')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('id_tienda')->nullable()->references('id')->on('tiendas')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
