<?php

namespace App\Http\Requests;

use App\Enums\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class CreateUpdateItemRequest.
 *
 * @package App\Http\Requests
 */
class CreateUpdateItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        if (!empty(Auth::user()->role)) {
            $role = Auth::user()->role;
            return $role == Role::ADMIN() || $role == Role::WRITER();
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
            'price' => 'required|numeric',
            'number' => 'numeric',
            'brand_id' => 'exists:App\Models\Brand,id',
            'category_id' => 'required|array',
            'category_id.*' => 'exists_or_null:categories,id'
        ];
    }

    /**
     * Get the rules messages.
     *
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'required' => 'Field :attribute is required.',
            'numeric' => 'Enter a number value.',
            'exists' => 'No such :attribute.'
        ];
    }
}
