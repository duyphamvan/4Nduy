<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' =>'min:2',
            'email' =>'email',
            'address' =>'min:2',
            'phone' =>'min:6|numeric',
            'image' =>'image|mimes:jpeg,png,jpg|max:2048',


        ];
    }
    public  function messages()
    {
        return [
            'name.min'=>'Tên phải có 2 kí tự trở lên',
            'email.email'=>'sai định dạng email',
            'address.min'=>'Tối thiểu phải có 2 kí tự',
            'phone.min'=>'Tối thiểu là 6 số',
            'phone.numeric'=>'Số điện thoại phải nhập số',
            'image.image'=>'Sai định dạng file',

        ];
    }

}
