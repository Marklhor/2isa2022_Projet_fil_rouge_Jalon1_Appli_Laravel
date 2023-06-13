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
                <h2 class="text_center">GESTION DES INCIDENTS</h2>
            </hgroup>
            <article>
                <form method="POST" action="/reset-password">
                    @csrf
                    <fieldset>
                        <label for="email">Email</label>
                        <input class="input bt_value" type="email" name="email" value="{{ old('email') }}"
                            required />
                        <label for="password" hidden>Email</label>
                        <input class="input bt_value" type="password" name="password"
                            placeholder="Entrez votre nouveau mot-de-passe..." required />
                        <label for="password_confirmation" hidden>Email</label>
                        <input class="input bt_value" type="password" name="password_confirmation"
                            placeholder="Confirmez votre nouveau mot-de-passe..." required />
                        <input class="" type="" name="token" value="{{ request()->route('token') }}"
                            hidden />
                        <button class="input bt_ok pointer" name="button" type="submit">Valider</button>
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
