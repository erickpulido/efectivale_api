<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequestRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits_between:5,10',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El :attribute es obligatorio',
            'email' => 'El :attribute no es de tipo email',
            'phone' => 'El :attribute no es de tipo teléfono',
        ];
    }
}
