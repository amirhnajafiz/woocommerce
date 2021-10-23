<?php

namespace App\Http\Requests;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        $cart = $this->route('cart');
        return Auth::id() == $cart->user_id && $cart->status == Status::ORDER();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'address_id' => 'exists:addresses,id',
            'bank' => [Rule::in(['AK-Bank', 'National-Bank', 'Iran-Bank'])]
        ];
    }
}
