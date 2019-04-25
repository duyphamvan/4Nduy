<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormSearchRequest extends FormRequest
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
            'bedroom' => 'request',
            'bathroom' => 'request',
            'address' => 'request',
            'date_from' => 'request',
            'date_to' => 'request'
        ];
    }
}
