<?php

namespace Users\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/|max:191',
            'password' => 'required|alpha_num|max:191|min:6',
        ];
    }
    public function  messages()
    {
        return [
            'email.required' => 'Email is Required',
            'email.email' => 'Valid Email',
            'password.required' => 'Password is Required'
        ];

    }
}
