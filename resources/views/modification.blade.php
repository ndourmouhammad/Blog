<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à jour d'un article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            /* Couleur de fond */
        }

        .container {
            background-color: #fff;
            /* Couleur de fond du conteneur */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            /* Ombre légère */
            margin-top: 50px;
        }

        .btn-primary {
            color: white;
            background: orange;
            /* Orange pour le bouton "Modifier" */
            border: orange;
        }

        .btn-primary:hover {
            background: darkorange;
            border: darkorange;
        }

        .btn-secondary {
            color: white;
            background: red;
            /* Rouge pour le bouton "Annuler" */
            border: red;
        }

        .btn-secondary:hover {
            background: darkred;
            border: darkred;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mb-4">Mise à jour de l'article</h1>
        <form action="/modifier/traitement" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $article->id }}">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom de l'article</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $article->nom }}"
                    required>
                <div class="invalid-feedback">Veuillez entrer le nom de l'article.</div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image"
                    value="{{ $article->url_image }}">
                <div class="invalid-feedback">Veuillez sélectionner une image.</div>
                <!-- Affichage de l'image actuelle -->
                @if ($article->url_image)
                    <div class="mt-2">
                        <img src="{{ Storage::url('public/blog/' . $article->url_image) }}" alt="Image actuelle"
                            width="100">
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5" required>{{ $article->description }}</textarea>
                <div class="invalid-feedback">Veuillez entrer une description de l'article.</div>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Modifier</button>
                <a href="{{ route('accueil') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>