<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'chosen_program' => 'required|max:80',
            'type_of_payment' => 'required|max:40',
            'first_name' => 'required|max:40',
            'middle_name' => 'max:80',
            'family_name' => 'required|max:40',
            'day' => 'required|max:40',
            'month' => 'required|max:40',
            'year' => 'required|max:40',
            'chosen_gender' => 'required|max:40',
            'mail' => 'required|max:40',
            'phone_number' => 'required|max:40',
            'zip_code' => 'required|max:20',
            "address" => "required|max:30",
            'country' => 'required|max:40',
            'city' => 'required|max:40',
            'address' => 'required|max:40',
            'passport' => 'required|max:2000|mimes:doc,docx,pdf',
            'cv' => 'required|max:2000|mimes:doc,docx,pdf',
            'degrees' => 'required|max:2000|mimes:doc,docx,pdf',
            'reference_letter' => 'max:2000|mimes:doc,docx,pdf',
            "how_you_learn_about_us" => "max:40",
            "why_did_you_chose_us" => "max:40",
            "agree_to_terms" => "required",
            
        ];
    }
}
