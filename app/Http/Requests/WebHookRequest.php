<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebHookRequest extends FormRequest
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
            'product_ref' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'product_ref.required' => 'Product reference is required.',
            'product_ref.integer' => 'Product reference must be an integer.',
        ];
    }
}
