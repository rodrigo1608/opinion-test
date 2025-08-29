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
        $users = User::all();
        return view('dashboard', compact('users'));
    }

    // Você pode adicionar outros métodos aqui, como 'show', 'edit', etc.
}