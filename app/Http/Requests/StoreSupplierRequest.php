<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^\+?[0-9\s\-]{10,12}$/',
            'email' => 'required|email|unique:suppliers,email',
            'address' => 'required|string|max:255',
        ];
    }

    /**
     * Get custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'contact_person.required' => 'Contact person is required.',
            'phone.required' => 'Phone number is required.',
            'phone.regex' => 'Phone number must be 10-12 digits and can include +, -, or spaces.',
            'email.required' => 'Email is required.',
            'email.unique' => 'This email address already exists.',
            'address.required' => 'Address is required.',
            'address.max' => 'The address is too long (maximum 255 characters).',
        ];
    }
}
