<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'accueil'])->name('accueil');

Route::get('/articles/{id}', [ArticleController::class, 'afficher_details'])->name('articles.details');

//Ajout
Route::get('article/creer', [ArticleController::class, 'ajouter_article'])->name('article.ajoute');
Route::post('article', [ArticleController::class, 'ajouter'])->name('article.enregistre');

//Modification
Route::get('/modifier_article/{id}', [ArticleController::class, 'modifier_article'])->name('articles.modifie');
Route::post('/modifier/traitement', [ArticleController::class, 'modifier_traitement']);

// Suppression
Route::get('/supprimer_article/{id}', [ArticleController::class, 'supprimer_article'])->name('articles.supprime');
