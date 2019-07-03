<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nline');
            $table->integer('ncolumn');

            $table->integer('id_maker');
            $table->foreign('id_maker')->references('id')->on('users');

            $table->string('state')->default("WAITING");
            $table->string('typeOfGame');

            $table->rememberToken();
            $table->timestamps();
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
        Schema::drop('games');
        */
    }
}
