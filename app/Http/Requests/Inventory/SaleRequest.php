<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
            'customer_id' => ['required', 'integer', 'exists:customers,id'],
            'sale_date'   => ['required', 'date'],
            'total'       => ['required', 'numeric', 'min:0'],
            'is_active'   => ['sometimes', 'integer', 'in:0,1'],
        ];
    }
    public function messages(): array
    {
        return [
            'customer_id.required' => 'Please select a customer.',
            'customer_id.exists'   => 'The selected customer is invalid.',

            'sale_date.required'   => 'Please select a date.',
            'sale_date.date'       => 'Please enter a valid date.',

            'total.required'       => 'Total amount is required.',
            'total.numeric'        => 'Total must be a number.',
            'total.min'            => 'Total must be at least 0.',

            'is_active.in'         => 'Status must be either on or off.',
        ];
    }
}
