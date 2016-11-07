<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuDatHangDienThoai extends Model
{
    protected $table = 'phieu_dat_hang_dien_thoais';
    protected $fillable = ['id','id_kh','tong_tien','ngay_dat','ngay_nhan','cach_nhan','trang_thai','id_admin'];
}
