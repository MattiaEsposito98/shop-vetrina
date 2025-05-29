<?php

namespace App\Http\Controllers;

use App\Models\Prodotto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdottoController extends Controller
{
    /**
     * Mostra tutti i prodotti dell'utente loggato.
     */
    public function index()
    {
        $user = Auth::user();

        if (!$user->attivo) {
            return response()->json(['errore' => 'Utente non attivo'], 403);
        }

        $prodotti = Prodotto::where('user_id', $user->id)->get();
        return response()->json($prodotti);
    }

    /**
     * Crea un nuovo prodotto per l'utente loggato.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if (!$user->attivo) {
            return response()->json(['errore' => 'Utente non attivo'], 403);
        }

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descrizione' => 'nullable|string',
            'prezzo' => 'required|numeric|min:0',
            'immagine' => 'nullable|string',
        ]);

        $validated['user_id'] = $user->id;

        $prodotto = Prodotto::create($validated);
        return response()->json($prodotto, 201);
    }

    /**
     * Mostra un singolo prodotto dell'utente.
     */
    public function show(Prodotto $prodotto)
    {
        $user = Auth::user();

        if ($prodotto->user_id !== $user->id) {
            return response()->json(['errore' => 'Non autorizzato'], 403);
        }

        return response()->json($prodotto);
    }

    /**
     * Aggiorna un prodotto dell'utente.
     */
    public function update(Request $request, Prodotto $prodotto)
    {
        $user = Auth::user();

        if ($prodotto->user_id !== $user->id) {
            return response()->json(['errore' => 'Non autorizzato'], 403);
        }

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
     * Elimina un prodotto dell'utente.
     */
    public function destroy(Prodotto $prodotto)
    {
        $user = Auth::user();

        if ($prodotto->user_id !== $user->id) {
            return response()->json(['errore' => 'Non autorizzato'], 403);
        }

        $prodotto->delete();
        return response()->json(null, 204);
    }
}
