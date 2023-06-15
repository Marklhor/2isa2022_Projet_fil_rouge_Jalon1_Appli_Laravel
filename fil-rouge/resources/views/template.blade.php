<!DOCTYPE html>
<html lang="fr">

<head>
    @include('templates.metas')
    {{-- @include('templates.links') --}}
    {{-- <link rel="icon" href="{{ asset('/img/favicon-16x16.ico') }}?v={{ date('YmdHis') }}"> --}}
    {{-- <link rel="icon" href="{{ URL::asset('/img/favicon-16x16.ico') }}" type="image/x-icon"/> --}}
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
