@extends('layout')

@section('content')

<h2>Modifier {{ $collection->shortname }}</h2>

<form action="{{route('collection.update', $collection->id)}}" method="post" class="form-container" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div>
            <label for="shortname">Nom Court:</label>
            <input type="text" name="shortname" id="shortname" value="{{ $collection->shortname }}">
        </div>

        <div>
            <label for="fullname">Nom Complet:</label>
            <input type="text" name="fullname" id="fullname" value="{{ $collection->fullname }}">
        </div>

        <div>
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" value="{{ $collection->image }}">
        </div>

        <div>
            <label for="genres">Genres:</label>
            <select name="genres[]" id="genres" multiple>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        <button id="add-genre" type="button">Ajouter un genre</button>

        <div>
            <label for="year">Année de Sortie</label>
            <input type="text" name="year" id="year" value="{{ $collection->year }}">
        </div>

        <div>
            <label for="description">Description:</label>
        </div>
        <div>
            <textarea name="description" id="description" cols="100" rows="10">{{ $collection->description }}</textarea>
        </div>

        <div>
            <label for="link">Lien:</label>
            <input type="text" name="link" id="link" value="{{ $collection->link }}">
        </div>

        <div>
            <input class ="btn" type="submit" value="Modifier">
        </div>

</form>

@endsection