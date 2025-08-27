@extends('layouts.app')
@section('title', 'Welcome Opinion Box')

@section('content')


    <div class="main-background h-screen flex items-center justify-center">

        <div class="w-full max-w-4xl p-4 md:grid md:grid-cols-2 gap-8">

            <div class="h-24 md:h-auto flex  items-center justify-center">
                <img src="https://www.opinionbox.com/wp-content/themes/institucional/assets/img/opinionbox_logo.svg"
                    alt="Logo Opinion Box" class="h-16">
            </div>

            <div class="p-8 bg-gray-50">
                <h2 class="text-2xl text-gray-500 font-medium mb-6 tracking-widest">Faça seu Login</h2>
                <form>
                    <div class="mb-4">
                        <label for="name" class="block text-xs font-medium text-gray-400">Nome</label>
                        <input type="text" id="name" name="name"
                            class="mt-1 block w-full px-3 py-2  bg-gray-100 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                    </div>

                    <div class="mb-6">
                        <label for="cpf" class="block text-xs font-medium text-gray-400">CPF</label>
                        <input type="text" id="cpf" name="cpf"
                            class="mt-1 block w-full px-3 py-2  bg-gray-100 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="cursor-pointer py-2 px-4 border border-transparent rounded-full uppercase text-sm font-medium text-white main-text-color bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            Entrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
