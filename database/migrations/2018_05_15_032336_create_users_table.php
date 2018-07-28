<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('name');
            $table->Integer('id')->index()->unique()->unsigned();
            $table->Integer('job')->unsigned();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->primary('name');
            $table->foreign('job')->references('id')->on('job')->onDelete('cascade');
        });
        DB::statement('ALTER TABLE users CHANGE id id INT(10)AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
