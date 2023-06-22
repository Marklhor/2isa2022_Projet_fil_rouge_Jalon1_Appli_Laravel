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
                <h2 class="text_center">NOUVEAU MOT DE PASSE</h2>
            </hgroup>
            <article>
                <form method="POST" action="/reset-password">
                    @csrf
                    <fieldset>
                        <label for="email">Email</label>
                        <input class="input bt_value @error('email') is-invalid @enderror" type="email" name="email"
                            value="{{ old('email') }}" required />
                        @error('email')
                            <div class="error">Il existe un problème vis-à-vis votre mail</div>
                        @enderror
                        <label for="password" hidden>Email</label>
                        <input class="input bt_value @error('password') is-invalid @enderror" type="password"
                            name="password" placeholder="Entrez votre nouveau mot-de-passe..." required />
                        @error('password')
                            <div class="error">Il existe un problème vis-à-vis votre mot de passe</div>
                        @enderror
                        <label for="password_confirmation" hidden>Email</label>
                        <input class="input bt_value @error('password_confirmation') is-invalid @enderror"
                            type="password" name="password_confirmation"
                            placeholder="Confirmez votre nouveau mot-de-passe..." required />
                        @error('password_confirmation')
                            <div class="error">Il existe un problème vis-à-vis de votre confirmation mail</div>
                        @enderror
                        @if ($errors->any())
                            <div class="error">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
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
