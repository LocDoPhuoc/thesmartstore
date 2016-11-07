<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    protected $table = 'nguoi_dungs';
    protected $fillable = ['id','level','ten_tk','mat_khau','ho_ten','email','dia_chi'];
    protected $hidden = [
        'remember_token',
    ];
}
