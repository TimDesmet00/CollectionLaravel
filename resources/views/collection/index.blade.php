@extends('layout')

@section('content')

<h2>Acceuil</h2>

@foreach ($collections as $item)
    <div class="card">
        <h3>{{ $item->shortname }}</h3>
        <!-- <p>{{ $item->fullname }}</p> -->
        <img src="{{ $item->image }}" alt="{{ $item->shortname }}">
        <p> Genre: {{ $item->firstgender }}  {{ $item->secondgender }}  {{ $item->thirdgender }}</p>
        <!-- <p>{{ $item->secondgender }}</p> -->
        <!-- <p>{{ $item->thirdgender }}</p> -->
        <p>Sortie en: {{ $item->year }}</p>
        <!-- <p>{{ $item->description }}</p> -->
        <div class="link">
            <button class="btn" onclick="location.href='{{ $item->link }}'">Info</button>
            <button class="btn" onclick="location.href='{{ route('collection.edit', $item->id) }}'">Modifier</button>
            <button class="btn" onclick="location.href='{{ route('collection.show', $item->id) }}'">Afficher</button>
            <form action="{{ route('collection.destroy', $item->id) }}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="Supprimer">
            </form>
        </div>
    </div>
@endforeach

@endsection