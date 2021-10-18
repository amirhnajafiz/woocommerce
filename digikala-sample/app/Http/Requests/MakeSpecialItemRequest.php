<?php

namespace App\Http\Requests;

use App\Enums\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class MakeSpecialItemRequest handles the item special modification request.
 *
 * @package App\Http\Requests\Item
 */
class MakeSpecialItemRequest extends FormRequest
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
            'discount' => 'numeric'
        ];
    }

    /**
     * Handles the rules messages.
     *
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'numeric' => 'Value of :attribute must be a number.'
        ];
    }
}
