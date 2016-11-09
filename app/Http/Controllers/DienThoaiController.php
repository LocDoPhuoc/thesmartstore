<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\DienThoaiRequest;
use App\DienThoai;
use App\GiaDienThoai;
use App\ChiTietDienThoai;
use App\HangSanXuat;
use App\HinhAnhDienThoai;
use Storage, DB;
use File, Redirect, DateTime;

class DienThoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $dienthoai = DienThoai::where('trang_thai',1)->get();
        $nsx = "";
        return view('smartstore.mobile',compact('dienthoai','nsx'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hangsanxuat = HangSanXuat::all();
        return view('admin.dien_thoai.add',compact('hangsanxuat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DienThoaiRequest $r)
    {
        $dt = new DienThoai;
        $dt->ten_dt = $r->ten_dt;
        $dt->id_nsx = $r->sltNSX;

        if ($r->rdoTrangThai == "Kinh doanh") {
            $dt->trang_thai = 1;
        } else {
            $dt->trang_thai = 2;
        }
        
        $dt->mo_ta = $r->txtMota;
        $dt->so_luong_con = $r->txtSoLuong;
        $dt->so_luong_ban = 0;
        $dt->save();
    
        $destinationPath = 'public/smartstore/uploads/'.changeTitle($r->ten_dt).'/';
        File::makeDirectory($destinationPath);

        $quangcao = new HinhAnhDienThoai;
        $quangcao->loai_hinh = 1;
        $quangcao->hinh_dt = $dt->id;
        $quangcao->url = uploadImages($destinationPath,$r->fQuangCao);
        $quangcao->save();

        $noibat1 = new HinhAnhDienThoai;
        $noibat1->loai_hinh = 2;
        $noibat1->hinh_dt = $dt->id;
        $noibat1->url = uploadImages($destinationPath,$r->fNoiBat1);
        $noibat1->save();

        $noibat2 = new HinhAnhDienThoai;
        $noibat2->loai_hinh = 2;
        $noibat2->hinh_dt = $dt->id;
        $noibat2->url = uploadImages($destinationPath,$r->fNoiBat2);
        $noibat2->save();

        $noibat3 = new HinhAnhDienThoai;
        $noibat3->loai_hinh = 2;
        $noibat3->hinh_dt = $dt->id;
        $noibat3->url = uploadImages($destinationPath,$r->fNoiBat3);
        $noibat3->save();

        $noibat4 = new HinhAnhDienThoai;
        $noibat4->loai_hinh = 2;
        $noibat4->hinh_dt = $dt->id;
        $noibat4->url = uploadImages($destinationPath,$r->fNoiBat4);
        $noibat4->save();

        $noibat5 = new HinhAnhDienThoai;
        $noibat5->loai_hinh = 2;
        $noibat5->hinh_dt = $dt->id;
        $noibat5->url = uploadImages($destinationPath,$r->fNoiBat5);
        $noibat5->save();

        $chucnang = new HinhAnhDienThoai;
        $chucnang->loai_hinh = 3;
        $chucnang->hinh_dt = $dt->id;
        $chucnang->url = uploadImages($destinationPath,$r->fChucNang);
        $chucnang->save();

        $giohang = new HinhAnhDienThoai;
        $giohang->loai_hinh = 4;
        $giohang->hinh_dt = $dt->id;
        $giohang->url = uploadImages($destinationPath,$r->fGioHang);
        $giohang->save();

        $gia = new GiaDienThoai;
        $gia->id_dt = $dt->id;
        $gia->gia = $r->txtGia;
        $gia->save();

        return redirect()->route('admin.chi-tiet-dien-thoai.getAdd',[$dt->id])->with(['flash_message'=>'Điện thoại đã được thêm thành công, vui lòng bổ sung chi tiết cấu hình của điện thoại !!!','status'=>'success',]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_dt)
    {
        $detail = ChiTietDienThoai::where('id_dt',$id_dt)->get();
        return view('smartstore.details-mobile',compact('detail'));
    }

    public function getList(){
        $data = DienThoai::all()->sortBy('id');
        return view('admin.dien_thoai.list',compact('data'));
    }

    public function getNewList(){
        $date = new DateTime();
        $data = DB::table('dien_thoais')->where('created_at','LIKE','%'.$date->format('Y-m-d').'%')->get();
        return view('admin.dien_thoai.list',compact('data'));
    }

    public function getHetHang(){
        $data = DienThoai::where('so_luong_con',0)->get();
        return view('admin.dien_thoai.het-hang',compact('data'));
    }

    public function getDaBan(){
        $data = DienThoai::where('so_luong_ban','>',0)->get();
        return view('admin.dien_thoai.da-ban',compact('data'));
    }

    public function delete($id, Request $r){
        DB::table('dien_thoais')->where('id',$id)->update(['trang_thai'=>2]);
        return redirect()->back()->with(['flash_message'=> 'Xoa thanh cong !!!','status'=>'success']);
    }


    public function deleteImg($id, Request $r){
        if($r->ajax()){
            $url = $r->get('url');
            $img = HinhAnhDienThoai::where('id',$id)->get();
            if(!empty($img)){
                File::delete($url);
                //HinhAnhDienThoai::where('id',$id)->delete();
            }
            echo "Hình ảnh đã xóa, vui lòng chọn hình ảnh mới!!";
        }

    }


    public function getUpdate($id){
        $dienthoai = DienThoai::where('id',$id)->get();
        $hangsanxuat = HangSanXuat::all();
        return view('admin.dien_thoai.edit',compact('dienthoai','hangsanxuat'));
    }

    public function postUpdate(DienThoaiRequest $r){
        $dt = DienThoai::where('id',$r->id_dt)->select('ten_dt')->get();

        if ($r->rdoTrangThai == "Kinh doanh") {
            $trang_thai = 1;
        } else {
            $trang_thai = 2;
        }

        DienThoai::where('id', $r->id_dt)->update([
            'ten_dt' => $r->ten_dt,
            'id_nsx' => $r->sltNSX,
            'trang_thai' => $trang_thai,
            'mo_ta' => $r->txtMota,
            'so_luong_con' => $r->txtSoLuong,
            'so_luong_ban' => 0,
        ]);

        GiaDienThoai::where('id_dt',$r->id_dt)->update([
            'gia' => $r->txtGia,
        ]);


        //$destinationOldPath = 'public/smartstore/uploads/'.changeTitle($dt[0]->ten_dt).'/';
        $destinationPath = 'public/smartstore/uploads/'.changeTitle($r->ten_dt).'/';
        if($r->ten_dt != $dt[0]->ten_dt ){
            File::makeDirectory($destinationPath);
        }
        
        //Storage::move($destinationOldPath, $destinationPath);

        if(!empty($r->fQuangCao)){
            HinhAnhDienThoai::where('loai_hinh',1)->where('hinh_dt', $r->id_dt)->update([
                'url' => uploadImages($destinationPath,$r->fQuangCao),
            ]);
        }

        if(!empty($r->fNoiBat1)){
            HinhAnhDienThoai::where('loai_hinh',2)->where('hinh_dt', $r->id_dt)->update([
                'url' => uploadImages($destinationPath,$r->fNoiBat1),
            ]);
        }

        if(!empty($r->fNoiBat2)){
            HinhAnhDienThoai::where('loai_hinh',2)->where('hinh_dt', $r->id_dt)->update([
                'url' => uploadImages($destinationPath,$r->fNoiBat2),
            ]);
        }

        if(!empty($r->fNoiBat3)){
            HinhAnhDienThoai::where('loai_hinh',2)->where('hinh_dt', $r->id_dt)->update([
                'url' => uploadImages($destinationPath,$r->fNoiBat3),
            ]);
        }

        if(!empty($r->fNoiBat4)){
            HinhAnhDienThoai::where('loai_hinh',2)->where('hinh_dt', $r->id_dt)->update([
                'url' => uploadImages($destinationPath,$r->fNoiBat4),
            ]);
        }

        if(!empty($r->fNoiBat5)){
            HinhAnhDienThoai::where('loai_hinh',2)->where('hinh_dt', $r->id_dt)->update([
                'url' => uploadImages($destinationPath,$r->fNoiBat5),
            ]);
        }

        if(!empty($r->fChucNang)){
            HinhAnhDienThoai::where('loai_hinh',3)->where('hinh_dt', $r->id_dt)->update([
                'url' => uploadImages($destinationPath,$r->fChucNang),
            ]);
        }

        if(!empty($r->fGioHang)){
            HinhAnhDienThoai::where('loai_hinh',4)->where('hinh_dt', $r->id_dt)->update([
                'url' => uploadImages($destinationPath,$r->fGioHang),
            ]);
        }

        return redirect()->route('admin.dien-thoai.getList')->with(['flash_message'=>'Sủa thông tin điện thoại thành công !!!','status'=>'success']);
    }
}
