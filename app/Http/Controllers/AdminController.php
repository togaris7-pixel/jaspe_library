<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return Admin::with('user')->get();
    }

    public function gererStagiaires()
    {
        // logique pour gérer les stagiaires
    }
}
