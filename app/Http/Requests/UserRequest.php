<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class UserRequest extends FormRequest
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
        'phone'=> 'required|numeric',
        'address'=> 'required',
        'email' => 'required|email|unique:users,email,'.Auth::user()->id, 
        ];
    }
     public function messages () {
        return [
            'fullname.required'=> 'Không được để trống tên',
            'email.required'=> 'Yêu cầu nhập email',
            'email.email'=> 'Email không hợp lệ',
            'email.unique'=> 'Email tồn tại',
            'phone.required' => 'Yêu cầu nhập số điện thoại',
            'phone.numeric' => 'Số điện thoại không hợp lệ',
            'address.required' => 'Yêu cầu nhập địa chỉ',
          
        ];
    }
}
