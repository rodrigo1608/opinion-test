<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\Cpf; 

class UserRequest extends FormRequest
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

        $isUpdateRequest = $this->method() === 'PATCH' || $this->method() === 'PUT';

        $nullAbleOrRequired = $isUpdateRequest ? 'nullable' : 'required';

        $baseRules = [
            'name' => [$nullAbleOrRequired, 'string','min:3', 'max:30'],
            'cpf' => [$nullAbleOrRequired, new Cpf],             
        ];

        return $baseRules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo Nome Completo é obrigatório.',
            'name.string' => 'O campo Nome Completo deve ser um texto.',
            'name.min' => 'O campo Nome Completo precisa ter no mínimo :min caracteres.',
            'name.max' => 'O campo Nome Completo deve ter no máximo :max caracteres.',
            'cpf.required' => 'O campo CPF é obrigatório.',
        ];
    }
}
