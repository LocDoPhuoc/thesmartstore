<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HangSanXuat extends Model
{
    protected $table = 'hang_san_xuats';
    protected $fillable = ['id','ten','trang_thai'];
 	
}
