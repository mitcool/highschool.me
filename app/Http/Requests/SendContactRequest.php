<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendContactRequest extends FormRequest
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
    public function rules()
    {
        return [
            "name"  => "required|max:100",
            "given_name"  => "required|max:100",
            "street_house_num"  => "required|max:100",
            "postal_code_city"  => "required|max:100",
            "country"  => "required|max:100",
            "phone_num"  => "required|max:100",
            "email"  => "required|max:100",
            "topic_1"  => "required|max:100",        
        ];
    }
}
