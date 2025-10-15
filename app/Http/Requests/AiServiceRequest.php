<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AiServiceRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'question' => 'required',
            'description' => 'required',
            'public_page_top' => 'required',
            'public_page_bottom' => 'required',
            'slug' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'name_de' => 'required',
            'question_de' => 'required',
            'description_de' => 'required',
            'public_page_top_de' => 'required',
            'public_page_bottom_de' => 'required',
            'slug_de' => 'required',
            'meta_title_de' => 'required',
            'meta_description_de' => 'required',
            'category_id' => 'required',
            'max_tokens' => 'required',
            'temperature' => 'required',
            'cover' => 'nullable'
        ];
    }
}
