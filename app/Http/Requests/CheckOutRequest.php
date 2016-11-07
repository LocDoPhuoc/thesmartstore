<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckOutRequest extends FormRequest
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
            'ho_ten' => 'required',
            'email' => 'required|email',
            'sdt' => 'required|digits_between:10,11',
            'dia_chi'=>'required'
        ];
    }

    public function messages(){
        return [
            'ho_ten.required' => 'Vui lòng nhập họ tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập email theo đúng cấu trúc',
            'sdt.required' => 'Vui lòng nhập số điện thoại',
            'sdt.numeric' => 'Vui lòng nhập số điện thoại đúng',
            'sdt.digits_between' => 'Số điện thoại phải có ít nhất 10 chữ số, nhiều nhất 11 chữ số',
            'dia_chi.required' =>'Vui lòng nhập địa chỉ',
        ];
    }
}
