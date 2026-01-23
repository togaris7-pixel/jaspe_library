<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    // Colonnes autorisées pour l'insertion en masse
    protected $fillable = [
        'titre',
        'type_stage',
        'fichier',
        'date_depot',
        'periode',
        'theme',
        'image',
        'stagiaire_id'
    ];

    // Relation : un document appartient à un stagiaire
    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class);
    }

    //  Méthodes métier (optionnelles, inspirées de ton diagramme UML)
    public function afficher()
    {
        return $this->all();
    }

    public function trier()
    {
        return $this->orderBy('date_depot', 'desc')->get();
    }

    public function supprimer()
    {
        return $this->delete();
    }

    public function modifier(array $data)
    {
        return $this->update($data);
    }
}

