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
            'reagents' => ['array'],
            'reagents.*' => ['array'],
            'reagents.*.id' => ['required', 'integer', 'exists:reagents,id'],
            'reagents.*.quantity' => ['required', 'integer', 'min:1', 'max:100'],
            'equipment' => ['array'],
            'equipment.*' => ['array'],
            'equipment.*.id' => ['required', 'integer', 'exists:equipment,id'],
            'equipment.*.quantity' => ['required', 'integer', 'min:1', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            // Title messages
            'title.required' => 'Название необходимо для заполнения',
            'title.unique' => 'Лабораторная работа с таким названием уже существует',
            'title.string' => 'Название должно быть строкой',
            'title.max' => 'Длина названия не должна превышать 255 символов',

            // Purpose messages
            'purpose.required' => 'Цель работы необходима для заполнения',
            'purpose.string' => 'Цель работы должна быть строкой',
            'purpose.max' => 'Длина цели работы не должна превышать 1024 символов',

            // Safety rules messages
            'safety_rules.required' => 'Правила безопасности необходимы для заполнения',
            'safety_rules.string' => 'Правила безопасности должны быть строкой',
            'safety_rules.max' => 'Длина правил безопасности не должна превышать 2048 символов',

            // Theoretical basis messages
            'theoretical_basis.required' => 'Теория необходима для заполнения',
            'theoretical_basis.string' => 'Теория должна быть строкой',
            'theoretical_basis.max' => 'Длина теории не должна превышать 4096 символов',

            // Reagents messages
            'reagents.array' => 'Реагенты должны быть представлены массивом',
            'reagents.*.array' => 'Каждый реагент должен быть представлен объектом',
            'reagents.*.id.required' => 'ID реагента обязательно для заполнения',
            'reagents.*.id.integer' => 'ID реагента должен быть целым числом',
            'reagents.*.id.exists' => 'Указанный реагент не существует в базе',
            'reagents.*.quantity.required' => 'Количество реагента обязательно для заполнения',
            'reagents.*.quantity.integer' => 'Количество реагента должно быть целым числом',
            'reagents.*.quantity.min' => 'Минимальное количество реагента - 1',
            'reagents.*.quantity.max' => 'Максимальное количество реагента - 100',

            // Equipment messages
            'equipment.array' => 'Оборудование должно быть представлено массивом',
            'equipment.*.array' => 'Каждая единица оборудования должна быть представлен объектом',
            'equipment.*.id.required' => 'ID оборудования обязательно для заполнения',
            'equipment.*.id.integer' => 'ID оборудования должен быть целым числом',
            'equipment.*.id.exists' => 'Указанное оборудование не существует в базе',
            'equipment.*.quantity.required' => 'Количество оборудования обязательно для заполнения',
            'equipment.*.quantity.integer' => 'Количество оборудования должно быть целым числом',
            'equipment.*.quantity.min' => 'Минимальное количество оборудования - 1',
            'equipment.*.quantity.max' => 'Максимальное количество оборудования - 100',
        ];
    }
}
