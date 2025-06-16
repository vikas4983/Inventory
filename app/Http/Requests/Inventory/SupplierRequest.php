<?php

namespace App\Http\Requests\inventory;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255',],
            'email' => ['required', 'email', 'unique:suppliers,email'],
            'phone' => ['required', 'digits:10', 'unique:suppliers,phone'],
            'address' => ['required', 'string', 'max:255'],
            'is_active' => ['sometimes', 'integer', 'in:0,1'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'The product name field is required.',
            'name.string' => 'The product name must be a string.',
            'name.max' => 'The product name may not be greater than 255 characters.',

            'email.required' => 'The email field is required.',
            'email.unique' => 'The email must be a unique.',

            'phone.required' => 'The phone field is required.',
            'phone.digits' => 'The phone field is not greater then 10 digit required.',
            'phone.unique' => 'The phone field must be a unique.',

            'address.required' => 'The phone field is required.',
            'name.max' => 'The address name may not be greater than 255 characters.',

        ];
    }
}
