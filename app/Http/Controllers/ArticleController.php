<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    // Afficher la liste des articles

    public function index()
    {
        $mes_articles = Article::paginate(3);
        return view('accueil', ['mes_articles' => $mes_articles]);
    }

    // Afficher les détails d'un article
    public function afficher_details($id)
    {
        // Récupérer l'article correspondant à l'ID
        $article = Article::findOrFail($id);

        // Passer les détails de l'article à la vue
        return view('detail', compact('article'));
    }
}
