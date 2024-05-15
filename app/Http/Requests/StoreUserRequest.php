<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if ($this->isMethod('post')) {
            $this->merge([
                'password' => bcrypt($this->password),
            ]);
        }
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255' . ($this->isMethod('post') ? '|unique:users,email' : ''),
            'role' => 'required|string|exists:roles,name',
            'permissions' => 'array',
        ];

        if ($this->isMethod('post')) {
            $rules['password'] = 'required|string|min:8';
        }

        return $rules;
    }
}
