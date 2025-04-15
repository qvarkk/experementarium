<?php

namespace App\Http\Requests\LabAction;

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
            'name' => ['required', 'unique:lab_actions,name', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Название необходимо для заполнения',
            'name.unique' => 'Действие с таким названием уже существует',
            'name.string' => 'Название должно быть строкой',
            'name.max' => 'Длина названия не должна превышать 255 символов',
        ];
    }
}
