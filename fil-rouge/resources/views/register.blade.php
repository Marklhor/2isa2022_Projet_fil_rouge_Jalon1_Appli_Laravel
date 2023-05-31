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
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <fieldset>
                        <legend>Enregistrez-vous</legend>
                        <label for="name" hidden>Nom</label>
                        <input class="input bt_value" type="text" name="name" value="{{ old('name') }}" required
                            autofocus placeholder="Entrez votre nom..." />
                        <label for="firstname" hidden>Prénom</label>
                        <input class="input bt_value" type="text" name="firstname" value="{{ old('firstname') }}"
                            required autofocus placeholder="Entrez votre prénom..." />
                        <label for="email" hidden>Email</label>
                        <input class="input bt_value" type="email" name="email" value="{{ old('email') }}"
                            placeholder="Entrez votre mot-de-passe..." required />
                        <label for="password" hidden>Mot de passe</label>
                        <input class="input bt_value" type="password" name="password" required />
                        <label for="password_confirmation" hidden>Confirmer le mot de passe</label>
                        <input class="input bt_value" type="password" name="password_confirmation"
                            placeholder="Confirmer votre mot-de-passe..." required />
                        <button class="input bt_ok pointer" name="button" type="submit">Se connecter</button>
                        <a class="input bt_nok pointer" href="{{ route('login') }}">Déjà enregistré ?</a>
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
