<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormSearchRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'address'=>'required|string',
            'date_from'=>'required|date',
            'date_to'=>'required|date'
        ];
    }
    public function messages()
    {
        return [
            'address.required'=>'Address cannot be blank',
            'address.string'=>'Address must be string type',
            'date_from.required'=>'Date cannot be blank',
            'date_from.date'=>'The date entered must be the date format',
            'date_to.required'=>'Date cannot be blank',
            'date_to.date'=>'The date entered must be the date format',
        ];
    }
}
