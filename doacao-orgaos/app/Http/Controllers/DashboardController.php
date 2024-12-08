<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hospital;
use App\Models\Orgao;


class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Obtém o usuário autenticado

        // Verificando a role do usuário
        if ($user->role === 'admin') {
            $doadores = User::where('role', 'doador')->get();
            $receptores = User::where('role', 'receptor')->get();
            $hospitais = Hospital::all();
            $orgaos = Orgao::all();
        
            return view('admin.dashboard', compact('doadores', 'receptores', 'hospitais', 'orgaos'));
            //return view('admin.dashboard'); // Página de administrador
        } 
        
        
        elseif ($user->role === 'doador') {
            $orgaos = Orgao::all();
            return view('doador.dashboard', compact('orgaos') ); // Página de doador
        } 
        
        
        elseif ($user->role === 'receptor') {
            $orgaos = Orgao::where('patient', $user->name)->get();

            return view('receptor.dashboard', compact('orgaos'));
            //return view('receptor.dashboard'); // Página de receptor
        }

        return redirect('/erro'); // Redireciona caso a role não seja válida
    }
}
