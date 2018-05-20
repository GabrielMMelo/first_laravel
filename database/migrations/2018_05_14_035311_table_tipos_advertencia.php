<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableTiposAdvertencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_advertencia', function (Blueprint $table) {
            $table->tinyInteger('id')->unsigned();
	    $table->string('nome');
	    $table->tinyInteger('pontos')->unsigned();
	    $table->primary('id');
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
        Schema::dropIfExists('tipo_advertencia');
    }
}
