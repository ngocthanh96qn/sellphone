<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
             'name'=>'required|min:4|max:20|unique:categories'
        ];
    }
    public function messages(){
        return [
             'name.required' => 'Vui lòng nhập tên hãng sản xuất!',
             'name.min'=>'Tên hãng ít nhất 4 kí tự',
             'name.max'=>'Tên hãng nhiều nhất 20 kí tự',
             'name.unique' => 'Tên hãng đã tồn tại'  
        ];
    }
}
