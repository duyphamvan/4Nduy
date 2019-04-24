<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateHouseRequest extends FormRequest
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
            'name' => 'required|min:2',
            'address' => 'required|min:2',
            'bedroom' => 'required|numeric|min:1',
            'bathroom' => 'required|numeric|min:1',
            'description' => 'required|min:2',
            'image[]' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric|min:1',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bắt buộc phải nhập tên nhà!',
            'name.min'=> ' Tên phải bắt đầu bằng 2 kí tự ',
            'address.required' => 'Phải nhập địa chỉ của nhà ',
            'address.min' => 'Địa chỉ phải có it nhất 2 kí tự ',
            'address.max' => 'Địa chỉ phải có ít nhất 2 kí tự ',
            'bedroom.required' => 'Phải nhập số phòng ngủ',
            'bedroom.numeric ' => 'Phòng ngủ phải là số ',
            'bedroom.min' => 'Nhà phải có ít nhất 1 phòng ngủ ',
            'bathroom.required' => 'Phải nhập số phòng ngủ',
            'bathroom.numeric' => 'Phòng ngủ phải là số ',
            'bathroom.min' =>  'Nhà phải có ít nhất 1 phòng ngủ ',
            'description.required' => 'Bắt buộc mô tả nhà',
            'description.min' => 'Phải có ít nhất 2 kí tự và nhiều nhất là 100 kí tự',
            'description.max' => 'Phải có ít nhất 1 kí tự và nhiều nhất là 100 kí tự',
            'image[].image' => 'Định dạng file sai ',
            'image[].mimes' => 'Định dạng file sai ',
            'image[].max' => 'Định dạng file quá lớn ',
            'price.required' => 'Phải nhập giá nhà',
             'price.numeric' => 'Giá nhà phải nhập số ',
           'price.min' => 'giá phải ít nhất là 2',
        ];

    }
}
