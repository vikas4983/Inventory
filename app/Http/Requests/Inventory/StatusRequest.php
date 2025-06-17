<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StatusRequest extends FormRequest
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
            'name' => ['required','string', 'max:255','regex:/^[\pL\s]+$/u',Rule::unique('statuses')->ignore($this->status ?? $this->id) ],
            'is_active' => ['required', 'integer', 'in:0,1'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'The category name field is required.',
            'name.string' => 'The category name must be a string.',
            'name.max' => 'The category name may not be greater than 255 characters.',
            'name.unique' => 'This category name already exists. Please choose a different name.',
            'name.regex' => 'The category name may only contain letters and spaces.',
        ];
    }
}
