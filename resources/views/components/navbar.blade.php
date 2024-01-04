<nav class="navbar">
    <a href="{{ route('collection.index') }}">Accueil</a>
    <a href="{{ route('collection.create') }}">Ajoutez</a>
    <button class="btn connection" onclick="location.href='{{ route('user.login') }}'">Se Connecter</button>
</nav>