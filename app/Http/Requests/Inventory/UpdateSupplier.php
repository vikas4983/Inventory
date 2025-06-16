<?php

namespace App\Http\Requests\inventory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSupplier extends FormRequest
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
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => ['sometimes', 'required', 'email', Rule::unique('suppliers', 'email')->ignore($this->supplier)],
            'phone' => ['sometimes', 'required', 'digits:10', Rule::unique('suppliers', 'phone')->ignore($this->supplier)],
            'address' => ['sometimes', 'required', 'string', 'max:255'],
            'is_active' => ['sometimes', 'integer', 'in:0,1'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',

            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email must be unique.',

            'phone.required' => 'The phone field is required.',
            'phone.digits' => 'The phone must be exactly 10 digits.',
            'phone.unique' => 'The phone must be unique.',

            'address.required' => 'The address field is required.',
            'address.string' => 'The address must be a string.',
            'address.max' => 'The address may not be greater than 255 characters.',

           
        ];
    }
}
