<?php

namespace App\Http\Controllers;

use App\Models\Prodotto;
use Illuminate\Http\Request;

class ProdottoController extends Controller
{
    /**
     * Mostra tutti i prodotti.
     */
    public function index()
    {
        return Prodotto::all();
    }

    /**
     * Crea un nuovo prodotto.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descrizione' => 'nullable|string',
            'prezzo' => 'required|numeric|min:0',
            'immagine' => 'nullable|string',
        ]);

        $prodotto = Prodotto::create($validated);
        return response()->json($prodotto, 201);
    }

    /**
     * Mostra un singolo prodotto.
     */
    public function show(Prodotto $prodotto)
    {
        return response()->json($prodotto);
    }

    /**
     * Aggiorna un prodotto.
     */
    public function update(Request $request, Prodotto $prodotto)
    {
        $validated = $request->validate([
            'nome' => 'sometimes|string|max:255',
            'descrizione' => 'nullable|string',
            'prezzo' => 'sometimes|numeric|min:0',
            'immagine' => 'nullable|string',
        ]);

        $prodotto->update($validated);
        return response()->json($prodotto);
    }

    /**
     * Elimina un prodotto.
     */
    public function destroy(Prodotto $prodotto)
    {
        $prodotto->delete();
        return response()->json(null, 204);
    }
}
