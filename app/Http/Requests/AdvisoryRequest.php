<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvisoryRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return[
            "name" => 'nullable',
            'age' => 'nullable',
            'address' => 'nullable',
            "firstname" => "required|max:30",
            "surname" => "required|max:30",
            "phone" => "required|max:30",
            "email" => "required|email|max:30",
            "subject" => "required|max:100",
            "message" => "required|max:2000",
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
