<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestRequest extends FormRequest
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
        'name' => 'required|string',
        'email'=>'required|email',
        'phone'=> 'required|numeric',
        'address'=> 'required'
        ];
    }
     public function messages () {
        return [
            'name.required'=> 'Bắt buộc nhập tên của bạn',
            'email.required'=> 'Bắt buộc nhập email',
            'email.email'=> 'email không hợp lệ',
            'phone.required' => 'Yêu cầu nhập số điện thoại',
            'phone.numeric' => 'Số điện thoại không hợp lệ',
            'address.required' => 'Yêu cầu nhập địa chỉ',
          
        ];
    }
}
