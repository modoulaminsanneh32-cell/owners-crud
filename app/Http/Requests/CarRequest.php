<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'reg_number' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'owner_id' => 'required|exists:owners,id',
        ];
    }

    public function messages(): array
    {
        return [
            'reg_number.required' => 'Car registration number is required',
            'brand.required' => 'Brand is required',
            'model.required' => 'Model is required',
            'owner_id.required' => 'Owner is required',
            'owner_id.exists' => 'Selected owner is invalid',
        ];
    }
}
