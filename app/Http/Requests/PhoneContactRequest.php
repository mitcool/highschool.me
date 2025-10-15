<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneContactRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'nullable',
            'age' => 'nullable',
            'address'=> 'nullable',
            'name' => 'required|max:30',
            'phone_code' => 'required|max:10',
            'phonenumber' => 'required|max:20',
            'hour' => 'required|max:30',
            'agree' => 'required',
            'email' => 'required|email'
        ];
    }
}
