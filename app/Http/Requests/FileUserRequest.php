<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileUserRequest extends FormRequest
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
        return [
            'file' => 'required|file|max:100MB',
            'visibility' => 'required|string|in:public,family,private',
            'families' => 'required_if:visibility,family'
        ];
    }

    public function messages()
    {
        return [
            'file.required' => 'file not found.'
        ];
    }
}
