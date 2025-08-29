<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the users on the dashboard.
     */
   public function index(Request $request)
    {
        // Inicia a query builder para o modelo User
        $query = User::query();

        // Filtra por nome se o campo 'name' estiver preenchido na requisição
        $query->when($request->filled('name'), function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->input('name') . '%');
        });

        // Filtra por CPF se o campo 'cpf' estiver preenchido na requisição
        $query->when($request->filled('cpf'), function ($q) use ($request) {
            $q->where('cpf', 'like', '%' . $request->input('cpf') . '%');
        });

        // Executa a query e obtém os usuários
        $users = $query->get();

        return view('dashboard', compact('users'));   }

}