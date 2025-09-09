<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateUserDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        $userId = Auth::id(); // или $this->user()->id

        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $userId,
            'current_password' => [
                'required_with:password',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Текущий пароль указан неверно.');
                    }
                }
            ],
            'password' => 'nullable|min:8|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Этот email уже зарегистрирован.'
        ];
    }
}
