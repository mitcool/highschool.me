<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactModalRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name_request" => "required|max:60",
            "email_request" => "required|email",
            "message" => "required|max:2000",
            'name' => 'nullable',
            'age' => 'nullable',
            'request_type' => 'required',
            'email' => 'nullable'
        ];
    }
}
