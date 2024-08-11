<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('almacen', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('quantity');
            $table->string('status');
            $table->timestamps(); // Esto añadirá las columnas created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('almacen');
    }
};
