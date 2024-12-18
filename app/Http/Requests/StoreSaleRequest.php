<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'user_id' => 'required',
            'customer_id' => 'required',
            'product_id' => 'required',
            'unit_price' => 'required|numeric',
            'available_qty' => 'required|numeric',
            'qty' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'amount_paid' => 'required|numeric',
            'change_due' => 'required|numeric',
            'total_price' => 'required|numeric',
            'payment_method' => 'required',
        ];
    }
}
