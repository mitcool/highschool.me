<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralRequest extends FormRequest
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
            'request_type' => 'required',
            'subject' => 'required',
            'email' => 'nullable', //honeypot
            'name' => 'nullable', //honeypot
            'age' => 'nullable', //honeypot
           
            
        ];
    }
}
