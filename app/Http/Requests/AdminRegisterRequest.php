<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRegisterRequest extends FormRequest
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
            'name' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:users',
        ];
    }

    public function messages()
    {
        return [
                'name.required' => 'Vui lòng nhập tên người dùng',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu phải có độ đài tối thiểu 8 kí tự',
                'email.required' => 'Vui lòng nhập email',
                'email.unique' => 'Email này đã được sử dụng',
        ];
    }
}
