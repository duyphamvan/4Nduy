<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersRequest extends FormRequest
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
            'name' => 'required|min:2|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'address' => 'required|min:2|max:255',
            'phone' => 'required|numeric|min:10',
            'image' => 'image|mimes:jpeg,jpg,png',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bắt buộc phải điền tên ',
            'name.min' => 'Phải có ít nhất 2 kí tự',
            'email.email' => 'Không đúng định dạng email',
            'password.required'=> 'Phải nhập password',
            'password.min'=> 'Password ít nhất phải có 6 kí tự',
            'address.required' => 'Phải nhập địa chỉ',
            'address.min' => 'Phải có ít nhất 2 kí tự ',
            'phone.required'=>'Phải nhập số điện thoai',
            'phone.numeric'=>'Số điện thoại phải là số',
            'phone.min'=>'Số điện thoại phải ít nhất có 10 số',
            'image'=>'sai định dạng',
            'image.mimes'=>'sai định dạng',
        ];
    }
}
