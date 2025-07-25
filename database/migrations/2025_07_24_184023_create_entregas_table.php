<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('funcionario_id')->unsigned();
            $table->string('descripcion', 1024)->nullable();
            $table->string('img', 1024)->nullable();
            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('funcionario_id')->references('id')->on('funcionario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrega');
    }
}
