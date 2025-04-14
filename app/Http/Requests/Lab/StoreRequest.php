<?php

namespace App\Http\Requests\Lab;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => ['required', 'unique:labs,title', 'string', 'max:255'],
            'purpose' => ['required', 'string', 'max:1024'],
            'safety_rules' => ['required', 'string', 'max:2048'],
            'theoretical_basis' => ['required', 'string', 'max:4096'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Название необходимо для заполнения',
            'title.unique' => 'Лабораторная работа с таким названием уже существует',
            'title.string' => 'Название должно быть строкой',
            'title.max' => 'Длина названия не должна превышать 255 символов',
            'purpose.required' => 'Цель работы необходима для заполнения',
            'purpose.string' => 'Цель работы должна быть строкой',
            'purpose.max' => 'Длина цели работы не должна превышать 1024 символов',
            'safety_rules.required' => 'Правила безопасности необходимы для заполнения',
            'safety_rules.string' => 'Правила безопасности должны быть строкой',
            'safety_rules.max' => 'Длина правил безопасности не должна превышать 2048 символов',
            'theoretical_basis.required' => 'Теория необходима для заполнения',
            'theoretical_basis.string' => 'Теория должна быть строкой',
            'theoretical_basis.max' => 'Длина теории не должна превышать 4096 символов',
        ];
    }
}
