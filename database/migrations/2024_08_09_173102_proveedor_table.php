<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('first_name'); // Nombre del proveedor
            $table->string('last_name'); // Compañía
            $table->string('email'); // Correo electrónico
            $table->date('entrega'); // Fecha de entrega
            $table->string('product'); // Nombre del producto
            $table->integer('cantidad'); // Cantidad
            $table->timestamps(); // created_at y updated_at
        });
        }

    /**
  
     *
     * @return void
     */
    public function down()
    {
    Schema::dropIfExists('proveedores');
    }
};
