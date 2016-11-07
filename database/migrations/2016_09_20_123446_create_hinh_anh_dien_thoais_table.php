<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHinhAnhDienThoaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinh_anh_dien_thoais', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loai_hinh')->unsigned();
            $table->foreign('loai_hinh')->references('id')->on('loai_hinh_anhs')->onUpdate('cascade');
            $table->integer('hinh_dt')->unsigned();
            $table->foreign('hinh_dt')->references('id')->on('dien_thoais')->onUpdate('cascade');
            $table->string('url');
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
        Schema::dropIfExists('hinh_anh_dien_thoais');
    }
}
