<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDienThoaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dien_thoais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_dt');
            $table->integer('id_nsx')->unsigned();
            $table->foreign('id_nsx')->references('id')->on('hang_san_xuats')->onDelete('cascade');
            $table->integer('trang_thai');
            $table->string('mo_ta');
            $table->integer('so_luong_con');
            $table->integer('so_luong_ban');
            $table->integer('dt_moi');
            $table->string('xuat_xu');
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
        Schema::dropIfExists('dien_thoais');
    }
}
