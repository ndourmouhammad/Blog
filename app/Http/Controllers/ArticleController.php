<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    // Afficher la liste des articles

    public function accueil()
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

    // Afficher le formulaire
    public function ajouter_article()
    {
        return view('ajout');
    }

    // enregistrement des données
    public function ajouter(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required',
            'image' => 'required|max:2048',
            'description' => 'required',
        ]);



        // Stocker l'image dans le répertoire storage/app/public/blog
        $chemin_image = $request->file('image')->store('public/blog');

        // Vérifier si le chemin de l'image est bien généré
        if (!$chemin_image) {
            return redirect()->back()->with('error', 'Erreur lors du téléchargement de l\'image.');
        }

        // Récupérer le nom du fichier de l'image à partir du chemin stocké
        $image = basename($chemin_image);

        // Créer un nouvel article
        $article = new Article();
        $article->nom = $request->nom;
        $article->url_image = $image; // Nom du fichier de l'image
        $article->description = $request->description;
        $article->save();

        // Rediriger avec un message de succès

        return redirect()->route('articles.details', ['id' => $article->id])->with('success', 'Article ajouté avec succès.');
    }

    // view pour la modification
    public function modifier_article($id)
    {
        // Récupérer l'article correspondant à l'ID
        $article = Article::find($id);

        // Passer les détails de l'article à la vue
        return view('modification', compact('article'));
    }

    public function modifier_traitement(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required',
            'image' => 'required|max:2048',
            'description' => 'required',
        ]);

        // Stocker l'image dans le répertoire storage/app/public/blog
        $chemin_image = $request->file('image')->store('public/blog');

        // Vérifier si le chemin de l'image est bien généré
        if (!$chemin_image) {
            return redirect()->back()->with('error', 'Erreur lors du téléchargement de l\'image.');
        }

        // Récupérer le nom du fichier de l'image à partir du chemin stocké
        $image = basename($chemin_image);

        // Créer un nouvel article
        $article = Article::findOrFail($request->id);
        $article->nom = $request->nom;
        $article->url_image = $image; // Nom du fichier de l'image
        $article->description = $request->description;
        $article->update();

        return redirect()->route('articles.details', ['id' => $article->id])->with('success', 'Article modifié avec succès.');
    }

    // Supprimer un article
    public function supprimer_article($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect()->route('accueil')->with('success', 'Article supprimé avec succès.');
    }
}
