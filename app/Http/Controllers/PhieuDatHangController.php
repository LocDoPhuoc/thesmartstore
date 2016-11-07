<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PhieuDatHangDienThoai;
use App\KhachHang;
use App\DienThoai;
use App\ChiTietPhieuDatHang;
use DateTime, DB, Auth;

class PhieuDatHangController extends Controller
{
    public function getList(){
    	$phieu = PhieuDatHangDienThoai::where('trang_thai',1)->get();
    	return view('admin.don_dat_hang.list',compact('phieu'));
    }

    public function getOkList(){
        $phieu = PhieuDatHangDienThoai::where('trang_thai',2)->get();
        return view('admin.don_dat_hang.ok-list',compact('phieu'));
    }

    public function getDetail($id){
    	$phieu = PhieuDatHangDienThoai::where('id',$id)->get();
        if ($phieu[0]->trang_thai == 2) {
            return redirect()->back()->with(['flash_message'=> 'Đơn hàng đã được duyệt !!!','status'=>'danger']);
        } else {
           
            $chitiet = ChiTietPhieuDatHang::where('id_pdh',$id)->get();
            foreach ($phieu as $pdh) {
                $khach = KhachHang::where('id',$pdh->id_kh)->get();
                $date = new DateTime($pdh->ngay_dat);
                $ngay = $date->format('d-m-Y');
            }
            return view('admin.don_dat_hang.detail',compact('phieu','chitiet','khach','ngay'));
        }
        
    }

    public function checkDetail(Request $r){

        $phieu = PhieuDatHangDienThoai::where('id',$r->id)->select('id')->get();
        $chitiet = ChiTietPhieuDatHang::where('id_pdh',$phieu[0]->id)->get();

        foreach ($chitiet as $ct) {
            $soLuongCon = 0;
            $soLuongBan = 0;
            $dienthoai = DienThoai::where('id',$ct->id_dt)->select('so_luong_con','so_luong_ban')->get();
            $soLuongCon = $dienthoai[0]->so_luong_con - $ct->so_luong;
            $soLuongBan = $dienthoai[0]->so_luong_ban + $ct->so_luong;
            //echo $soLuongCon . " - " . $soLuongBan ."</br>";
            DB::table('dien_thoais')->where('id',$ct->id_dt)->update([
                'so_luong_con' => $soLuongCon,
                'so_luong_ban' => $soLuongBan ,
            ]);
        }

        $date = new DateTime($r->txtNgayNhan);
        $ngayNhan = $date->format('Y-m-d H:i:s'); 
        $id_admin = Auth::user()->id;
        //echo $ngayNhan;
        DB::table('phieu_dat_hang_dien_thoais')->where('id',$r->id)->update([
            'ngay_nhan' => $ngayNhan,
            'trang_thai' => 2,
            'id_admin' => $id_admin,
        ]);

        return redirect('admin/don-dat-hang/list')->with(['flash_message'=> 'Đơn hàng đã được duyệt thành công !!!','status'=>'success']);
    }

    public function delete($id){
        //$phieu = PhieuDatHangDienThoai::where('id',$id)->get();
        $chitiet = ChiTietPhieuDatHang::where('id_pdh',$id)->get();
        foreach ($chitiet as $ct) {
            DB::table('chi_tiet_phieu_dat_hangs')->where('id',$ct->id)->delete();
        }

        DB::table('phieu_dat_hang_dien_thoais')->where('id',$id)->delete();
        return redirect('admin/don-dat-hang/list')->with(['flash_message'=> 'Đơn hàng không hợp lệ, đã xóa!!!','status'=>'warning']);
    }
}
