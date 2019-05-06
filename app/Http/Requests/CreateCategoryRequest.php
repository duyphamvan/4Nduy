<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',

        ];
    }
    public function messages()
    {
     return [
         'name.required' => 'Bắt buộc phải có tên nhà',
         'name.min' => 'Tên nhà bắt buộc phải có 2 kí tự',
         'image.image'=> 'Định dạng file sai',
         'image.mimes'=>'Định dạng file sai',
     ];
    }
}
