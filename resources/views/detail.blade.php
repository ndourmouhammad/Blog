<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card-img-top {
            width: 100%;
            height: 350px;
            /* ajustez cette valeur selon vos besoins */
            object-fit: cover;
            /* cette propriété permet de maintenir le ratio de l'image */
        }

        .btn-primary {
            color: white;
            background: red;
            border: red;
        }

        .btn-primary:hover {
            background: darkred;
            border: darkred;
        }

        .content-wrapper {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        .category-label {
            background-color: #6c757d;
            /* Gris neutre */
            color: white;
            padding: 0.25em 0.5em;
            border-radius: 0.25em;
            font-size: 0.85em;
        }
    </style>
</head>

<body>
    <div class="container mt-5 content-wrapper">
        <a href="{{ route('index') }}" class="btn btn-secondary mb-4">
            <i class="fas fa-arrow-left"></i> Retourner à la page d'accueil
        </a>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <img class="card-img-top mt-3 mb-3" src="{{ $article->url_image }}"
            alt="Image de l'article">
        <h1>{{ $article->nom }}</h1>
        <h6 class="card-title">Catégorie : <span class="category-label">{{ $article->catégorie }}</span></h6>
        <p class="mt-3">{{ $article->description }}</p>
        <p class="text-muted">Publié le : {{ $article->created_at }}</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>