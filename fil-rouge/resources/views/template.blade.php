<!DOCTYPE html>
<html lang="fr">

<head>
    @include('templates.metas')
    @include('templates.links')
    @vite('resources/js/app.js')
    <title>{{ $title_head }}</title>
</head>

<body>
    <header>
        @include('templates.nav_title')
        @include('templates.menu')
    </header>
    <div id="flex_part">

        <main>
            @yield('contenu')
            <div>
                <?php
                    if(DB::connection()->getPdo()){
                        echo"connexion avec BDD OK =>" . DB::connection()->getDatabaseName();
                    }
                ?>
            </div>
        </main>

        <footer>
            @include('templates.footer')
        </footer>
    </div>
</body>

</html>