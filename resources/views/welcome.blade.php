@extends('layouts.app')
@section('title', 'Welcome Opinion Box')

@section('content')

    <div class="main-background h-screen flex items-center justify-center">

        <div class="w-full max-w-96 md:max-w-4xl p-4 md:grid md:grid-cols-2 gap-8">

            <div class="h-24 md:h-auto flex items-center justify-center mb-8 md:mb-0">
                <img src="https://www.opinionbox.com/wp-content/themes/institucional/assets/img/opinionbox_logo.svg"
                    alt="Logo Opinion Box" class="h-16">
            </div>

            <div class="p-8 bg-gray-50 ">

                <h2 class="text-2xl text-gray-500 font-medium mb-6 tracking-widest">Faça seu Login</h2>

                <form class="flex flex-col gap-6 ">
                    <x-forms.input label="CPF" id="cpf" name="cpf" type="text" />

                    <div class="flex items-center md:items-end flex-col justify-center  md:justify-end">

                        <x-forms.button type="submit" class="flex gap-2 items-center ">

                            <span>Entrar</span>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>

                        </x-forms.button>

                    </div>

                </form>
                <a href="{{ route('user.create') }}"
                    class="justify-center md:justify-start my-4   flex gap-2 text-sm text-gray-500 text-purple-600 hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 text-purple-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    Cadastre-se
                </a>
            </div>
        </div>
    </div>
