<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietLapTopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_lap_tops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_lt')->unsigned();
            $table->foreign('id_lt')->references('id')->on('laptops')->onUpdate('cascade');
            $table->string('hang_cpu');
            $table->float('toc_do_cpu');
            $table->string('bo_nho_dem');
            $table->float('toc_do_toi_da');
            $table->string('chipset');
            $table->integer('toc_do_bus');
            $table->integer('ho_tro_ram');
            $table->integer('ram');
            $table->string('loai_ram');
            $table->integer('toc_do_bus_ram');
            $table->string('loai_o_dia');
            $table->integer('hdd');
            $table->float('kich_thuoc_mh');
            $table->string('do_phan_giai_mh');
            $table->string('cong_nghe_mh');
            $table->string('cam_ung');
            $table->string('vag');
            $table->string('bo_nho_vag');
            $table->string('thiet_ke_vag');
            $table->float('kenh_am_thanh');
            $table->string('thong_tin_them');
            $table->string('co_cd');
            $table->string('loai_cd');
            $table->string('cong_giao_tiep');
            $table->string('tinh_nang_mo_rong');
            $table->string('lan');
            $table->string('wifi');
            $table->string('ket_noi_khac');
            $table->string('do_phan_giai_wc');
            $table->string('thong_tin_wc');
            $table->integer('pin');
            $table->string('he_dieu_hanh');
            $table->string('phan_mem');
            $table->string('kich_thuoc');
            $table->string('trong_luong');
            $table->string('chat_lieu');
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
        Schema::dropIfExists('chi_tiet_lap_tops');
    }
}
