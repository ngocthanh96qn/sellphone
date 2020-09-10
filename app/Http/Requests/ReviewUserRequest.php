<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewUserRequest extends FormRequest
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
           'value'=>'required',
           'content'=>'required|string'
       ];
   }
   public function messages () {
    return [
        'value.required'=> 'Bạn chưa đánh giá sao',
        'content.required' => 'Yêu cầu nhập đánh giá của ban' 
    ];
}
}
