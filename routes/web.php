<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\ProjetController;

use App\Http\Controllers\DocumentController;

use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

# Language management
Route::get('lang/home', [LangController::class, 'index']);
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');


# Dashboard management


Route::get('/dashboard', 
    [DashboardController::class, 'dashboard']
)->middleware(['auth', 'verified'])->name('dashboard');



# Stagiaire projets
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/projets/index', [DashboardController::class, 'index'])
        ->name('projets.index');

    // Projets
    Route::get('/projets/create', [ProjetController::class, 'create'])
        ->name('projets.create');

    Route::post('/projets/store', [ProjetController::class, 'store'])
        ->name('projets.store');  
});


# Stagiaires documents

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/documents/index', [DocumentController::class, 'index'])
        ->name('documents.index');

    // Projets
    Route::get('/documents/create', [DocumentController::class, 'create'])
        ->name('documents.create');

    Route::post('/documents/store', [DocumentController::class, 'store'])
        ->name('documents.store');  
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});


