<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ];
    }
    public function messages() {
        return [
            'name.required' => 'Vui lòng nhập tên khách hàng',
            'email.required' => 'Vui lòng nhập ảnh email khách hàng',
            'address.required' => 'Vui lòng nhập địa chỉ khách hàng',
            'phone.required' => 'Vui lòng nhập số điện thoại khách hàng',

        ];
    }

}
