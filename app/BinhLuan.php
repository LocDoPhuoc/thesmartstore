<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    protected $table = 'binh_luans';
    protected $fillable = ['id','id_dt','ten','email','noi_dung','ngay_dang'];
}
