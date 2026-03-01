<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // allow request
    }

    public function rules(): array
    {
        return [
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:6'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'Please enter name.',
            'name.string'       => 'Name must be a valid string.',
            'name.max'          => 'Name must not exceed 255 characters.',

            'email.required'    => 'Please enter email.',
            'email.email'       => 'Please enter a valid email address.',
            'email.unique'      => 'This email is already registered.',

            'password.required' => 'Please enter password.',
            'password.min'      => 'Password must be at least 6 characters long.'
        ];
    }
}