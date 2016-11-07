<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiHinhAnh extends Model
{
    protected $table = 'loai_hinh_anhs';
    protected $fillable = ['id','ten_loai'];
}
