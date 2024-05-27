<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog - Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
            object-position: center;
        }

        .btn-primary {
            color: white;
            background: blue;
            border: blue;
        }

        .btn-primary:hover {
            background: darkblue;
            border: darkblue;
        }

        .card {
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .category-label {
            background-color: #6c757d;
            /* Gris neutre */
            color: white;
            padding: 0.25em 0.5em;
            border-radius: 0.25em;
            font-size: 0.85em;
        }

        .card-footer {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .card-footer a {
            color: blue;
            font-size: 1.2em;
        }

        .card-footer a:hover {
            color: darkblue;
        }

        .card-footer .edit {
            color: orange;
        }

        .card-footer .edit:hover {
            color: darkorange;
        }

        .card-footer .delete {
            color: red;
        }

        .card-footer .delete:hover {
            color: darkred;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">La liste de mes articles</h1>
        <!-- Bouton pour rediriger vers le formulaire -->
        <div class="d-flex justify-content-center mb-4">
            <a href="" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i> Nouvel article
            </a>
        </div>
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @foreach ($mes_articles as $article)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ $article->url_image }}"
                            alt="Image de l'article">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="category-label">{{ $article->catégorie }}</span>
                            </div>
                            <h5 class="card-title">{{ $article->nom }}</h5>
                            <p class="card-text">{{ Str::limit($article->description, 200) }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <a href="{{ route('articles.details', ['id' => $article->id]) }}" title="Voir détails">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <a href="" title="Modifier"
                                class="edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="" title="Supprimer"
                                class="delete"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Liens de pagination -->
        <div class="d-flex justify-content-center mt-5">
            {{ $mes_articles->links('pagination::bootstrap-4') }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>