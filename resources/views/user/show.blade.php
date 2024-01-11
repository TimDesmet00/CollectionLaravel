@extends('layout')

@section('content')

<h2>Profil</h2>

<article class="show">
    <p class="full">{{ $user->name }}</p>
    <img src="{{ asset('storage/img/' . $user->image->name) }}" alt="Image de profil de l'utilisateur">
    <p class="info">Biographie: {{ $user->biography }}</p>
    <p class="info">Email: {{ $user->email }}</p>
    

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