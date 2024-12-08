<?php

namespace App\Http\Controllers;

use App\Models\Orgao;
use Illuminate\Http\Request;

class OrgaoController extends Controller
{
    // Listagem dos órgãos
 

    // Cadastro de um novo órgão
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'patient' => 'required|string|max:255',
        ]);

        Orgao::create($validated);

        return redirect()->route('admin.dashboard')->with('success', '');
    }


}
