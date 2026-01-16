<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    public function index()
    {
        return Projet::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string',
            'type' => 'required|string',
            'lien' => 'required|string',
            'date_hebergement' => 'required|date',
            'description' => 'required|string',
            'image' => 'nullable|string',
        ]);

        $projet = Projet::create($validated);
        return response()->json($projet, 201);
    }

    public function destroy($id)
    {
        Projet::findOrFail($id)->delete();
        return response()->json(['message' => 'Projet supprimé']);
    }
}
