<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieuDatHangDienThoaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_dat_hang_dien_thoais', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kh')->unsigned();
            $table->foreign('id_kh')->references('id')->on('khach_hangs')->onUpdate('cascade');
            $table->integer('tong_tien')->unsigned();
            $table->date('ngay_dat');
            $table->date('ngay_nhan');
            $table->string('cach_nhan');
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
        Schema::dropIfExists('phieu_dat_hang_dien_thoais');
    }
}
