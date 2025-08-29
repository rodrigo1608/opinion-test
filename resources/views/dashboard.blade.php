@extends('layouts.app')
@section('title', 'Lista de Usuários')

@section('content')
    <div class="flex flex-col h-screen  items-center justify-start py-8">
        {{-- <div
            class="md:h-auto md:max-w-4xl flex md:flex-row flex-col gap-4 md:gap-0 justify-start items-start w-full md:items-end md:justify-between md:mb-8">

            <img class="h-6 md:h-12 self-center"
                src="https://www.opinionbox.com/wp-content/themes/institucional/assets/img/opinionbox_logo.svg"
                alt="Logo Opinion Box">

            <h2 class="text-xs ml-8 md:text-xl my-2 md:m-0 text-white text-center">
                Usuários Cadastrados
            </h2>

        </div> --}}


        <div class="max-w-lg md:max-w-4xl p-8 bg-white w-full">

            @if (session('success'))
                <div id="toast-success"
                    class="fixed bottom-5 right-5 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                        <svg class="w-5 h-5" aria-hidden="true"
                            xmlns="[http://www.w3.org/2000/svg](http://www.w3.org/2000/svg)" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                        data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true"
                            xmlns="[http://www.w3.org/2000/svg](http://www.w3.org/2000/svg)" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const toast = document.getElementById('toast-success');
                        if (toast) {
                            setTimeout(() => {
                                toast.style.transition = 'opacity 0.5s ease-in-out';
                                toast.style.opacity = '0';
                                setTimeout(() => toast.remove(), 500);
                            }, 5000); // 5 seconds
                        }
                    });
                </script>
            @endif

            <form action="{{ route('dashboard') }}" method="GET"
                class="flex flex-col md:items-center md:flex-row gap-4 mb-4">
                <div class="flex-grow box-border">
                    <x-forms.input label="Filtrar por nome" id="filter-name" name="name" type="text"
                        placeholder="Ex: João da Silva" value="{{ request('name') }}" />
                </div>
                <div class="flex-grow box-border">
                    <x-forms.input label="Filtrar por CPF" id="filter-cpf" name="cpf" type="text"
                        placeholder="Ex: 000.000.000-00" value="{{ request('cpf') }}" />
                </div>


                <div class="flex items-end">
                    <x-forms.button type="submit" class="flex gap-2 items-center justify-center text-xs">
                        <span>Filtrar</span>
                        <svg xmlns="[http://www.w3.org/2000/svg](http://www.w3.org/2000/svg)" viewBox="0 0 20 20"
                            fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M9 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11ZM2 9a7 7 0 1 1 12.452 4.095l3.753 3.754a.75.75 0 1 1-1.06 1.06l-3.754-3.753A7 7 0 0 1 2 9Z"
                                clip-rule="evenodd" />
                        </svg>
                    </x-forms.button>
                </div>


            </form>

            @if ($users->isEmpty())
                <p class="text-center text-gray-500">Nenhum usuário cadastrado ainda.</p>
            @else
                <div class="overflow-x-auto overflow-y-auto max-h-96">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <th class="py-3 px-6">Nome</th>
                                <th class="py-3 px-6">CPF</th>
                                <th class="py-3 px-6">CEP</th>
                                <th class="py-3 px-6">Rua</th>
                                <th class="py-3 px-6">Bairro</th>
                                <th class="py-3 px-6">Cidade</th>
                                <th class="py-3 px-6">Estado</th>
                                <th class="py-3 px-6">Número</th>
                                <th class="py-3 px-6">País</th>
                                <th class="py-3 px-6">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors duration-150">
                                    <td class="py-4 px-6 text-sm text-gray-900">{{ $user->name }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-900">{{ $user->cpf }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-900">{{ $user->cep }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-900">{{ $user->street }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-900">{{ $user->neighborhood }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-900">{{ $user->city }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-900">{{ $user->state }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-900">{{ $user->number }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-900">{{ $user->country }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-900">
                                        <div class="flex items-center space-x-4">
                                            <!-- Botão de Editar -->
                                            <a href="{{ route('user.edit', $user->id) }}"
                                                class="text-blue-600 hover:text-blue-900">
                                                <svg xmlns="[http://www.w3.org/2000/svg](http://www.w3.org/2000/svg)"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14.25v2.25a2.25 2.25 0 0 1-2.25 2.25H6.75a2.25 2.25 0 0 1-2.25-2.25V7.5a2.25 2.25 0 0 1 2.25-2.25H10.5" />
                                                </svg>
                                            </a>
                                            <!-- Botão de Excluir -->
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                class="inline-block"
                                                onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 cursor-pointer">
                                                    <svg xmlns="[http://www.w3.org/2000/svg](http://www.w3.org/2000/svg)"
                                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <div
                class="mt-8 flex flex-col md:flex-row gap-4 md:items-center gap-8 md:gap-0 justify-center md:justify-between text-sm ">
                <a href="#" class="text-sm text-purple-600 hover:underline">Bairros com mais de um CEP</a>

                <a href="#" class="text-sm text-purple-600 hover:underline">Quantidade de CEP por Bairro</a>

                <x-forms.button type="button" onclick="window.location.href='{{ route('user.create') }}'"
                    class="flex gap-2 items-center justify-center text-xs">
                    <span>Novo Usuário</span>
                    <svg xmlns="[http://www.w3.org/2000/svg](http://www.w3.org/2000/svg)" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                </x-forms.button>
            </div>


        </div>


    </div>


@endsection
