<?php

namespace App\Http\Requests;

use App\Enums\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class CreateUpdateSaleRequest for sales model requests.
 *
 * @package App\Http\Requests
 */
class CreateUpdateSaleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::user()->role == Role::ADMIN() || Auth::user()->role == Role::SUPER_ADMIN();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'discount' => 'numeric|min:1|max:99'
        ];
    }
}
