<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Config;

class CreateConferenceRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [];
        $rules['date_from']	='required|date';
        $rules['date_to']	= 'required|date';
        $rules['application_deadline'] = 'required|date';	
        $rules['places']	= 'required';
        $rules['picture'] = 'max:300';
        foreach(Config::get('languages') as $lang => $language){

            $rules['heading_'.$lang] = 'required';
            $rules['slug_'.$lang] = 'required';
            $rules['short_description_'.$lang] = 'required';
            $rules['long_description_'.$lang] = 'required';
        }
        return $rules;
    }
}
