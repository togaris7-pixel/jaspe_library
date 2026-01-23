<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use App\Models\Document;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    //Lister tous les stagiaires
    public function index()
    {
        return Stagiaire::with('user')->get();
    }

    //Créer un stagiaire
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'filiere' => 'required|string',
            'ecole'   => 'required|string',
        ]);

        $stagiaire = Stagiaire::create($validated);
        return response()->json($stagiaire, 201);
    }

    //Consulter les documents d’un stagiaire
    public function consulterDocuments($id)
    {
        $stagiaire = Stagiaire::with('documents')->findOrFail($id);
        return response()->json($stagiaire->documents);
    }

    //Déposer un document
    public function deposerDocument(Request $request, $id)
    {
        $stagiaire = Stagiaire::findOrFail($id);

        $validated = $request->validate([
            'titre'       => 'required|string',
            'type_stage'  => 'required|string',
            'fichier'     => 'required|file',
            'date_depot'  => 'required|date',
            'periode'     => 'required|string',
            'theme'       => 'required|string',
            'image'       => 'nullable|string',
        ]);

        // Sauvegarde du fichier uploadé
        $path = $request->file('fichier')->store('documents');

        $document = new Document([
            'titre'      => $validated['titre'],
            'type_stage' => $validated['type_stage'],
            'fichier'    => $path,
            'date_depot' => $validated['date_depot'],
            'periode'    => $validated['periode'],
            'theme'      => $validated['theme'],
            'image'      => $validated['image'] ?? null,
        ]);

        $stagiaire->documents()->save($document);

        return response()->json($document, 201);
    }
}
