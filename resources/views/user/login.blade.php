@extends ('layout')

@section('content')

<h2>Connection</h2>


<form action="login" method="post" class="form-container form-user">
@csrf

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Email">
    </div>

    <div>
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" placeholder="Mot de passe">
    </div>

    <div>
        <input class="btn" type="submit" value="Connection">
        <!-- <button class="btn" onclick="location.href='{{ route('user.create') }}'">Inscription</button> -->
        <a href="{{ route('user.create') }}" class="btn btn1 ">Inscription</a>
    </div>

</form>

@endsection