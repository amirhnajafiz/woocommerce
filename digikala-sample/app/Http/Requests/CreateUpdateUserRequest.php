<?php

namespace App\Http\Requests;

use App\Enums\Limit;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateUpdateUserRequest for user form request.
 *
 * @package App\Http\Requests
 */
class CreateUpdateUserRequest extends FormRequest
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
            'name' => 'required|min:2|max:' . Limit::NAME(),
            'email' => 'required|email:rfc,dns|max:' . Limit::LINK(),
            'phone' => array('required', 'regex:/^0[0-9]{2,}[0-9]{7,}$/'),
            'password' => 'required|min:4|max:' . Limit::TITLE()
        ];
    }

    /**
     * Get the validation messages.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'required' => 'Filed :attribute is required.',
            'min' => 'Filed :attribute is too short.',
            'max' => 'Filed :attribute is too long.',
            'email' => 'Invalid email pattern.',
            'regex' => 'Invalid phone pattern'
        ];
    }
}
