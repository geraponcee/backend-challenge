<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OwnerRequest extends FormRequest
{

    public function authorize()
    {
        // Declarado asi porque no hago un auth
        return true;
    }

    public function rules()
    {
        
        $rules = [
            'first_name' => ['required', 'string', 'max:191'],
            'last_name' => ['required', 'string', 'max:191'],
            'birth' => ['required', 'date'],
            'image' => ['mimes:jpeg,png,jpg,gif', 'max:1024']
        ];

        if($this->getMethod() == 'POST'){
            $rules += [
                'dni' => ['required', 'string', 'max:8', 'unique:owners'],
                'phone_number' => ['required', 'string', 'max:10', 'unique:owners'],
                'mail' => ['required', 'email', 'unique:owners'],
            ];
        }

        if($this->getMethod() == 'PUT'){
            $rules += [
                'dni' => ['required', 'string', 'max:8', Rule::unique('owners')->ignore($this->owner)],
                'phone_number' => ['required', 'string', 'max:10', Rule::unique('owners')->ignore($this->owner)],
                'mail' => ['required', 'email', Rule::unique('owners')->ignore($this->owner)],
            ];
        }
        
        
        return $rules;

    }
}
