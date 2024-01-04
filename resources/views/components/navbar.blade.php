<nav class="navbar">
    <a href="{{ route('collection.index') }}">Accueil</a>
    <a href="{{ route('collection.create') }}">Ajoutez</a>
    <div>
        @if(Auth::check())
            <span>Bonjour {{ Auth::user()->name }}</span>
            <button class="btn connection" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se Déconnecter</button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
        <button class="btn connection" onclick="location.href='{{ route('user.login') }}'">Se Connecter</button>
        @endif
        
    </div>
</nav>