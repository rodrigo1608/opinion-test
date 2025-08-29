@extends('layouts.app')
@section('title', 'Lista de Usuários')

@section('content')

    <div class="flex flex-col h-screen main-background items-center justify-start py-8">
        <div
            class="md:h-auto md:max-w-4xl flex md:flex-row flex-col gap-4 md:gap-0 justify-start items-start w-full md:items-end md:justify-between md:mb-8">

            <img class="h-6 md:h-12 self-center"
                src="https://www.opinionbox.com/wp-content/themes/institucional/assets/img/opinionbox_logo.svg"
                alt="Logo Opinion Box">

            <h2 class="text-xs ml-8 md:text-xl my-2 md:m-0 text-white text-center">
                Usuários Cadastrados
            </h2>
        </div>

        <div class="max-w-lg md:max-w-4xl p-8 bg-white w-full">

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="flex justify-end mb-4">
                <a href="{{ route('users.create') }}" class="bg-purple-600 text-white py-2 px-4 rounded-md hover:bg-purple-700 transition-colors duration-300">
                    Cadastrar Novo Usuário
                </a>
            </div>

            @if ($users->isEmpty())
                <p class="text-center text-gray-500">Nenhum usuário cadastrado ainda.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <th class="py-3 px-6">Nome</th>
                                <th class="py-3 px-6">CPF</th>
                                <th class="py-3 px-6">Endereço</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors duration-150">
                                    <td class="py-4 px-6 text-sm text-gray-900">{{ $user->name }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-900">{{ $user->cpf }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-900">
                                        @if ($user->address)
                                            {{ $user->address->street }}, {{ $user->address->number }}<br>
                                            {{ $user->address->city }} - {{ $user->address->state }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>
@endsection
