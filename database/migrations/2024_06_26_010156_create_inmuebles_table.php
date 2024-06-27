<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


  class CreateInmueblesTable extends Migration
    {
            public function up()
            {
                Schema::create('inmuebles', function (Blueprint $table) {
                    $table->id();
                    $table->string('Direccion', 255);
                    $table->string('Ciudad', 100);
                    $table->string('Telefono', 20);
                    $table->string('MododePago', 20);
                    $table->string('Tipo', 50);
                    $table->integer('Precio');
                    $table->timestamps();  // Añade las columnas created_at y updated_at


                });
            }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inmuebles');
    }
};
