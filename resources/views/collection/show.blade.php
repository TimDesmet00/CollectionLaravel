@extends('layout')

@section('content')

<article class="show">
    <!-- <h2>{{ $collection->shortname }}</h2> -->
    <p class="full">{{ $collection->fullname }}</p>
    <div class="img">
        <img src="{{ Storage::url($collection->image) }}" alt="{{ $collection->shortname }}">
    </div>
    <p class="info"> Genre: {{ $collection->firstgender }} 
        @if(!empty($collection->secondgender)) / {{ $collection->secondgender }} @endif
        @if(!empty($collection->thirdgender)) / {{ $collection->thirdgender }} @endif
    </p>
    <p class="info">Sortie en: {{ $collection->year }}</p>
    <p class="info">Synopsis: {{ $collection->description }}</p>
    <div class="link">
        <button class="btn" onclick="location.href='{{ $collection->link }}'">Info</button>
        <button class="btn" onclick="location.href='{{ route('collection.edit', $collection->id) }}'">Modifier</button>
        <button class="btn" onclick="location.href='{{ route('collection.index') }}'">Retour</button>
        <form action="{{ route('collection.destroy', $collection->id) }}" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer cette collection ?')">
            @csrf
            @method('DELETE')
            <input class="btn" type="submit" value="Supprimer">
        </form>
    </div>
</article>


@endsection