<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DienThoai extends Model
{
    protected $table = 'dien_thoais';
    protected $fillable = ['id','ten_dt','id_nsx','trang_thai','mo_ta','so_luong_con','so_luong_ban','dt_moi','xuat_xu'];
}
