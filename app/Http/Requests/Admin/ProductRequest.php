<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return[
            'name'=>'required',
           
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'size'=>'required',
            'weight'=>'required',
            'color'=>'required',
            'image'=>'required',
            'display'=>'required',
            'os'=>'required',
            'storage'=>'required',
            'ram'=>'required',
            'cpu'=>'required',
            'gpu'=>'required',
            'primary_camera'=>'required',
            'rear_camera'=>'required',
            'battery'=>'required',
            'warranty'=>'required'
        ];
    }
    public function messages(){
        return [
             'name.required' =>'Vui lòng nhập tên sản phẩm!',
             
             'title.required' =>'Vui lòng nhập tiêu đề sản phẩm!',
             'description.required' =>'Vui lòng nhập mô tả sản phẩm!',
             'price.required' =>'Vui lòng nhập giá sản phẩm!',
             'quantity.required' =>'Vui lòng nhập số lượng sản phẩm!',
             'size.required' =>'Vui lòng nhập kích thước sản phẩm!',
             'weight.required' =>'Vui lòng nhập cân nặng sản phẩm!',
             'color.required' =>'Vui lòng nhập màu sắc sản phẩm!',
             'image.required' =>'Vui lòng nhập hình ảnh sản phẩm!',
             'display.required' =>'Vui lòng nhập thông số màn hình sản phẩm!',
             'os.required' =>'Vui lòng nhập hệ điều hành sản phẩm!',
             'storage.required' =>'Vui lòng nhập bộ nhớ trong sản phẩm!',
             'ram.required' =>'Vui lòng nhập RAM sản phẩm!',
             'cpu.required' =>'Vui lòng nhập CPU sản phẩm!',
             'gpu.required' =>'Vui lòng nhập GPU sản phẩm!',
             'primary_camera.required' =>'Vui lòng nhập camera trước sản phẩm!',
             'rear_camera.required' =>'Vui lòng nhập camera sau sản phẩm!',
             'battery.required' =>'Vui lòng nhập dung lượng pin sản phẩm!',
             'warranty.required' =>'Vui lòng nhập bảo hành sản phẩm!'
        ];
    }
}
