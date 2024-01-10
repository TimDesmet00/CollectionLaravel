@extends('layout')

@section('content')
<h2>Inscription</h2>

<form action="/user/create" method="post" class="form-container form-user">
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
        <label for="biography">Biographie:</label>
    </div>
    <div>
        <textarea name="biography" id="biography" cols="30" rows="10" placeholder="Biographie"></textarea>
    </div>
    
    <div>
        <input class="btn" type="submit" value="Ajouter">
    </div>
        
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection