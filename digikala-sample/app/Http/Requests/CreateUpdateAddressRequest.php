<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUpdateAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'state' => 'required|min:2|max:64',
            'city' => 'required|min:2|max:64',
            'address' => 'required|min:2|max:128',
            'zip_code' => 'required|min:1|max:12',
            'phone' => 'required|numeric|min:6|max:12'
        ];
    }
}
