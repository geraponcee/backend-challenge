<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortRequest extends FormRequest
{

    public function authorize()
    {
        // Declarado asi porque no hago un auth
        return true;
    }

    public function rules()
    {
        $rules = [
            'city' => ['required', 'string', 'max:191'],
            'province' => ['required', 'string', 'max:191'],
            'country' => ['required', 'string', 'max:191'],
            'latitude' => ['required', 'numeric', 'between:-90,90'],
            'longitude' => ['required', 'numeric', 'between:-90,90'],
            'image' => ['mimes:jpeg,png,jpg,gif', 'max:1024']
        ];

        return $rules;
    }
}
