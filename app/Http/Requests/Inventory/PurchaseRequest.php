<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'supplier_id' => ['required', 'integer',],
            'status_id' => ['required', 'integer',],
            'purchase_date' => ['required', 'date',],
            'total' => ['required', 'numeric',],
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
