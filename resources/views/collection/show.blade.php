@extends('layout')

@section('content')

<article class="show">
    <h2>{{ $collection->shortname }}</h2>
    <p>{{ $collection->fullname }}</p>
    <img src="{{ $collection->image }}" alt="{{ $collection->shortname }}">
    <p>{{ $collection->firstgender }}</p>
    <p>{{ $collection->secondgender }}</p>
    <p>{{ $collection->thirdgender }}</p>
    <p>{{ $collection->year }}</p>
    <p>{{ $collection->description }}</p>
    <div class="link">
        <button class="btn" onclick="location.href='{{ $collection->link }}'">Info</button>
        <button class="btn" onclick="location.href='{{ route('collection.edit', $collection->id) }}'">Modifier</button>
        <button class="btn" onclick="location.href='{{ route('collection.index') }}'">Retour</button>
        <form action="{{ route('collection.destroy', $collection->id) }}" method="post">
            @csrf
            @method('DELETE')
            <input class="btn" type="submit" value="Supprimer">
        </form>
    </div>
</article>


@endsection