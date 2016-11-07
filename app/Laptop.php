<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    protected $table = 'lap_tops';
    protected $fillable = ['id','ten_lt','trang_thai','mo_ta','so_luong_con','so_luong_ban','lt_moi','xuat_xu'];
}
