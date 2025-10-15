<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplyConferenceRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "firstname" => "required|max:30",
            "lastname" => "required|max:30",
            "street" => "required|max:50",
            "address" => "required|max:50",
            "phone" => "required|max:30",
            "email" => "required|email|max:80",
            "agree" => "required",
            "conference_id" => "required"
        ];
    }
}
