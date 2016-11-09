<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\HangSanXuat;
use App\DienThoai;
use DB;

class HangSanXuatController extends Controller
{
    public function getList(){
    	$hangSX = HangSanXuat::all()->sortBy('id');
    	return view('admin.hang_san_xuat.list',compact('hangSX'));
    }

    public function getAdd(){
    	return view('admin.hang_san_xuat.add');
    }

    public function postAdd(Request $r){
    	$nsx = new HangSanXuat;
    	$nsx->ten = $r->ten;

        if($r->rdoTrangThai == "Kinh doanh"){
            $nsx->trang_thai = 1;
        }
        else{
            $nsx->trang_thai = 2;
        }
        
    	$nsx->save();
    	return redirect()->route('admin.hang-san-xuat.getList')->with(['flash_message'=>'Thêm hãng sản xuất thành công !!!','status'=>'success',]);
    }

    public function getUpdate($id){
        $hangSX = HangSanXuat::where('id',$id)->get();
        return view('admin.hang_san_xuat.edit',compact('hangSX'));
    }

    public function postUpdate(Request $r){
        $dt = DienThoai::where('id_nsx',$r->id)->where('trang_thai',1)->count();
        if($r->rdoTrangThai == "Kinh doanh"){
            $trang_thai = 1;
        }
        else{
            if ($dt == 0) {
                $trang_thai = 2;
            } 
            else {
                return redirect()->back()->with(['flash_message'=>'Không thể sửa trạng thái của hãng sản xuất, vì những điện thoại của hãng trong cửa hàng vẫn còn kinh doanh !!!','status'=>'danger',]);
            }          
        }
        DB::table('hang_san_xuats')->where('id',$r->id)->update([
            'ten' => $r->ten,
            'trang_thai' => $trang_thai,
        ]);
        return redirect()->route('admin.hang-san-xuat.getList')->with(['flash_message'=>'Hãng sản xuất đã được sửa thành công !!!','status'=>'success',]);
    }

    public function delete($id, Request $r){
        $dt = DienThoai::where('id_nsx',$id)->where('trang_thai',1)->count();
        if ($dt == 0) {
                $trang_thai = 2;
        } 
        else {
            return redirect()->back()->with(['flash_message'=>'Không xóa hãng sản xuất, vì những điện thoại của hãng trong cửa hàng vẫn còn kinh doanh !!!','status'=>'danger',]);
        }  

        DB::table('hang_san_xuats')->where('id',$id)->update([
            'trang_thai' => $trang_thai,
        ]);
        return redirect()->route('admin.hang-san-xuat.getList')->with(['flash_message'=>'Hãng sản xuất đã được sửa thành công !!!','status'=>'success',]);
    }
}
