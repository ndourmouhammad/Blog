<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'accueil'])->name('accueil');

Route::get('/articles/{id}', [ArticleController::class, 'afficher_details'])->name('articles.details');

//Ajout
Route::get('article/creer', [ArticleController::class, 'ajouter_article'])->name('article.ajoute');
Route::post('article', [ArticleController::class, 'ajouter'])->name('article.enregistre');
