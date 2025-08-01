<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario', function (Blueprint $table) {
            $table->id();
            $table->integer('nro');
            $table->string('ci', 16);
            $table->string('nombres', 64);
            $table->string('apellidos', 64)->nullable();
            $table->string('cargo', 128)->nullable();
            $table->string('edificio', 512)->nullable();
            $table->string('tipo', 32)->nullable();
            $table->string('responsable', 512)->default('nd');
            $table->string('telresponsable', 32)->default('');
            $table->tinyInteger('estado')->default(1);
            $table->tinyInteger('entregado')->default(0);
            $table->timestamps();

            $table->bigInteger('gestion_id')->unsigned();
            $table->foreign('gestion_id')->references('id')->on('gestion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionario');
    }
}
