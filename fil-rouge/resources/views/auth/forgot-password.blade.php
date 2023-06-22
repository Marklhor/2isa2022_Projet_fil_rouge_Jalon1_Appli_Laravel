<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ Vite::asset('resources/css/style.css') }}">
    <title>Mot de passe - Gestion des incidents - AMIO</title>

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
                <h2 class="text_center">LIEN POUR UN NOUVEAU MOT DE PASSE</h2>
            </hgroup>
            <article>
                <form method="POST" action="/forgot-password">
                    @csrf
                    <fieldset>
                        <legend>ENTREZ VOTRE MAIL</legend>
                        <label for="email" hidden>Email</label>
                        <input class="input bt_value " type="email" name="email" value="{{ old('email') }}"
                            placeholder="Entrez votre mot-de-passe..." required />

                        @if ($errors->any())
                            <div class="error">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <button class="input bt_ok pointer" name="button" type="submit">Envoyer</button>
                        <a class="input bt_nok pointer" href="{{ route('login') }}">Annuler</a>
                        @if (session('status'))
                            <div class="success">
                                {{ session('status') }}
                            </div>
                        @endif
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
