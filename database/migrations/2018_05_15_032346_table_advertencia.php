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
        Schema::create('Warning', function (Blueprint $table) {
            $table->increments('id');
    	    $table->Integer('type')->unsigned();
    	    $table->string('penalized');
    	    $table->string('responsible');
    	    $table->date('date');
    	    $table->time('time');
    	    $table->string('description');
    	    $table->Integer('status')->unsigned();
            $table->foreign('type')->references('id')->on('warning_type')->onDelete('cascade');
    	    $table->foreign('penalized')->references('name')->on('users')->onDelete('cascade');
    	    $table->foreign('responsible')->references('name')->on('users')->onDelete('cascade');
     	    $table->foreign('status')->references('id')->on('warning_status')->onDelete('cascade');

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
        Schema::dropIfExists('Warning');
    }
}
