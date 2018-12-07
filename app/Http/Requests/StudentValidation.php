<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentValidation extends FormRequest
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
        $rules = [
            'group_id' => 'required|numeric',
            'last_name' => 'required|min:2|max:255',
            'given_name' => 'required|alpha|min:2|max:255',
        ];

        if ($this->method() === 'POST') {
            $rules['date_of_birth'] = 'required';
        }

        return $rules;
    }
}