<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\QuangCao;
use App\DienThoai;
use File, DB;

class QuangCaoController extends Controller
{
    public function getList(){
    	$quangcao = QuangCao::where('trang_thai',1)->get();
    	return view('admin.quang_cao.list',compact('quangcao'));
    }

    public function getAdd(){
    	$dienthoai = DienThoai::all();
    	return view('admin.quang_cao.add',compact('dienthoai'));
    }

    public function postAdd(Request $r){
    	
    	if ($r->rdoTrangThai == "Hiển thị") {
    		$stt = 1;
    	} else {
    		$stt = 2;
    	}

    	$qc = new QuangCao;
    	$qc->id_dt = $r->sltDienThoai;
    	$destinationPath = 'public/smartstore/quangcao/uploads/';
    	$qc->img = uploadImages($destinationPath,$r->fHinhAnh);
    	$qc->trang_thai = $stt;
    	$qc->save();

    	return redirect()->route('admin.quang-cao.getList')->with(['flash_message'=>'Quảng cáo đã được thêm thành công !!!','status'=>'success',]);
    }

    public function delete($id, Request $r){
    	$img = QuangCao::where('id',$id)->select('img')->get();
    	File::delete($img[0]->img);
    	DB::table('quang_caos')->where('id',$id)->delete();
    	return redirect()->route('admin.quang-cao.getList')->with(['flash_message'=>'Quảng cáo đã được xóa !!!','status'=>'success',]);
    }

    public function getUpdate($id){
    	$quangcao = QuangCao::where('id',$id)->get();
    	return view('admin.quang_cao.edit',compact('quangcao'));
    }

    public function postUpdate(Request $r){
    	File::delete($r->old_img);
    	$destinationPath = 'public/smartstore/quangcao/uploads/';

    	if (empty($r->fHinhAnh)) {
    		$url = $r->old_img;
    	} else {	
    		$url = $r->fHinhAnh;
    	}

    	if ($r->rdoTrangThai == "Hiển thị") {
    		$stt = 1;
    	} else {
    		$stt = 2;
    	}
    	
    	DB::table('quang_caos')->where('id',$r->id)->update([
    		'id_dt' => $r->id_dt,
    		'img' => uploadImages($destinationPath, $url),
    		'trang_thai' => $stt
    	]);

    	return redirect()->route('admin.quang-cao.getList')->with(['flash_message'=>'Thông tin quảng cáo đã được sửa!!!','status'=>'success',]);
    }
}
