@extends('layout')

@section('content')
<h2>Ajoutez un Anime</h2>

<form action="/collection/create" method="post">
@csrf

<div>
    <label for="shortname">Nom Court:</label>
    <input type="text" name="shortname" id="shortname" placeholder="Nom court">
</div>

<div>
    <label for="fullname">Nom Complet:</label>
    <input type="text" name="fullname" id="fullname" placeholder="Nom complet">
</form>

<div>
    <label for="image">Chemin Image:</label>
    <input type="text" name="image" id="image" placeholder="Chemin Image">
</div>

<div>
    <label for="firstgender">Premier Genre:</label>
    <input type="text" name="firstgender" id="firstgender" placeholder="Premier genre">
</div>

<div>
    <label for="secondgender">Deuxième Genre:</label>
    <input type="text" name="secondgender" id="secondgender" placeholder="Deuxième genre">
</div>

<div>
    <label for="thirdgender">Troisième Genre:</label>
    <input type="text" name="thirdgender" id="thirdgender" placeholder="Troisième genre">
</div>

<div>
    <label for="year">Année de Sortie</label>
    <input type="text" name="year" id="year" placeholder="Année de sortie">
</div>

<div>
    <label for="description">Description:</label>
</div>
<div>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
</div>

<div>
    <label for="link">Lien:</label>
    <input type="text" name="link" id="link" placeholder="Lien">
</div>

<div>
    <input type="submit" value="Ajouter">
</div>
@endsection