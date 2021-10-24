<?php

namespace App\Http\Requests;

use App\Enums\Role;
use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminUpdateCartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::user()->role != Role::USER();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'status' => [Rule::in([Status::DELIVERED(), Status::SEND(), Status::READY(), Status::STORE_FAIL(), Status::FAILED(), Status::ORDER()])]
        ];
    }
}
