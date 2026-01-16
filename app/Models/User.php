<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'email', 'password'];

    public function stagiaire()
    {
        return $this->hasOne(Stagiaire::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
    public function index()
    {
        return \App\Models\User::all();
    }

    
}

