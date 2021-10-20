<?php

namespace App\Http\Requests;

use App\Enums\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class CreateUpdateCategoryRequest.
 *
 * @package App\Http\Requests
 */
class CreateUpdateCategoryRequest extends FormRequest
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
            'parent_id' => 'exists_or_null:categories,id',
            'file' => 'required'
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
            'required' => 'Please enter category name.',
            'min' => 'Name is too short.',
            'max' => 'Name is very long.',
            'exists' => 'No such super category.'
        ];
    }
}
