<?php

namespace App\Http\Requests\LabStep;

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
            'step_number' => ['integer', 'min:1', 'max:100'],
            'instructions' => ['string', 'max:1024'],
            'actions_json' => ['json'],
        ];
    }

    public function messages(): array
    {
        return [
            'step_number.integer' => 'Номер шага должен быть целым числом',
            'step_number.min' => 'Номер шага не может быть меньше 1',
            'step_number.max' => 'Максимальное количество шагов 100',
            'instructions.string' => 'Описание шага должно быть строкой',
            'instructions.max' => 'Длина описания шага не должно превышать 1024 символа',
            'actions_json.json' => 'Действия имеют неправильный формат (JSON)',
        ];
    }
}
