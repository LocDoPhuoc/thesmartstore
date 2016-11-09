<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ChiTietDienThoaiRequest;
use App\DienThoai;
use App\ChiTietDienThoai;
use DB;

class ChiTietDienThoaiController extends Controller
{
    public function getAdd($id){
    	$ten = "";
    	$id_dt = "";
    	$dienthoai = DienThoai::where('id',$id)->select('id','ten_dt')->get();
    	foreach ($dienthoai as $dt) {
    		$ten = $dt->ten_dt;
    		$id_dt = $dt->id;
    	}
    	return view('admin.chi_tiet_dien_thoai.add',compact('ten','id_dt'));
    }

    public function postAdd(ChiTietDienThoaiRequest $r){
    	$chitiet = new ChiTietDienThoai; 
    	$chitiet->id_dt = $r->id_dt;
        $chitiet->mau_sac = $r->txtMauSac;
    	$chitiet->cong_nghe_mh = $r->sltCongNgheMH;
    	$chitiet->kich_thuoc_mh = $r->sltKichThuocMH;
    	$chitiet->do_phan_giai_mh = $r->sltDoPhanGiaiMH;
    	$chitiet->cam_ung = $r->txtCamUng;
    	$chitiet->mat_kinh = $r->sltMatKinh;
    	$chitiet->do_phan_giai_cmr_sau = $r->txtDoPhanGiaiCmrSau;
    	$chitiet->quay_phim_cmr_sau = $r->txtQuayPhim;
    	$chitiet->den_flash = $r->rdoDenFlash; 

    	if (!empty($r->chAnhNangCao)) {
	    	$data = $r->chAnhNangCao;
	    	$chitiet->chup_anh_nang_cao = getStringFromCheckBox($data,"",", ");
	    } else {
	    	return redirect()->back()->with(['flash_message'=>'Vui lòng chọn chế độ chụp ảnh nâng cao cho điện thoại !!!','status'=>'danger',]);
	    }

    	$chitiet->do_phan_giai_cmr_truoc = $r->txtDoPhanGiaiCmrTruoc;
    	$chitiet->quay_phim_cmr_truoc = $r->rdoQuayPhimCmrTruoc;

    	if (!empty($r->chThongTinKhac)) {
	    	$data = $r->chThongTinKhac;
	    	$chitiet->thong_tin_khac = getStringFromCheckBox($data,"",", ");
	    } else {
	    	return redirect()->back()->with(['flash_message'=>'Vui lòng chọn thêm thông tin bổ sung khác về camera trước cho điện thoại !!!','status'=>'danger',]);
	    }

    	$chitiet->he_dieu_hanh = $r->sltHeDieuHanh;
    	$chitiet->chipset = $r->txtChipset;
    	$chitiet->so_nhan_cpu = $r->sltSoNhanCPU;
    	$chitiet->toc_do_cpu = $r->txtTocDoCPU;
    	$chitiet->gpu = $r->txtGPU;
    	$chitiet->ram = $r->txtRAM;
    	$chitiet->rom = $r->txtROM;
    	$chitiet->the_nho_ngoai = $r->rdoTheNhoNgoai;
    	$chitiet->ho_tro_the_nho_toi_da = $r->txtTheToiDa;
    	$chitiet->bang_tan_2g = $r->txtBangTan2G;
    	$chitiet->bang_tan_3g = $r->txtBangTan3G;
    	$chitiet->ho_tro_4g = $r->txtHoTro4G;
    	$chitiet->so_khe_sim = $r->rdoSoKheSim;

    	if (!empty($r->chLoaiSim)) {
	    	$data = $r->chLoaiSim;
	    	$chitiet->loai_sim = getStringFromCheckBox($data,""," + ");
	    } else {
	    	return redirect()->back()->with(['flash_message'=>'Vui lòng chọn loại sim điện thoại hỗ trợ !!!','status'=>'danger',]);
	    }
    	
    	$chitiet->wifi = $r->txtWifi;
    	$chitiet->gps = $r->txtGPS;
    	$chitiet->bluetooth = $r->txtBluetooth;
    	$chitiet->nfc = $r->rdoNFC;
    	$chitiet->cong_ket_noi_sac = $r->rdoCongSac;
    	$chitiet->jack_tai_nghe = $r->txtJack;

    	if (!empty($r->chKetNoiKhac)) {
	    	$data = $r->chKetNoiKhac;
	    	$chitiet->ket_noi_khac = getStringFromCheckBox($data,"",", ");
	    } else {
	    	return redirect()->back()->with(['flash_message'=>'Vui lòng chọn kết nối khác điện thoại hỗ trợ !!!','status'=>'danger',]);
	    }
    	
    	$chitiet->thiet_ke = $r->txtThietKe;
    	$chitiet->chat_lieu = $r->txtChatLieu;
    	$chitiet->kich_thuoc = $r->txtKichThuoc;
    	$chitiet->trong_luong = $r->txtTrongLuong;
    	$chitiet->dung_luong_pin = $r->txtDungLuongPin;
    	$chitiet->loai_pin = $r->txtLoaiPin;

    	if (!empty($r->chXemPhim)) {
	    	$data = $r->chXemPhim;
	    	$chitiet->xem_phim = getStringFromCheckBox($data,"",", ");
	    } else {
	    	return redirect()->back()->with(['flash_message'=>'Vui lòng chọn chuẩn video điện thoại hỗ trợ !!!','status'=>'danger',]);
	    }

    	if (!empty($r->chNgheNhac)) {
	    	$data = $r->chNgheNhac;
	    	$chitiet->nghe_nhac = getStringFromCheckBox($data,"",", ");
	    } else {
	    	return redirect()->back()->with(['flash_message'=>'Vui lòng chọn chuẩn âm thanh điện thoại hỗ trợ !!!','status'=>'danger',]);
	    }

    	$chitiet->ghi_am = $r->rdoGhiAm;
    	$chitiet->radio = $r->txtRadio;
   
    	if (!empty($r->chChucNangKhac)) {
	    	$data = $r->chChucNangKhac;
	    	$chitiet->chuc_nang_khac = getStringFromCheckBox($data,"",", ");
	    } else {
	    	return redirect()->back()->with(['flash_message'=>'Vui lòng chọn thêm chức năng khác điện thoại hỗ trợ !!!','status'=>'danger',]);
	    }

        $chitiet->bao_hanh = $r->txtBaoHanh;

	    $chitiet->save();

	return redirect()->route('admin.dien-thoai.getList')->with(['flash_message'=>'Điện thoại và thông tin cấu hình chi tiết đã được thêm thành công !!!','status'=>'success',]);

    }

    public function getUpdate($id){
        $chitiet = ChiTietDienThoai::where('id_dt',$id)->get();
        $dienthoai = DienThoai::where('id',$id)->select('id','ten_dt')->get();
        foreach ($dienthoai as $dt) {
            $ten = $dt->ten_dt;
            $id_dt = $dt->id;
        }
        return view('admin.chi_tiet_dien_thoai.edit',compact('ten','id_dt','chitiet'));
    }

    public function postUpdate(ChiTietDienThoaiRequest $r){
        if (!empty($r->chAnhNangCao)) {
            $data = $r->chAnhNangCao;
            $anhNangCao = getStringFromCheckBox($data,"",", ");
        } else {
            return redirect()->back()->with(['flash_message'=>'Vui lòng chọn chế độ chụp ảnh nâng cao cho điện thoại !!!','status'=>'danger',]);
        }

        if (!empty($r->chThongTinKhac)) {
            $data = $r->chThongTinKhac;
            $thongTinKhac = getStringFromCheckBox($data,"",", ");
        } else {
            return redirect()->back()->with(['flash_message'=>'Vui lòng chọn thêm thông tin bổ sung khác về camera trước cho điện thoại !!!','status'=>'danger',]);
        }

        if (!empty($r->chLoaiSim)) {
            $data = $r->chLoaiSim;
            $loaiSim = getStringFromCheckBox($data,""," + ");
        } else {
            return redirect()->back()->with(['flash_message'=>'Vui lòng chọn loại sim điện thoại hỗ trợ !!!','status'=>'danger',]);
        }

        if (!empty($r->chKetNoiKhac)) {
            $data = $r->chKetNoiKhac;
            $ketNoiKhac = getStringFromCheckBox($data,"",", ");
        } else {
            return redirect()->back()->with(['flash_message'=>'Vui lòng chọn kết nối khác điện thoại hỗ trợ !!!','status'=>'danger',]);
        }

        if (!empty($r->chXemPhim)) {
            $data = $r->chXemPhim;
            $xemPhim = getStringFromCheckBox($data,"",", ");
        } else {
            return redirect()->back()->with(['flash_message'=>'Vui lòng chọn chuẩn video điện thoại hỗ trợ !!!','status'=>'danger',]);
        }

        if (!empty($r->chNgheNhac)) {
            $data = $r->chNgheNhac;
            $ngheNhac = getStringFromCheckBox($data,"",", ");
        } else {
            return redirect()->back()->with(['flash_message'=>'Vui lòng chọn chuẩn âm thanh điện thoại hỗ trợ !!!','status'=>'danger',]);
        }

        if (!empty($r->chChucNangKhac)) {
            $data = $r->chChucNangKhac;
            $chucNangKhac = getStringFromCheckBox($data,"",", ");
        } else {
            return redirect()->back()->with(['flash_message'=>'Vui lòng chọn thêm chức năng khác điện thoại hỗ trợ !!!','status'=>'danger',]);
        }

        DB::table('chi_tiet_dien_thoais')->where('id',$r->id)->update([
            'id_dt' => $r->id_dt,
            'mau_sac' => $r->txtMauSac,
            'cong_nghe_mh' => $r->sltCongNgheMH,
            'kich_thuoc_mh' => $r->sltKichThuocMH,
            'do_phan_giai_mh' => $r->sltDoPhanGiaiMH,
            'cam_ung' => $r->txtCamUng,
            'mat_kinh' => $r->sltMatKinh,
            'do_phan_giai_cmr_sau' => $r->txtDoPhanGiaiCmrSau,
            'quay_phim_cmr_sau' => $r->txtQuayPhim,
            'den_flash' => $r->rdoDenFlash,
            'chup_anh_nang_cao' => $anhNangCao,
            'do_phan_giai_cmr_truoc' => $r->txtDoPhanGiaiCmrTruoc,
            'quay_phim_cmr_truoc' => $r->rdoQuayPhimCmrTruoc,
            'thong_tin_khac' => $thongTinKhac,
            'he_dieu_hanh' => $r->sltHeDieuHanh,
            'chipset' => $r->txtChipset,
            'so_nhan_cpu' => $r->sltSoNhanCPU,
            'toc_do_cpu' => $r->txtTocDoCPU,
            'gpu' => $r->txtGPU,
            'ram' => $r->txtRAM,
            'rom' => $r->txtROM,
            'the_nho_ngoai' => $r->rdoTheNhoNgoai,
            'ho_tro_the_nho_toi_da' => $r->txtTheToiDa,
            'bang_tan_2g' => $r->txtBangTan2G,
            'bang_tan_3g' => $r->txtBangTan3G,
            'ho_tro_4g' => $r->txtHoTro4G,
            'so_khe_sim' => $r->rdoSoKheSim,
            'loai_sim' => $loaiSim,
            'wifi' => $r->txtWifi,
            'gps' => $r->txtGPS,
            'bluetooth' => $r->txtBluetooth,
            'nfc' => $r->rdoNFC,
            'cong_ket_noi_sac' => $r->rdoCongSac,
            'jack_tai_nghe' => $r->txtJack,
            'ket_noi_khac' => $ketNoiKhac,
            'thiet_ke' => $r->txtThietKe,
            'chat_lieu' => $r->txtChatLieu,
            'kich_thuoc' => $r->txtKichThuoc,
            'trong_luong' => $r->txtTrongLuong,
            'dung_luong_pin' => $r->txtDungLuongPin,
            'loai_pin' => $r->txtLoaiPin,
            'xem_phim' => $xemPhim,
            'nghe_nhac' => $ngheNhac,
            'ghi_am' => $r->rdoGhiAm,
            'radio' => $r->txtRadio,
            'chuc_nang_khac' =>$chucNangKhac,
            'bao_hanh' => $r->txtBaoHanh,
        ]);

        return redirect()->back()->with(['flash_message'=>'Chi tiết điện thoại đã được sửa thành công !!!','status'=>'success',]);
    }

    public function cancel($id_dt){
        DB::table('hinh_anh_dien_thoais')->where('hinh_dt',$id_dt)->delete();
        DB::table('gia_dien_thoais')->where('id_dt',$id_dt)->delete();
        DB::table('dien_thoais')->where('id',$id_dt)->delete();
        return redirect()->route('admin.dien-thoai.getList')->with(['flash_message'=>'Thêm điện thoại không thành công, vì bạn không thêm thông tin chi tiết cấu hình cho điện thoại, có thể xảy ra lỗi trong quá trình hiển thị !!!','status'=>'danger',]);
    }
}
