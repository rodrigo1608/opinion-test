<?php

namespace App\Http\Requests;

use App\Rules\BrazilianState;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\Cpf;
use Illuminate\Support\Facades\Http;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'cep' => str_replace('-', '', $this->cep),
        ]);
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
            'name' => [$nullAbleOrRequired, 'string', 'min:3', 'max:30'],
            'cpf' => [$nullAbleOrRequired, new Cpf],
            'cep' => [$nullAbleOrRequired, 'string', 'digits:8'],
            'street' => [$nullAbleOrRequired, 'string'],
            'neighborhood' => [$nullAbleOrRequired, 'string'], 
            'city' => [$nullAbleOrRequired, 'string'],
            'state' => [$nullAbleOrRequired, new BrazilianState],
            'number' => [$nullAbleOrRequired, 'string'],
            'country' => [$nullAbleOrRequired, 'string'],
        ];

        return $baseRules;
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            $response = Http::get("https://viacep.com.br/ws/{$this->cep}/json/")->json();

            if (isset($response['erro']) && $response['erro']) {
                $validator->errors()->add('cep', 'O CEP informado é inválido.');
            }
        });
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo Nome Completo é obrigatório.',
            'name.string' => 'O campo Nome Completo deve ser um texto.',
            'name.min' => 'O campo Nome Completo precisa ter no mínimo :min caracteres.',
            'name.max' => 'O campo Nome Completo deve ter no máximo :max caracteres.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cep.required' => 'O campo CEP é obrigatório.',
            'cep.regex' => 'O formato do CEP é inválido.',
            'street.required' => 'O campo Rua é obrigatório.',
            'neighborhood.required' => 'O campo Bairro é obrigatório.',
            'city.required' => 'O campo Cidade é obrigatório.',
            'state.required' => 'O campo Estado é obrigatório.',
            'number.required' => 'O campo Número é obrigatório.',
            'country.required' => 'O campo País é obrigatório.',
        ];
    }
}
