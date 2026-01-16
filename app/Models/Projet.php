<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre', 'type', 'lien', 'date_hebergement', 'description', 'image'
    ];

    // Exemple de méthodes
    public function afficher()
    {
        return $this->all();
    }

    public function trier()
    {
        return $this->orderBy('date_hebergement', 'desc')->get();
    }
}

