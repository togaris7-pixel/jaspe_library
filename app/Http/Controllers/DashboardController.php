<?php

namespace App\Http\Controllers;
use App\Models\Projet;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $projets = Projet::all();

        return view('projets.index', compact('user', 'projets'));
    }


    public function dashboard()
{
    return view('dashboard', [
        'documentsCount' => Projet::count(),
        'downloadsCount' => Auth::user()->count(),
        'memoiresCount' => Auth::user()->count(),
        'rapportsCount' => Auth::user()->count(),
    ]);
}

}
