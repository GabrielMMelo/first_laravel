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
	    $table->Integer('cargo')->unsigned();
	    $table->string('email');
	    $table->string('pass');
	    $table->bigInteger('cpf');
	    $table->string('rg');
	    $table->primary('nome');
	    $table->foreign('cargo')->references('id')->on('cargo')->onDelete('cascade');
            $table->timestamps();
        });
	DB::statement('ALTER TABLE membro CHANGE cpf cpf INT(11) UNSIGNED ZEROFILL NOT NULL');
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
