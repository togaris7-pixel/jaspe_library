<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        return Document::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string',
            'type_stage' => 'required|string',
            'fichier' => 'required|file',
            'date_depot' => 'required|string',
            'periode'=> 'required|string',
            'theme'=> 'required|string',
            'image'=> 'required|string',
            'stagiaire_id'=> 'required|string',

            ]);  

        $document = Document::create($validated);
        return response()->json($document, 201);
    }

    // afficher, trier, supprimer, modifier...

}
