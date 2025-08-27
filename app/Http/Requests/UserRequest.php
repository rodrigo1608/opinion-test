<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $userID = $this->route('user');

        $isUpdateRequest = $this->method() === 'PATCH' || $this->method() === 'PUT';

        $nullAbleOrRequired = $isUpdateRequest ? 'nullable' : 'required';

        $baseRules = [
            'name' => [$nullAbleOrRequired, 'string', 'max:30'],
            'email' => [$nullAbleOrRequired, 'email', Rule::unique('users', 'email')->ignore($userID)],
            'password' => [$nullAbleOrRequired, 'password']
        ];

        return $baseRules;
    }
}
