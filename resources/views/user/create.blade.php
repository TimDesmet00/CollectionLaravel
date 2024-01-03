@extends('layout')

@section('content')
<h2>Inscription</h2>

<form action="/user/create" method="post" class="form-container">
    @csrf

    <div>
        <label for="name">Nom:</label>
        <input type="text" name="name" id="name" placeholder="Nom">
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Email">
    </div>

    <div>
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" placeholder="Mot de passe">
    </div>

    <div>
        <input class="btn" type="submit" value="Ajouter">
        
</form>

@endsection