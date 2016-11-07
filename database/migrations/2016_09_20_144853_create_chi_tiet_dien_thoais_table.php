<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietDienThoaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_dien_thoais', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_dt')->unsigned();
            $table->foreign('id_dt')->references('id')->on('dien_thoais')->onUpdate('cascade');
            $table->string('cong_nghe_mh');
            $table->string('kich_thuoc_mh');
            $table->string('do_phan_giai_mh');
            $table->float('cam_ung');
            $table->float('mat_kinh');
            $table->integer('do_phan_giai_cmr_sau');
            $table->string('quay_phim_cmr_sau');
            $table->string('den_flash');
            $table->string('chup_anh_nang_cao');
            $table->float('do_phan_giai_cmr_truoc');
            $table->string('quay_phim_cmr_truoc');
            $table->string('thong_tin_khac');
            $table->string('he_dieu_hanh');
            $table->string('chipset');
            $table->integer('so_nhan_cpu');
            $table->string('toc_do_cpu');
            $table->string('gpu');
            $table->integer('ram');
            $table->integer('rom');
            $table->string('the_nho_ngoai');
            $table->string('ho_tro_the_nho_toi_da');
            $table->string('2g');
            $table->string('3g');
            $table->string('4g');
            $table->integer('so_khe_sim');
            $table->string('loai_sim');
            $table->string('wifi');
            $table->string('gps');
            $table->string('bluetooth');
            $table->string('nfc');
            $table->string('cong_ket_noi_sac');
            $table->float('jack_tai_nghe');
            $table->string('ket_noi_khac');
            $table->string('thiet_ke');
            $table->string('chat_lieu');
            $table->string('kich_thuoc');
            $table->string('trong_luong');
            $table->integer('dung_luong_pin');
            $table->string('loai_pin');
            $table->string('xem_phim');
            $table->string('nghe_nhac');
            $table->string('ghi_am');
            $table->string('radio');
            $table->string('chuc_nang_khac');
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
        Schema::dropIfExists('chi_tiet_dien_thoais');
    }
}
