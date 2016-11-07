<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietLapTop extends Model
{
    protected $table = 'chi_tiet_lap_tops';
    protected $fillable = ['id','id_lt','hang_cpu','toc_do_cpu','bo_nho_dem','toc_do_toi_da','chipset','toc_do_bus','ho_tro_ram','ram','loai_ram','toc_do_bus_ram','loai_o_dia','hdd','kich_thuoc_mh','do_phan_giai_mh','cong_nghe_mh','cam_ung','vag','bo_nho_vag','thiet_ke_vag','kenh_am_thanh','thong_tin_them','co_cd','loai_cd','cong_giao_tiep','tinh_nang_mo_rong','lan','wifi','ket_noi_khac','do_phan_giai_wc','thong_tin_wc','pin','he_dieu_hanh','phan_mem','kich_thuoc','trong_luong','chat_lieu'];
}
