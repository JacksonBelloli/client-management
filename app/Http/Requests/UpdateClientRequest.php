<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'name' => 'nullable|string',
            'email' => 'nullable|email',
            'cpf_cnpj' => 'nullable|string|min:14|max:18',
            'phone' => 'nullable|string',
            'zip_code' => 'nullable|string|max:9',
            'street' => 'nullable|string',
            'number' => 'nullable|integer',
            'complement' => 'nullable|string',
            'district' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string|max:2',
        ];
    }
}
