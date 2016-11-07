<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, DateTime;
use App\BinhLuan;

class BinhLuanController extends Controller
{
    public function postComment($id, Request $r){
    	$cmt = new BinhLuan;
    	$cmt->id_dt = $id;
    	$cmt->ten = $r->name;
    	$cmt->email = $r->email;
    	$cmt->noi_dung = $r->comment;
    	$date = new DateTime();
    	$cmt->ngay_dang = $date->format('Y-m-d H:i:s');

    	$cmt->save();
    	return redirect('/dienthoai/'.$id);
    }
}
