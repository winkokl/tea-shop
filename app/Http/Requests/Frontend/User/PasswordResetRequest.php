<?php

namespace App\Http\Requests\Frontend\User;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
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
            'email_or_mobile' => ['required', 'valid_phone_number_or_email'],
        ];
    }

    public function messages()
    {
        return [
            'valid_phone_number_or_email' => __('Do not support for this format.Please Enter True Mobile Or Email'),
        ];
    }
}
