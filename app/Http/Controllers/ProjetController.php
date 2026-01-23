<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    public function index()
    {
        
        return view('projets.create');
    }


    public function create()
    {
        return view('projets.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string',
            'type' => 'required|string',
            'lien' => 'required|string',
            'date_hebergement' => 'required|date',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('projets', 'public');
        }
        $validated['user_id'] = Auth::id();

        $projet = Projet::create($validated);
        return redirect()->route('projets.index')
            ->with('success', 'Projet ajouté avec succès');
    }


     

    public function destroy($id)
    {
        Projet::findOrFail($id)->delete();
        return response()->json(['message' => 'Projet supprimé']);
    }
}
