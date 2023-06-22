<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    @include('templates.metas')

    @include('templates.favicon')

    @vite('resources/js/app.js')

    <title>@yield('title')</title>

</head>

<body>
    <header>
        @include('templates.nav_title')
        @include('templates.menu')
    </header>
    <div id="flex_part">
        @auth
            <main>
                @yield('contenu')
            </main>
        @endauth

        @guest
            <footer>
                @include('templates.footer')
            </footer>
        @endguest
    </div>
</body>

</html>
