<?php

namespace App\Http\Requests\Reagent;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => ['unique:reagents,name', 'string', 'max:255'],
            'formula' => ['string', 'max:255'],
            'concentration' => ['integer', 'nullable', 'min:0', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'Реагент с таким названием уже существует',
            'name.string' => 'Название должно быть строкой',
            'name.max' => 'Длина названия не должна превышать 255 символов',
            'formula.string' => 'Формула должна быть строкой',
            'formula.max' => 'Длина формулы не должна превышать 255 символов',
            'concentration.integer' => 'Концентрация должна быть целым числом',
            'concentration.min' => 'Концентрация не может быть ниже 0',
            'concentration.max' => 'Концентраяция не может превышать 100',
        ];
    }
}
