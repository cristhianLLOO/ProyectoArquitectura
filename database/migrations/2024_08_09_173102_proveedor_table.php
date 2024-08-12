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
            $table->string('company'); // Compañía
            $table->string('email')->unique(); // Correo electrónico
            $table->date('delivery_date'); // Fecha de entrega
            $table->string('product_name'); // Nombre del producto
            $table->integer('quantity'); // Cantidad
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedores');
    }
};
