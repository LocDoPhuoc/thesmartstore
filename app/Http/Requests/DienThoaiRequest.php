<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DienThoaiRequest extends FormRequest
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
            //'ten_dt' => 'required|unique:dien_thoais',
            'ten_dt' => 'required',
            'sltNSX' => 'required',
            'txtGia' => 'required|numeric|min:50000',
            'txtSoLuong' => 'required|numeric|min:1',

        ];
    }

    public function messages(){
        return [
            'ten_dt.required' => 'Vui lòng nhập tên điện thoại',
            //'ten_dt.unique' => 'Điện thoại đã tồn tại',
            'sltNSX.required' => 'Vui lòng chọn hãng sản xuất cho điện thoại',
            'txtGia.required' => 'Vui lòng nhập giá bán cho điện thoại',
            'txtGia.numeric' => 'Giá bán của điện thoại phải là kiểu số nguyên',
            'txtGia.min' => 'Giá bán của điện thoại phải lớn hơn 50000 đồng',
            'txtSoLuong.required' => 'Vui lòng nhập số lượng cho điện thoại',
            'txtSoLuong.numeric' => 'Số lượng của điện thoại phải là kiểu số nguyên',
            'txtSoLuong.min' => 'Số lượng của điện thoại phải lớn hơn 0',
        ];
    }
}
