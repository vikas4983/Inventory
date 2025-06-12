<?php

namespace App\Http\Requests\inventory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'name' => [
                'sometimes',
                'required',
                'string',
                'max:255',
            ],
            'stock' => ['sometimes','required', 'integer'],
            'category_id' => ['sometimes','required', 'integer'],
            'brand_id' => ['sometimes','required', 'integer'],
            'cost_price' => ['sometimes','required', 'numeric'],
            'selling_price' => ['sometimes','required', 'numeric',],
            'description' => ['sometimes','required', 'string', 'max:255',],
            'is_active' => ['sometimes', 'integer', 'in:0,1'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The product name field is required.',
            'name.string' => 'The product name must be a string.',
            'name.max' => 'The product name may not be greater than 255 characters.',

            'stock.required' => 'The stock quantity field is required.',
            'stock.integer' => 'The stock must be a number.',

            'category_id.required' => 'The category field is required.',
            'category_id.integer' => 'The category must be a number.',

            'brand_id.required' => 'The brand field is required.',
            'brand_id.integer' => 'The brand must be a number.',

            'cost_price.required' => 'The cost price field is required.',
            'cost_price.integer' => 'The cost price must be a number.',

            'selling_price.required' => 'The selling price field is required.',
            'selling_price.integer' => 'The selling price must be a number.',

            'description.required' => 'The product description  field is required.',
            'description.string' => 'The product description  must be a string.',
            'description.max' => 'The product description  may not be greater than 255 characters.',


        ];
    }
}
