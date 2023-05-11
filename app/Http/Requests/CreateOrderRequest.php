<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'customer_id' => 'required',
            'order_name' => 'required',
            'order_quantity' => 'required',
            'order_price' => 'required',
            'order_discount' => 'required',
            'order_total' => 'required',
            'order_date' => 'required',
            'payment_status' => 'required',
            'remarks' => 'sometimes'
        ];
    }
}
