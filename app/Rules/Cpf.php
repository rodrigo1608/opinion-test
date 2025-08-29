<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Cpf implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Extrai apenas os números do CPF.
        $cpf = preg_replace('/[^0-9]/', '', (string) $value);

        // Verifica se o CPF possui 11 dígitos.
        if (strlen($cpf) !== 11) {
            $fail('O campo :attribute não é um CPF válido.');
            return;
        }

        // Verifica se todos os dígitos são iguais (ex: 111.111.111-11).
        if (preg_match('/^(\d)\1{10}$/', $cpf)) {
            $fail('O campo :attribute não é um CPF válido.');
            return;
        }

        // Essa parte do código calcula o primeiro dígito verificador do CPF.
        // O cálculo segue a seguinte lógica:
        // 1. Cada um dos 9 primeiros dígitos do CPF é multiplicado por um peso que diminui de 10 a 2.
        //    (Exemplo: 1º dígito x 10, 2º dígito x 9, 3º dígito x 8, e assim por diante).
        // 2. Todos os resultados dessas multiplicações são somados.
        // O valor dessa soma é usado para determinar o dígito verificador.

        $soma = 0;
        $multiplicador = 10;
        for ($indice = 0; $indice < 9; $indice++) {
            $soma += $cpf[$indice] * $multiplicador;
            $multiplicador--;
        }

        // Com a soma dos 9 primeiros dígitos, calculamos o resto da divisão por 11.
        $resto = $soma % 11;

        // O primeiro dígito verificador é 0 se o resto for menor que 2 (ou seja, 0 ou 1).
        // Caso contrário, o dígito verificador é o resultado de 11 menos o resto.
        $digito1 = ($resto < 2) ? 0 : 11 - $resto;

        // Se o primeiro dígito verificador for inválido.
        if ($digito1 != $cpf[9]) {
            $fail('O campo :attribute não é um CPF válido.');
            return;
        }

        // Calcula o segundo dígito verificador.
        // Agora o cálculo usa os 10 primeiros dígitos (incluindo o primeiro verificador).
        // O multiplicador começa em 11 e vai até 2.
        $soma = 0;
        $multiplicador = 11;
        for ($indice = 0; $indice < 10; $indice++) {
            $soma += $cpf[$indice] * $multiplicador;
            $multiplicador--;
        }

        $resto = $soma % 11;
        $digito2 = ($resto < 2) ? 0 : 11 - $resto;

        // Se o segundo dígito verificador for inválido.
        if ($digito2 != $cpf[10]) {
            $fail('O campo :attribute não é um CPF válido.');
            return;
        }
    }
}