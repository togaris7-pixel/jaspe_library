<?php

use Illuminate\Http\Request;
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
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


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






