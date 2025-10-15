<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramContactRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'first_name' => 'nullable',
            'address' => 'nullable',
            'age' => 'nullable',
            "name"  => "required|max:40",
            "last_name"  => "required|max:40",
            "mail"  => "required|max:40",
            "phonecode"  => "required",
            "phone_number"  => "required|max:40",
            "program_name"  => "required|max:80",
            "how_did_you_find" => "required",
            "communication_language"  => "required|max:40",
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
