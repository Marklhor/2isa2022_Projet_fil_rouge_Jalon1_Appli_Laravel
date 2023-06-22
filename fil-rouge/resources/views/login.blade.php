<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.1">
    @include('templates.favicon')
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/style.css') }}">
    <title>Gestion des incidents AMIO - Connexion - AMIO</title>

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
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <fieldset>
                        <legend>Connectez-vous</legend>
                        <label for="email" class="hidden"></label>
                        <input class="input bt_value @error('email') is-invalid @enderror" type="email" id="email"
                            name="email" value="{{ old('email') }}" placeholder="Entrer votre email" required>
                        @error('email')
                            <div class="error">Erreur de connexion</div>
                        @enderror
                        <label for="password" class="hidden">Entrer votre mot-de-passe</label>
                        <input class="input  bt_value @error('password') is-invalid @enderror" type="password"
                            id="password" name="password" value="{{ old('password') }}"
                            placeholder="Entrer votre mot-de-passe" required>
                        @error('password')
                            <div class="error">Erreur de mot de passe</div>
                        @enderror
                        <button type="submit" class="input bt_ok pointer" name="button">Se connecter</button>

                        <a class="input bt_blue pointer" name="" href="/forgot-password">Mot-de-passe oublié
                            ?</a>
                        <a class="input bt_blue pointer" href="{{ route('register') }}" name="">S'enregistrer</a>
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
