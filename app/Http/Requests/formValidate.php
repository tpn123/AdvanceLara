<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class formValidate extends FormRequest
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
	        'name' => 'required|string|max:20',
	        'email' => 'required|string|email|max:255',
        ];
    }

	public function messages()
	{
		return [
			'name.required' => 'Name should not be empty',
			'name.max' => 'Name should not be longer than 20 chars.',
			'email.required' => 'Email should not be empty',
		];
	}
}
