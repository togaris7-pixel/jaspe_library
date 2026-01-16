<?php
use App\Http\Controllers\StagiaireController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProjetController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Toutes les routes pour tes contrôleurs
| Accessible via /api/... (ex: /api/users)
|--------------------------------------------------------------------------
*/

//Users
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);

//Admins
Route::get('/admins', [AdminController::class, 'index']);
Route::post('/admins/gerer-stagiaires', [AdminController::class, 'gererStagiaires']);

//Stagiaires
Route::get('/stagiaires', [StagiaireController::class, 'index']);
Route::post('/stagiaires', [StagiaireController::class, 'store']);
Route::get('/stagiaires/{id}/documents', [StagiaireController::class, 'consulterDocuments']);
Route::post('/stagiaires/{id}/documents', [StagiaireController::class, 'deposerDocument']);

//Documents
Route::get('/documents', [DocumentController::class, 'index']);
Route::post('/documents', [DocumentController::class, 'store']);
Route::put('/documents/{id}', [DocumentController::class, 'update']);
Route::delete('/documents/{id}', [DocumentController::class, 'destroy']);

//Projets
Route::get('/projets', [ProjetController::class, 'index']);
Route::post('/projets', [ProjetController::class, 'store']);
Route::put('/projets/{id}', [ProjetController::class, 'update']);
Route::delete('/projets/{id}', [ProjetController::class, 'destroy']);
