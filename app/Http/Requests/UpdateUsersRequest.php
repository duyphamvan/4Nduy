<?php


namespace App\Http\Controllers;


class UpdateUsersRequest
{
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
            'name' => 'required' ,
            'email' => 'nullable|email|unique:users,email',
            'phone' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'  => 'Tên không được để trống.',
            'email.required'  => 'Email không được để trống.',
            'email.email'  => 'Email không đúng định dạng.',
            'email.unique'  => 'Email đã tồn tại.',
            'phone.required'  => 'Số điện thoại không được để trống.',
        ];
    }
}
