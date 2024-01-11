@extends('layout')

@section('content')
<h2>Modifier votre Profil</h2>

<form action="{{route('user.update', $user->id)}}" method="post" class="form-container form-user" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div>
        <label for="name">Nom:</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}">
    </div>
    
    <div>
        <label for="image">Image:</label>
        <input type="file" name="image" id="image" value="{{ $user->image }}">
    </div>

    <div>
        <label for="biography">Biographie:</label>
    </div>
    <div>
        <textarea name="biography" id="biography" cols="30" rows="10">{{ $user->biography }}</textarea>
    </div>
    
    <div>
        <input class="btn" type="submit" value="Modifier">
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