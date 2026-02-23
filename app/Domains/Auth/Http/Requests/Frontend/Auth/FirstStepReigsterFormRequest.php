<?php

namespace App\Domains\Auth\Http\Requests\Frontend\Auth;

use Illuminate\Foundation\Http\FormRequest;

class FirstStepReigsterFormRequest extends FormRequest
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
            'name' => 'required|string',
            'date_of_birth' => 'required|date',
            'email_or_mobile' => ['required', 'valid_phone_number_or_email', 'unique_user_email_or_mobile'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Please enter your name'),
            'date_of_birth.required' => __('Please Choose Date of Birth'),
            'email_or_mobile.required' => __('Please Enter Your Email or Mobile No'),
            'unique_user_email_or_mobile' => __('Your Email or Mobile has been already register in our system.'),
            'valid_phone_number_or_email' => __('Do not support for this format.Please Enter True Mobile Or Email.'),
        ];
    }
}
