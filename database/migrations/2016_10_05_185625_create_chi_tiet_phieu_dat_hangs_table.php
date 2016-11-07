<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietPhieuDatHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_phieu_dat_hangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pdh')->unsigned();
            $table->foreign('id_pdh')->references('id')->on('phieu_dat_hang_dien_thoais')->onUpdate('cascade');
            $table->integer('id_dt')->unsigned();
            $table->foreign('id_dt')->references('id')->on('dien_thoais')->onUpdate('cascade');
            $table->integer('so_luong')->unsigned();
            $table->integer('don_gia')->unsigned();
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
        Schema::dropIfExists('chi_tiet_phieu_dat_hangs');
    }
}
