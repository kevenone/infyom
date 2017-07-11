<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatezbinfosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zbinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('a1');
            $table->integer('a2');
            $table->date('a3');
            $table->string('aemail');
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
        Schema::drop('zbinfos');
    }
}
