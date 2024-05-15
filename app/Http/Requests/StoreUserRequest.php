<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'password' => bcrypt($this->password),
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255' . ($this->method() == 'POST' ? '|unique:users' : ''),
            'password' => 'required|string|min:8|',
            'role' => 'required|string|exists:roles,name',
            'permissions' => 'array',
        ];
    }
}
