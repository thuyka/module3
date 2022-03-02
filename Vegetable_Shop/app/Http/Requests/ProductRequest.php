<?php

namespace App\Http\Requests;

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
        return [
            'name' => 'required',
            'image' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'quantity' => 'required'
        ];
    }
        public function messages() {
            return [
                'name.required' => 'Vui lòng nhập tên sản phẩm',
                'image.required' => 'Vui lòng nhập ảnh sản phẩm',
                'price.required' => 'Vui lòng nhập giá sản phẩm',
                'price.numeric' => 'Sai kiểu dữ liệu',
                'description.required' => 'Vui lòng nhập mô tả sản phẩm',
                'quantity.required' => 'Vui lòng nhập giá sản phẩm',
            ];
    }
}
