<?php

namespace Modules\Vendor\Http\Requests;

// use Arcanedev\Support\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateVendorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:191',
            'vendor_ref'=>['required',Rule::unique('vendors')],
            'mobile' => ['required','unique_user_email_or_mobile','valid_phone_number'],
            'email'    => ['nullable','email', 'max:191', Rule::unique('users')],
            'password' => 'required|min:6|confirmed',
            'nrc_code_number' => "required|min:6|max:6"
        ];
    }

    public function messages()
    {
        return [
            'valid_phone_number' => 'Invalid Mobile No. or Not Support Mobile No.',
            'unique_user_email_or_mobile' => __('Your Email or Mobile has been already register in our system.'),
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('admin.access.vendor.create');
    }
}
