<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Aqui você pode buscar os usuários para a página index
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {

        DB::beginTransaction();

        try {

            $user = User::create($request->validated());

            DB::commit();

            return redirect()->route('dashboard')->with('success', 'Usuário cadastrado com sucesso!');
        } catch (Throwable $e) {

            DB::rollBack();

            return redirect()->back()->with('error', 'Erro ao cadastrar o usuário. Por favor, tente novamente.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {

        return view('users/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {

        DB::beginTransaction();

        try {
            $validatedData = $request->validated();

            $user->update($validatedData);

            DB::commit();

            return redirect()->route('dashboard')->with('success', 'Usuário atualizado com sucesso!');
        } catch (Throwable $e) {

            DB::rollBack();

            return redirect()->back()->with('error', 'Erro ao cadastrar o usuário. Por favor, tente novamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('dashboard')->with('success', 'Usuário excluído com sucesso!');
    }
}
