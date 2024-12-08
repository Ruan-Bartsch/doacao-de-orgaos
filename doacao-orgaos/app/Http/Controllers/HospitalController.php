<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    // Método para processar o envio do formulário
    public function store(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'name' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
        ]);

        // Criando o hospital no banco de dados
        Hospital::create($validated);

        // Redirecionar de volta para o dashboard com sucesso
        return redirect()->route('admin.dashboard')->with('success', 'Hospital cadastrado com sucesso!');
    }
}

