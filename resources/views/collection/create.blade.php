@extends('layout')

@section('content')
<h2>Ajoutez un Anime</h2>

<form action="/collection/create" method="post" class="form-container" enctype="multipart/form-data">
@csrf

<div>
    <label for="shortname">Nom Court:</label>
    <input type="text" name="shortname" id="shortname" placeholder="Nom court">
</div>

<div>
    <label for="fullname">Nom Complet:</label>
    <input type="text" name="fullname" id="fullname" placeholder="Nom complet">
</div>

<div>
    <label for="image">Image:</label>
    <input type="file" name="image" id="image" placeholder="Image">
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
    <input class="btn" type="submit" value="Ajouter">
</div>
</form>
@endsection