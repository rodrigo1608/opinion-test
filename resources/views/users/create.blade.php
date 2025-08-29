@extends('layouts.app')
@section('title', 'Cadastre-se na Opinion Box')

@section('content')

   <div class="flex flex-col h-screen  main-background items-center justify-center py-8">
    <div
        class="md:h-auto md:max-w-4xl flex md:flex-row flex-col gap-4 md:gap-0 justify-start items-start w-full md:items-end md:justify-between md:mb-8">

        <img class="h-6 md:h-12 self-center"
            src="https://www.opinionbox.com/wp-content/themes/institucional/assets/img/opinionbox_logo.svg"
            alt="Logo Opinion Box">

        <h2 class="text-xs ml-8 md:text-xl my-2 md:m-0 text-white text-center">
            Cadastro de Usuário
        </h2>
    </div>

    <div class="max-w-lg md:max-w-4xl p-8 bg-white ">

        <form class="flex flex-col gap-6" method="POST" action="{{ route('user.store') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Primeira Coluna -->
                <div class="flex flex-col gap-6">

                    <div>
                        <x-forms.input label="Nome Completo" id="name" name="name" type="text"
                            placeholder="Ex: João da Silva" value="{{ old('name') }}" />
                        @error('name')
                            <span class="text-red-500 text-xs ">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <x-forms.input label="CPF" id="cpf" name="cpf" type="text"
                            placeholder="Ex: 000.000.000-00" value="{{ old('cpf') }}" />
                        @error('cpf')
                            <span class="text-red-500 text-xs ">{{ $message }}</span>
                        @enderror
                    </div>

                   <div>
                     <x-forms.input label="CEP" id="cep" name="cep" type="text"
                        placeholder="Ex: 00000-000" value="{{ old('cep') }}" />
                    @error('cep')
                        <span class="text-red-500 text-xs ">{{ $message }}</span>
                    @enderror
                   </div>

                   <div>
                       <x-forms.input label="Bairro" id="neighborhood" name="neighborhood" type="text"
                           placeholder="Ex: Centro" value="{{ old('neighborhood') }}" />
                       @error('neighborhood')
                           <span class="text-red-500 text-xs ">{{ $message }}</span>
                       @enderror
                   </div>
                </div>

                <!-- Segunda Coluna -->
                <div class="flex flex-col gap-6">
                    <div>
                        <x-forms.input label="Rua" id="street" name="street" type="text"
                            value="{{ old('street') }}" />
                        @error('street')
                            <span class="text-red-500 text-xs ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-forms.input label="Cidade" id="city" name="city" type="text"
                            value="{{ old('city') }}" />
                        @error('city')
                            <span class="text-red-500 text-xs ">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <x-forms.input label="País" id="country" name="country" type="text"
                            value="{{ old('country') }}" />
                        @error('country')
                            <span class="text-red-500 text-xs ">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <x-forms.input label="Número" id="number" name="number" type="text"
                                value="{{ old('number') }}" />
                            @error('number')
                                <span class="text-red-500 text-xs ">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <x-forms.input label="Estado" id="state" name="state" type="text"
                                value="{{ old('state') }}" />
                            @error('state')
                                <span class="text-red-500 text-xs ">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>

            <div class="flex flex-col items-center mt-6">

                <x-forms.button type="submit" class="flex gap-2 items-center justify-center">

                    <span>Cadastrar</span>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>

                </x-forms.button>
                <a href="{{ route('welcome') }}"
                    class="justify-center md:justify-start my-4  mt-8  flex gap-2 text-sm text-gray-500 text-purple-600 hover:underline">
                    Já tem conta?
                    Faça login
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                    </svg>
                </a>
            </div>

        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cepInput = document.getElementById('cep');

        cepInput.addEventListener('blur', function() {
            const cep = cepInput.value.replace(/\D/g, ''); // Remove caracteres não numéricos

            if (cep.length === 8) {
                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (!data.erro) {
                            document.getElementById('street').value = data.logradouro;
                            document.getElementById('neighborhood').value = data.bairro;
                            document.getElementById('city').value = data.localidade;
                            document.getElementById('state').value = data.uf;
                            document.getElementById('country').value = 'Brasil';
                        }
                    })
                    .catch(error => console.error('Erro na requisição:', error));
            }
        });
    });
</script>

@endsection