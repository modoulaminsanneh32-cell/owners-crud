<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function messages(): array
    {
        return [
            "Reg_number"=>"Car Registration number is required and must be an integer",
            "Brand"=>"Brand is required and must not be longer than 255 characters",
            "Model"=>"Model is required and must not be longer than 255 characters"
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|max:255',
            'car'=>'integer'
            //
        ];
    }
}
