<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'price' => 'required|numeric',
            'cost_price' => 'required|numeric',
            'qty' => 'required|integer',
            'image' => 'nullable|image'
        ];
    }

    /**
     * Get custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'category_id.required' => 'The category field is required.',
            'supplier_id.required' => 'The supplier field is required.',
            'name.required' => 'The product name is required.',
            'price.required' => 'The price field is required.',
            'cost_price.required' => 'The cost price field is required.',
            'qty.required' => 'The quantity field is required.',
            'image.image' => 'The image must be a valid image file.',
        ];
    }
}
