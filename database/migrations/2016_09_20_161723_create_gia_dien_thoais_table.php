<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiaDienThoaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gia_dien_thoais', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_dt')->unsigned();
            $table->foreign('id_dt')->references('id')->on('dien_thoais')->onUpdate('cascade');
            $table->integer('gia');
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
        Schema::dropIfExists('gia_dien_thoais');
    }
}
