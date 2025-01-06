<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détails du Bien</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header>
    Détails du Bien
</header>

<div class="container details-container">
    <h1>{{ $bien->titre }}</h1>
    <p><strong>Type :</strong> {{ $bien->type_bien }}</p>
    <p><strong>Transaction :</strong> {{ $bien->type_transaction }}</p>
    <p><strong>Disponibilité :</strong> {{ $bien->disponibilite }}</p>
    <p><strong>Prix :</strong> {{ number_format($bien->prix, 2, ',', ' ') }} €</p>
    <p><strong>Ville :</strong> {{ $bien->ville }}</p>
    <p><strong>Superficie :</strong> {{ $bien->superficie }} m²</p>
    <p><strong>Nombre de pièces :</strong> {{ $bien->nb_piece }}</p>
    <p><strong>Nombre de chambres :</strong> {{ $bien->nb_chambre }}</p>
</div>
</body>
</html>
