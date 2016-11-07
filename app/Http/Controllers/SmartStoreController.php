<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CheckOutRequest;
use App\DienThoai;
use App\GiaDienThoai;
use App\HinhAnhDienThoai;
use App\KhachHang;
use App\PhieuDatHangDienThoai;
use App\ChiTietPhieuDatHang;
use App\HangSanXuat;
use Cart;
use DateTime;
use DB;

class SmartStoreController extends Controller
{
    public function index(){
    	try{
            $dienthoai = DienThoai::where('trang_thai',1)->take(9)->get();
        }
        catch(Exception $e){

        }
        return view('smartstore.index',compact('dienthoai'));
    }


    public function buy($id){
        $dienthoai = DienThoai::where('id',$id)->get();
        foreach ($dienthoai as $dt) {
        	$gia = GiaDienThoai::where('id_dt',$id)->get();
        	foreach ($gia as $price) {
        		$gia_dt = $price->gia;
        	}
            $hinh = HinhAnhDienThoai::where('loai_hinh',4)->where('hinh_dt',$id)->get();
            
        	Cart::add(array('id' => $id, 'name' => $dt->ten_dt, 'qty'=>1, 'price'=> $gia_dt ,'options' =>array('img' => $hinh[0]->url)));
        }

        return redirect()->back();
        
    }

    public function shopping(){
        $num = Cart::count();
    	$content = Cart::content();
    	return view('smartstore.shopping',compact('content','num'));
    
    }

    public function delete($id){
        Cart::remove($id);
        return redirect()->back();

    }

    public function update(Request $r){
        if ($r->ajax()) {
            $id = $r->get('id');
            $qty = $r->get('qty');
            $name = $r->get('name');
            $data = DienThoai::where('ten_dt',$name)->get();
            $num = $data[0]->so_luong_con;
            if($num >= $qty){
                if ($qty > 0) {
                    Cart::update($id,$qty);
                    echo "Cập nhật thành công";
                }
                else {
                    echo "Thao tác không thành công";
                } 
            }
            else {
                echo "Thao tác không thành công";
            }    
        }
    }

    public function getCheckOut(){
        //$content = Cart::content();
        return view('smartstore.check_out');
    }

    public function postCheckOut(CheckOutRequest $r){
        if($r->gioi_tinh == 1){
            $gioi_tinh = "Nam";
        }
        else{
            $gioi_tinh = "Nữ"; 
        }

        $kh = new KhachHang;      
        $kh->ho_ten = $r->ho_ten;
        $kh->gioi_tinh = $gioi_tinh;
        $kh->email = $r->email;
        $kh->sdt = $r->sdt;
        $kh->dia_chi = $r->dia_chi;
        $kh->save();

        if($r->cach_nhan == 1){
            $cach_nhan = "Thanh toán tại cửa hàng";
        }
        else{
            $cach_nhan = "Giao hàng thu tiền tại nhà";
        }

        $pdh = new PhieuDatHangDienThoai;
        $date = new DateTime();
        $pdh->id_kh = $kh->id;
        $pdh->tong_tien = Cart::subtotal(-2,',','.');
        $pdh->ngay_dat = $date->format('Y-m-d H:i:s');
        $pdh->cach_nhan = $cach_nhan;
        $pdh->trang_thai = 1;
        $pdh->save();

        foreach (Cart::content() as $content) {
            $dienthoai = DienThoai::where('ten_dt',$content->name)->get();
            foreach ($dienthoai as $dt) {
                $ct = new ChiTietPhieuDatHang;
                $ct->id_pdh = $pdh->id;
                $ct->id_dt = $dt->id;
                $ct->so_luong = $content->qty;
                $ct->don_gia = $content->price;
                $ct->save();
            }
        }

        Cart::destroy();

        return view('smartstore.success');
    }

    public function searchByNSX($id){
        
        $dienthoai = DienThoai::where('trang_thai',1)->where('id_nsx',$id)->get();
        $nsx = HangSanXuat::where('id',$id)->get();
        return view('smartstore.mobile',compact('dienthoai','nsx'));
    }

    public function searchByPrice($gia_duoi, $gia_tren){
        //
        $dienthoai = DB::table('dien_thoais')
                            ->join('gia_dien_thoais','gia_dien_thoais.id_dt','=','dien_thoais.id')
                            ->where('gia','<',$gia_tren)
                            ->where('gia','>',$gia_duoi)
                            ->where('trang_thai',1)
                            ->select('dien_thoais.id','dien_thoais.ten_dt')
                            ->get();
        $nsx = "";
        return view('smartstore.mobile',compact('dienthoai','nsx'));
    }

    public function searchHome(Request $r){
        if(empty($r->txtSearch)){
            return redirect()->back();
        }
        else{
            $dienthoai = DienThoai::where('ten_dt','like','%'.$r->txtSearch.'%')->get();
            if ($dienthoai->isEmpty()) {
                $dienthoai = DB::table('dien_thoais')
                                ->join('hang_san_xuats','hang_san_xuats.id','=','dien_thoais.id_nsx')
                                ->where('ten','like','%'.$r->txtSearch.'%')
                                ->select('dien_thoais.id','dien_thoais.ten_dt')
                                ->get();
            } 
            $nsx = "";
            return view('smartstore.mobile',compact('dienthoai','nsx'));
        }
    }

    public function getApple(){
        
        $dienthoai = DienThoai::where('trang_thai',1)->where('id_nsx',1)->get();
        $nsx = HangSanXuat::where('id',1)->get();
        return view('smartstore.mobile',compact('dienthoai','nsx'));
    }

    public function getSamsung(){
        
        $dienthoai = DienThoai::where('trang_thai',1)->where('id_nsx',3)->get();
        $nsx = HangSanXuat::where('id',3)->get();
        return view('smartstore.mobile',compact('dienthoai','nsx'));
    }

    public function getSony(){
        
        $dienthoai = DienThoai::where('trang_thai',1)->where('id_nsx',2)->get();
        $nsx = HangSanXuat::where('id',2)->get();
        return view('smartstore.mobile',compact('dienthoai','nsx'));
    }

}
