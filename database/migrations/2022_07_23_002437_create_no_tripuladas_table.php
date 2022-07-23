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
         //Creando tablas en la base de datos
        Schema::create('no_tripuladas', function (Blueprint $table) {
            $table -> float('velocidad');
            $table -> float('empuje');
            $table -> string('nombre_nave');
            $table -> foreign('nombre_nave')->references('nombre')->on('naves');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('no_tripuladas');
    }
};
