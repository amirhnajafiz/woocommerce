<?php

namespace App\Http\Requests;

use App\Enums\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class CreateUpdateBrandRequest.
 *
 * @package App\Http\Requests
 */
class CreateUpdateBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        if (!empty(Auth::user()->role)) {
            return Auth::user()->role == Role::ADMIN();
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:1|max:64',
            'description' => 'required|min:5|max:2048'
        ];
    }

    /**
     * Get the messages for rules.
     *
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'required' => 'You should have :attribute.',
            'min' => ':attribute is too short.',
            'max' => ':attribute is very long.'
        ];
    }
}
