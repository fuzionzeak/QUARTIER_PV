<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil - Quartier Privé</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<header>
    <div class="header-container">
        <span>Bienvenue sur Quartier Privé</span>
        <div class="auth-buttons">
            @guest
                <a href="{{ route('login') }}" class="auth-button">Se connecter</a>
            @else
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="auth-button">Se déconnecter</button>
                </form>
            @endguest
        </div>
    </div>
</header>

<div class="container">
    <h1 class="text-3xl font-bold mb-4">Liste des biens disponibles</h1>

    @foreach($biens as $bien)
        <div class="bien-card">
            <h2 class="bien-title">{{ $bien->titre }}</h2>
            <p class="bien-info"><strong>Type :</strong> {{ $bien->type_bien }}</p>
            <p class="bien-info"><strong>Transaction :</strong> {{ $bien->type_transaction }}</p>
            <p class="bien-info"><strong>Prix :</strong> {{ number_format($bien->prix, 2, ',', ' ') }} €</p>
            <p class="bien-info"><strong>Disponibilité :</strong> {{ $bien->disponibilite }}</p>
            <p class="bien-info"><strong>Ville :</strong> {{ $bien->ville }}</p>
            <div class="bien-action">
                <a href="{{ route('biens.show', ['id' => $bien->id_bien]) }}" class="bien-button">
                    Voir plus
                </a>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>
