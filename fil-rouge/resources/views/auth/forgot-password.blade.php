<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ Vite::asset('resources/css/style.css') }}">
    <title>Elements du site</title>

</head>

<body>
    <header>
        <nav class="nav">
        </nav>
    </header>
    <div id="flex_part">
        <main>
            <hgroup>
                <h1 class="text_center">SERVICE INFORMATIQUE</h1>
                <h2 class="text_center">MOT DE PASSE OUBLIÉ</h2>
            </hgroup>
            <article>
                <form method="POST" action="/forgot-password">
                    @csrf
                    <fieldset>
                        <legend>Mot-de-passe oublié</legend>
                        <label for="email" hidden>Email</label>
                        <input class="input bt_value @error('email') is-invalid @enderror" type="email" name="email"
                            value="{{ old('email') }}" placeholder="Entrez votre mot-de-passe..." required />
                        @error('email')
                            <div class="error">Il existe un problème vis-à-vis votre mail</div>
                        @enderror
                        <button class="input bt_ok pointer" name="button" type="submit">Envoyer</button>
                        <a class="input bt_nok pointer" href="{{ route('login') }}">Annuler</a>
                    </fieldset>
                </form>
            </article>
        </main>
        <footer>
            @include('templates.footer')
        </footer>
    </div>
</body>

</html>
