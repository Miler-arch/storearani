<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('variant')->nullable();
            $table->string("unit")->nullable();
            $table->date("expiration_date")->nullable();
            $table->string('type')->nullable();
            $table->decimal('price', 8, 2);

            $table->timestamps();
        });

        // color
        // tamaño
        // nombre
        // precio
        // //cantidad
        // cuartilla
        // arroba
        // litros
        // unidad
        // paquete
        // tipo de producto
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
