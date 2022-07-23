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
        Schema::create('naves', function (Blueprint $table) {
            $table -> string('nombre');
            $table -> string('combustible');
            $table -> string('funcion');
            $table -> date('primer_lanzamiento');
            $table -> date('ultimo_lanzamiento');
            $table -> string('estado');
            $table -> string('pais');
            $table -> primary('nombre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('naves');
    }
};
