[B<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableMembros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membro', function (Blueprint $table) {
            $table->string('nome');
	    $table->tinyInteger('cargoId')->unsigned();
	    $table->string('email');
	    $table->string('pass');
	    $table->primary('nome');
	    $table->foreign('cargoId')->references('id')->on('cargo')->onDelete('cascade');
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
        Schema::dropIfExists('membro');
    }
}
