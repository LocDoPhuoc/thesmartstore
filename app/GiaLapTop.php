<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaLapTop extends Model
{
    protected $table = 'gia_lap_tops';
    protected $fillable = ['id','id_lt','gia'];
}
