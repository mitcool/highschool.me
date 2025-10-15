<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => "nullable", //honeypot
            "address" => "nullable", //honeypot
            "age" => "nullable", //honeypot
            "gender" => "required",
            "firstname" => "required|max:40",
            "surname" => "required|max:40",
            "email" =>  "required|email|max:40",
            "phone" => "required|max:30|min:5",
            "phonecode" => "required",
            "program" => "required",
            "communication_language"  => "required|max:40",
        ];
    }
}
