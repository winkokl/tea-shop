<?php

namespace Modules\Vendor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateVendorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'   => 'required|max:191',
            'mobile' => ['required'],
            'email'  => ['nullable','email', 'max:191'],
            'vendor_ref' => ['required',Rule::unique('vendors')->ignore($this->route('vendor')->id)],
        ];
    }


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('admin.access.vendor.edit');
    }
}
