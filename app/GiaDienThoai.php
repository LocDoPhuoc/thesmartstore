<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaDienThoai extends Model
{
    protected $table = 'gia_dien_thoais';
    protected $fillable = ['id','id_dt','gia'];
}
