<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiNguoiDung extends Model
{
    protected $table = 'loai_nguoi_dungs';
    protected $fillable = ['id','ten_loai'];
}
