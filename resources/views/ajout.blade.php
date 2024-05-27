<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvel Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
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

        .btn-secondary {
            color: white;
            background: red;
            border: red;
        }

        .btn-secondary:hover {
            background: darkred;
            border: darkred;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mb-4">Nouvel Article</h1>
        <form action="{{ route('article.enregistre') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nom" class="form-label">Nom de l'article</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
                <div class="invalid-feedback">Veuillez entrer le nom de l'article.</div>
            </div>

            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
                <div class="invalid-feedback">Veuillez sélectionner une image.</div>
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                <div class="invalid-feedback">Veuillez entrer une description de l'article.</div>
            </div>

            <div class="form-group">
                <label>À la Une</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="a_la_une" id="la_une_oui" value="1">
                    <label class="form-check-label" for="la_une_oui">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="a_la_une" id="la_une_non" value="0" checked>
                    <label class="form-check-label" for="la_une_non">Non</label>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <a href="{{ route('accueil') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
