<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhAnhLap extends Model
{
    protected $table = 'hinh_anh_laps';
    protected $fillable = ['id','loai_hinh','hinh_lt','url'];
}
