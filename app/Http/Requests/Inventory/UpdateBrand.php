<?php

namespace App\Http\Requests\inventory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBrand extends FormRequest
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
                Rule::unique('brands')->ignore($this->brand ?? $this->id)
            ],
            'is_active' => ['sometimes', 'integer', 'in:0,1'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'The Brand name field is required.',
            'name.string' => 'The Brand name must be a string.',
            'name.max' => 'The Brand name may not be greater than 255 characters.',
            'name.unique' => 'This Brand name already exists. Please choose a different name.',
            'name.regex' => 'The Brand name may only contain letters and spaces.',
        ];
    }
}
