<?php

namespace App\Http\Requests\inventory;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePurchase extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'supplier_id' => ['sometimes','required', 'integer',],
            'status_id' => ['sometimes','required', 'integer',],
            'purchase_date' => ['sometimes','required', 'date',],
            'total' => ['sometimes','required', 'numeric',],
            'is_active' => ['sometimes', 'integer', 'in:0,1'],
        ];
    }
    public function messages(): array
    {
        return [
            'supplier_id.required' => 'The Supplier name field is required.',
            'status_id.required' => 'The Status field is required.',
            'purchase_date.required' => 'The Date field is required.',
            'total.numeric' => 'The Purchase total quantity field is must be a number.',
            'supplier_id.required' => 'The Supplier name field is required.',
        ];
    }
}
