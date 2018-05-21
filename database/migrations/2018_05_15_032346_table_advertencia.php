<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableAdvertencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertencia', function (Blueprint $table) {
            $table->increments('id');
	    $table->Integer('tipo')->unsigned();
	    $table->string('penalizado');
	    $table->string('responsavel');
	    $table->dateTime('data');
	    $table->string('descricao');
	    $table->Integer('status')->unsigned();
            $table->foreign('tipo')->references('id')->on('tipo_advertencia')->onDelete('cascade');
	    $table->foreign('penalizado')->references('nome')->on('membro')->onDelete('cascade');
	    $table->foreign('responsavel')->references('nome')->on('membro')->onDelete('cascade');
 	    $table->foreign('status')->references('id')->on('status_advertencia')->onDelete('cascade');

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
        Schema::dropIfExists('advertencia');
    }
}