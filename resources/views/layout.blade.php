<!DOCTYPE html>
<html lang="fr"> <!--lang= langue utilisée pour la page-->
    <head>
        <title>Collection Laravel</title>  <!--titre de la page affiché dans l'onglet navigateur-->
        <meta charset="utf-8"> <!--cryptage de la page pour facilité la lecture par le moteur de recherche-->
        <meta name="description" content="collection d'animé realiser en laravel">    <!--courte description du contenu de la page-->
        <meta name="keywords" content="collection, anime, Laravel">  <!--mot cléf pour le moteur de recherche: keyword1, keyword2, ...-->
        <meta name="author" content="Desmet Tim">   <!--auteur de la page: auteur1, auteur2, ...-->
        <meta name="viewport" content="width=device-width, initial-scale=1">  <!--pour garder les proportions sur différent affichage-->
        <script src="https://kit.fontawesome.com/2f4f9d9f29.js" crossorigin="anonymous"></script>
        @vite(["resources/css/app.css", "resources/scss/app.scss", "resources/js/app.js",])
    </head>
    <body>
        <header>
            @include('components.navbar')
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('message'))
                <div class="alert alert-info">
                    {{ session('message') }}
                </div>
            @endif
            <h1>Collection Laravel</h1>
            
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            @include('components.footer')
        </footer>
    </body>
    
</html>