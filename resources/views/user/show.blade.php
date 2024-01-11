@extends('layout')

@section('content')

<h2>Profil</h2>

<article class="show show-user">
    <p class="name">{{ $user->name }}</p>
    <div class="grid">
        <img src="{{ asset('storage/img/' . $user->image->name) }}" alt="Image de profil de l'utilisateur">
        <div class="title">
            <p>Biographie:</p>
            <p class="biography">{{ $user->biography }}</p>
        </div>
    </div>
    <p class="mail">Email: {{ $user->email }}</p>

    <div class="favoris">
        <h3>Favoris:</h3>
        
    </div>
    

    <div class="link">
        <button class="btn" onclick="location.href='{{ route('user.edit', $user->id) }}'">Modifier</button>
        <button class="btn" onclick="location.href='{{ route('collection.index') }}'">Retour</button>
        <form action="{{ route('user.destroy', $user->id) }}" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')">
            @csrf
            @method('DELETE')
            <input class="btn" type="submit" value="Supprimer">
        </form>
    </div>

@endsection