<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class SaleItemRequest extends FormRequest
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
            'sale_id' => ['required', 'exists:sales,id'],
            'product_id'  => ['required', 'exists:products,id'],
            'quantity'    => ['required', 'integer', 'min:1'],
            'price'       => ['required', 'numeric', 'min:0'],
            'is_active'   => ['sometimes', 'in:0,1'],
        ];
    }
    public function messages(): array
    {
        return [
            'sale_id.required' => 'Please select a purchase.',
            'sale_id.exists'   => 'The selected purchase is invalid.',

            'product_id.required'  => 'Please select a product.',
            'product_id.exists'    => 'The selected product is invalid.',

            'quantity.required'    => 'Quantity is required.',
            'quantity.integer'     => 'Quantity must be an integer.',
            'quantity.min'         => 'Quantity must be at least 1.',

            'price.required'       => 'Price is required.',
            'price.numeric'        => 'Price must be a number.',
            'price.min'            => 'Price must be at least 0.',


        ];
    }
}
