<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'phone' => 'required|max:6|numeric',

        ];
    }
    public function messages()
    {
        return [
            'phone.required' => 'Phải nhập số điện thoại',
            'phone.numeric' => 'Số điện thoại phải là số',
            'phone.max' => 'Phải có tối thiểu 6 số',

        ];
    }
}
