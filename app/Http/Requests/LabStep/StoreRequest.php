<?php

namespace App\Http\Requests\LabStep;

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
            'lab_id' => ['required', 'exists:labs,id'],
            'step_number' => ['required', 'integer', 'min:1', 'max:100'],
            'instructions' => ['required', 'string', 'max:1024'],
            'actions_json' => ['required', 'json'],
        ];
    }

    public function messages(): array
    {
        return [
            'lab_id.required' => 'Необходимо выбрать лабораторную работу',
            'lab_id.exists' => 'Не удалось найти эту лабораторную работу',
            'step_number.required' => 'Номер шага обязателен для заполнения',
            'step_number.integer' => 'Номер шага должен быть целым числом',
            'step_number.min' => 'Номер шага не может быть меньше 1',
            'step_number.max' => 'Максимальное количество шагов 100',
            'instructions.required' => 'Описание шага обязательно к заполнению',
            'instructions.string' => 'Описание шага должно быть строкой',
            'instructions.max' => 'Длина описания шага не должно превышать 1024 символа',
            'actions_json.required' => 'Действия необходимы для заполнения',
            'actions_json.json' => 'Действия имеют неправильный формат (JSON)',
        ];
    }
}
