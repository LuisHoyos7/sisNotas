<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotas3sTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas3s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_asignatura');
            $table->string('asignatura');
            $table->string('grupo');
            $table->string('docente');
            $table->string('id_estudiante');
            $table->string('estudiante');
            $table->string('corte1');
            $table->string('corte2');
            $table->string('corte3');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notas3s');
    }
}
