<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use User;

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
           
            'fullname' => 'required|min:3|max:50',
            // 'email' => 'required|email|unique:users,email,' .$this->id,
            'address' => 'required',
            'phone' => 'required|min:10',
            'password' => 'required|min:4|max:20'
            
        ];
    }
    public function messages()
    {
        return [
            
            'fullname.required' => 'Vui lòng nhập :attribute! ',
            'fullname.min' => ':attribute ít nhất 3 kí tự.',
            'fullname.max' => ':attribute nhiều nhất 50 kí tự.',
            'email.required' => 'Vui lòng nhập :attribute! ',
            'email.email' => ':attribute không hợp lệ',
            'email.unique' => ':attribute đã tồn tại',
            'address.required' => 'Vui lòng nhập :attribute! ',
            'phone.required' => 'Vui lòng nhập :attribute! ',
            'phone.min' => ':attribute ít nhất 10 số.',
            'password.required' => 'Vui lòng nhập :attribute! ',
            'password.min' => ':attribute ít nhất 4 kí tự'
    
        ];
    }
    public function attributes()
    {
        return [
            
            'fullname' =>' Họ và Tên',
            'email' =>' Email',
            'phone' =>' Số điện thoại',
            'address' =>' Địa chỉ',
            'password' =>' Password'
            

        ];
    }
}
