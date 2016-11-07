<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDienThoai extends Model
{
    protected $table = 'chi_tiet_dien_thoais';
    protected $fillable = ['id','id_dt','mau_sac','cong_nghe_mh','kich_thuoc_mh','do_phan_giai_mh','cam_ung','mat_kinh','do_phan_giai_cmr_sau','quay_phim_cmr_sau','den_flash','chup_anh_nang_cao','do_phan_giai_cmr_truoc','quay_phim_cmr_truoc','thong_tin_khac','he_dieu_hanh','chipset','so_nhan_cpu','toc_do_cpu','gpu','ram','rom','the_nho_ngoai','ho_tro_the_nho_toi_da','bang_tan_2g','bang_tan_3g','ho_tro_4g','so_khe_sim','loai_sim','wifi','gps','bluetooth','nfc','cong_ket_noi_sac','jack_tai_nghe','ket_noi_khac','thiet_ke','chat_lieu','kich_thuoc','trong_luong','dung_luong_pin','loai_pin','xem_phim','nghe_nhac','ghi_am','radio','chuc_nang_khac','bao_hanh'];
}
