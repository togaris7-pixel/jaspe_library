<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::latest()->paginate(12);

        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        return view('documents.create');
    }

    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'titre'        => 'required|string',
            'type_stage'   => 'required|string',
            'fichier'      => 'required|file|mimes:pdf,doc,docx',
            'date_depot'   => 'required|date',
            'periode'      => 'required|string',
            'theme'        => 'required|string',
            'image'        => 'nullable|image|max:2048',
            'stagiaire_id' => 'required|integer|exists:users,id',
        ]);


        // Stockage de l'image si fournie
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('documents_image', 'public');
        }

        // Stockage du fichier obligatoire
        if ($request->hasFile('fichier')) {
            $validated['fichier'] = $request->file('fichier')
                ->store('documents_file', 'public');
        }

        // ID de l'utilisateur connecté
        $validated['user_id'] = Auth::id();

        // Création du document
        Document::create($validated);

        // Redirection avec message
        return redirect()->route('documents.index')
            ->with('success', 'Document ajouté avec succès');
    }

}

