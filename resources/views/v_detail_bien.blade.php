<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $bien->titre }} - Détails</title>
</head>
<body>
<h1>{{ $bien->titre }}</h1>
<p><strong>Type :</strong> {{ $bien->type_bien }}</p>
<p><strong>Transaction :</strong> {{ $bien->type_transaction }}</p>
<p><strong>Disponibilité :</strong> {{ $bien->disponibilite }}</p>
<p><strong>Prix :</strong> {{ number_format($bien->prix, 2, ',', ' ') }} €</p>
<p><strong>Adresse :</strong> {{ $bien->adresse }}, {{ $bien->cp }} {{ $bien->ville }}</p>
<p><strong>Superficie :</strong> {{ $bien->superficie }} m²</p>
<p><strong>Surface terrain :</strong> {{ $bien->surface_terrain ?? 'N/A' }} m²</p>
<p><strong>Nombre d'étages :</strong> {{ $bien->nb_etage ?? 'N/A' }}</p>
<p><strong>Nombre de pièces :</strong> {{ $bien->nb_piece }}</p>
<p><strong>Nombre de chambres :</strong> {{ $bien->nb_chambre }}</p>
<p><strong>Région :</strong> {{ $bien->region }}</p>
<p><strong>Pays :</strong> {{ $bien->pays }}</p>

<a href="{{ route('biens.index') }}" style="color: white; background-color: #28a745; padding: 5px 10px; text-decoration: none;">
    Retour à la liste
</a>
</body>
</html>
