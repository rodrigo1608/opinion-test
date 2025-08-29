@extends('layouts.app')
@section('title', 'Bairros com mais de um CEP')

@section('content')

    <div class="flex flex-col h-screen items-center justify-start py-8">

        <div class="max-w-lg md:max-w-4xl p-8 bg-white w-full">

            <div class="relative overflow-x-auto max-h-96 overflow-y-auto">
                <table class="w-full text-xs text-left rtl:text-right text-gray-500">
                    <caption class="p-5 text-xl font-bold text-left  text-gray-500 bg-white">
                        Bairros com mais de um CEP
                    </caption>
                    <thead class="text-xs text-gray-500 uppercase bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Bairros
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Contagem de CEP
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($neighborhoods as $neighborhood)
                            <tr class="bg-white even:bg-gray-50 hover:bg-gray-200 transition-colors">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $neighborhood->neighborhood }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ $neighborhood->count }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-8 flex flex-col md:flex-row gap-4 md:items-center justify-between text-sm">

                <a href="{{ route('dashboard') }}"
                    class="justify-center items-center md:justify-start my-4 flex gap-2 text-sm text-gray-500 text-purple-600 hover:underline">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                    </svg>

                    Voltar para lista de usuários
                </a>


                <x-forms.button type="button" onclick="window.location.href='{{ route('user.create') }}'"
                    class="flex gap-2 items-center justify-center text-xs">
                    <span>Novo Usuário</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="size-5 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                </x-forms.button>


            </div>
        </div>
    </div>
@endsection
