<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BoardingRequest extends FormRequest
{

    public function authorize()
    {
        // Declarado asi porque no hago un auth
        return true;
    }

    public function rules()
    {

        $rules = [
            'name' => ['required', 'string', 'max:191'],
            'type' => ['required'],
            'owner' => ['required'],
            'image' => ['mimes:jpeg,png,jpg,gif', 'max:1024']
        ];

        if($this->getMethod() == 'POST'){
            $rules += [
                'registration' => ['required', 'string', 'max:10', 'unique:boardings'],
            ];
        }

        if($this->getMethod() == 'PUT'){
            $rules += [
                'registration' => ['required', 'string', 'max:10', Rule::unique('boardings')->ignore($this->boarding)],
            ];
        }
        
        
        return $rules;

    }
}
