<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        'fullname' => 'required|string',
        'email'=>'required|email|unique:users,email',
        'phone'=> 'required|numeric',
        'password'=>'required|min:6',
        'address'=> 'required'
        ];
    }
     public function messages () {
        return [
            'fullname.required'=> 'Bắt buộc nhập tên của bạn',
            'email.required'=> 'Bắt buộc nhập email',
            'email.email'=> 'email không hợp lệ',
            'email.unique'=> 'email đã tồn tại',
            'phone.required' => 'Yêu cầu nhập số điện thoại',
            'phone.numeric' => 'Số điện thoại không hợp lệ',
            'password.required' => 'Yêu cầu nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất 6 kí tự',
            'address.required' => 'Yêu cầu nhập địa chỉ',
          
        ];
    }
    
}
