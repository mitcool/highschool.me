<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalendarGuestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "gender" => "required",
            "title" => "nullable",
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required",
            "conversation_type" => "required",
            "discussion_topic" => "required",
            "phone_number" => "nullable",
            "phone_code" => "nullable",
            "invoice" => "sometimes",
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
