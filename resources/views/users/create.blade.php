@extends('layouts.app')
@section('title', 'Create User')

@section('content')

    <h1 class="">Criar usuário</h1>

    <form method="POST" action="{{ route('user.store') }}"
        class="flex flex-col max-w-80 bg-gray-300 gap-4 px-4 py-8 rounded-md">
        {{--  --}}
        @csrf

        <div class="flex flex-col">
            <label for="name" class="text-xs text-gray-500">Nome</label>
            <input type="text" id="name" name="name" class="border rounded-md border-gray-500">
        </div>

        <div class="flex flex-col">
            <label for="email" class="text-xs text-gray-500">Email</label>
            <input type="email" id="email" name="email" class="border rounded-md border-gray-500">
        </div>

        <div class="flex flex-col">
            <label for="password" class="text-xs text-gray-500">Password</label>
            <input type="password" id="password" name="password" class="border rounded-md border-gray-500">
        </div>

        <button type="submit"
            class="cursor-pointer bg-gray-400 rounded-md py-2 px-4 text-sm   mt-8 self-end">Criar</button>

    </form>
@endsection
