<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class changePasswordRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'password' => 'min:8|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'password.min'       => 'The password must be at least 8 characters',
            'password.confirmed' => 'The password does not match'
        ];
    }
}
