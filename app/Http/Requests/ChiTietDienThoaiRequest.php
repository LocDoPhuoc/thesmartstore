<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChiTietDienThoaiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'txtMauSac'=>'required',
            'txtCamUng'=>'required',
            'txtDoPhanGiaiCmrSau'=>'required|numeric',
            'txtQuayPhim'=>'required',
            'txtDoPhanGiaiCmrTruoc'=>'required|numeric',
            'txtChipset'=>'required',
            'txtTocDoCPU'=>'required',
            'txtGPU'=>'required',
            'txtRAM'=>'required|numeric',
            'txtROM'=>'required|numeric',
            'txtTheToiDa'=>'required',
            'txtBangTan2G'=>'required',
            'txtBangTan3G'=>'required',
            'txtHoTro4G'=>'required',
            'txtWifi'=>'required',
            'txtGPS'=>'required',
            'txtBluetooth'=>'required',
            'txtJack'=>'required',
            'txtThietKe'=>'required',
            'txtKichThuoc'=>'required',
            'txtTrongLuong'=>'required',
            'txtDungLuongPin'=>'required|numeric',
            'txtLoaiPin'=>'required',
            'txtBaoHanh'=>'required',
        ];
    }

    public function messages(){
        return [
            "txtMauSac.required" => 'Vui lòng nhập màu sắc của điện thoại',
            "txtCamUng.required" => 'Vui lòng nhập công nghệ cảm ứng của điện thoại',
            "txtDoPhanGiaiCmrSau.required" => 'Vui lòng nhập độ phân giải camera sau của điện thoại',
            "txtDoPhanGiaiCmrSau.numeric" => 'Độ phân giải camera sau phải là kiểu số',
            "txtQuayPhim.required" => 'Vui lòng nhập chất lượng quay phim của camera sau',
            "txtDoPhanGiaiCmrTruoc.required" => 'Vui lòng nhập độ phân giải của camera trước',
            "txtDoPhanGiaiCmrTruoc.numeric" => 'Độ phân giải camera trước phải là kiểu số',
            "txtChipset.required" => 'Vui lòng nhập hãng săn xuất CPU của điện thoại',
            "txtTocDoCPU.required" => 'Vui lòng nhập tốc độ CPU của điện thoại',
            "txtGPU.required" => 'Vui lòng nhập chip đồ họa của điện thoại',
            "txtRAM.required" => 'Vui lòng nhập dung lượng ram của điện thoại',
            "txtRAM.numeric" => 'Dung lượng ram của điện thoại phải là kiểu số',
            "txtROM.required" => 'Vui lòng nhập dung lượng rom của điện thoại',
            "txtROM.numeric" => 'Dung lượng rom của điện thoại phải là kiểu số',
            "txtTheToiDa.required" => 'Vui lòng nhập dung lượng thẻ nhớ tối đa điện thoại hỗ trợ',
            "txtBangTan2G.required" => 'Vui lòng nhập băng tần 2g điện thoại hỗ trợ',
            "txtBangTan3G.required" => 'Vui lòng nhập băng tần 3g điện thoại hỗ trợ',
            "txtHoTro4G.required" => 'Vui lòng nhập băng tần 4g điện thoại hỗ trợ',
            "txtWifi.required" => 'Vui lòng nhập chuẩn wifi điện thoại hỗ trợ',
            "txtGPS.required" => 'Vui lòng nhập chuẩn gps điện thoại hỗ trợ',
            "txtBluetooth.required" => 'Vui lòng nhập chuẩn bluetooth điện thoại hỗ trợ',
            "txtJack.required" => 'Vui lòng nhập loại jack tai nghe',
            "txtThietKe.required" => 'Vui lòng nhập thiết kế của điện thoại',
            "txtKichThuoc.required" => 'Vui lòng nhập kích thước của điện thoại',
            "txtTrongLuong.required" => 'Vui lòng nhập trọng lượng của điện thoại',
            "txtDungLuongPin.required" => 'Vui lòng nhập dung lượng pin của điện thoại',
            "txtLoaiPin.required" => 'Vui lòng nhập loại pin',
            "txtBaoHanh.required" => 'Vui lòng nhập thời gian bảo hành của điện thoại',
        ];
        
    }
}
