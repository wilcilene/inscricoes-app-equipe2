<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Edital;

class EditalController extends Controller
{
    public function create()
    {
        return view('edital.cadastroed');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'              => 'required|string|max:255',
            'descricao'         => 'nullable|string',
            'data_inicio_inscr' => 'required|date',
            'data_fim_inscr'    => 'required|date|after_or_equal:data_inicio_inscr',
            'data_inicio_rev'   => 'nullable|date',
            'data_fim_rev'      => 'nullable|date|after_or_equal:data_inicio_rev',
        ]);

        Edital::create($request->only([
            'nome',
            'descricao',
            'data_inicio_inscr',
            'data_fim_inscr',
            'data_inicio_rev',
            'data_fim_rev',
        ]));

        return redirect()->route('edital.store')
                         ->with('sucesso', 'Edital cadastrado com sucesso!');
    }
}