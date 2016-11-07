<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietPhieuDatHang extends Model
{
    protected $table = 'chi_tiet_phieu_dat_hangs';
    protected $fillable = ['id','id_pdh','id_dt','so_luong','don_gia'];
}
