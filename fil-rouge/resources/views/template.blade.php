<!DOCTYPE html>
<html lang="fr">

<head>
    @include('templates.metas')
    @include('templates.links')
    @vite('resources/js/app.js')
    <title>@yield('title')</title>
</head>

<body>
    <header>
        @include('templates.nav_title')
        @include('templates.menu')
    </header>
    <div id="flex_part">

        <main>
            @yield('contenu')
        </main>

        <footer>
            @include('templates.footer')
        </footer>
    </div>
</body>

</html>
