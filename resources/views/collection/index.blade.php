@extends('layout')

@section('content')

<h2>Accueil</h2>
<section class="card-container">
    @foreach ($collections as $item)
        <div class="card">
            <h3>{{ $item->shortname }}</h3>
            <div class="img">
                <img src="{{ asset('storage/img/' . $item->image->name) }}" alt="{{ $item->shortname }}">
            </div>
            <p> Genre: 
                {{ implode(' / ', $item->genres->pluck('name')->toArray()) }}
               
            </p>
            <p>Sortie en: {{ $item->year }}</p>
            <div class="link">
                <button class="btn" onclick="location.href='{{ $item->link }}'">Info</button>
                <button class="btn" onclick="location.href='{{ route('collection.edit', $item->id) }}'">Modifier</button>
                <button class="btn" onclick="location.href='{{ route('collection.show', $item->id) }}'">Afficher</button>
                <form action="{{ route('collection.destroy', $item->id) }}" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer cette collection ?')">
                    @csrf
                    @method('DELETE')
                    <input class="btn" type="submit" value="Supprimer">
                </form>
            </div>
        </div>
    @endforeach
</section>
@endsection