@extends('layout')

@section('content')

<h2>Modifier {{ $collection->shortname }}</h2>

<form action="{{route('collection.update', $collection->id)}}" method="post" class="form-container">
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
            <label for="image">Chemin Image:</label>
            <input type="text" name="image" id="image" value="{{ $collection->image }}">
        </div>

        <div>
            <label for="firstgender">Premier Genre:</label>
            <input type="text" name="firstgender" id="firstgender" value="{{ $collection->firstgender }}">
        </div>

        <div>
            <label for="secondgender">Deuxième Genre:</label>
            <input type="text" name="secondgender" id="secondgender" value="{{ $collection->secondgender }}">
        </div>

        <div>
            <label for="thirdgender">Troisième Genre:</label>
            <input type="text" name="thirdgender" id="thirdgender" value="{{ $collection->thirdgender }}">
        </div>

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