<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
                'regex:/^[\pL\s]+$/u',
                Rule::unique('statuses', 'name')->ignore($this->status ?? $this->id),
            ],
            'is_active' => [
                'sometimes',
                'required',
                'integer',
                'in:0,1',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The status name field is required.',
            'name.string' => 'The status name must be a string.',
            'name.max' => 'The status name may not be greater than 255 characters.',
            'name.unique' => 'This status name already exists. Please choose a different name.',
            'name.regex' => 'The status name may only contain letters and spaces.',
        ];
    }
}
