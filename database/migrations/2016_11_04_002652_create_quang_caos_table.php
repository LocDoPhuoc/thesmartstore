<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuangCaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quang_caos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_dt')->unsigned();
            $table->foreign('id_dt')->references('id')->on('dien_thoais')->onUpdate('cascade');
            $table->string('img');
            $table->integer('trang_thai');
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
        Schema::dropIfExists('quang_caos');
    }
}
